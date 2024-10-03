<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Presence;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DateTimeZone;

use function Laravel\Prompts\alert;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            foreach (Auth::user()->roles as $role) {
                if ($role->name == 'guru') {
                    $userId = Auth::id();

                    $mentor = \App\Models\Mentor::where('id_user', $userId)->first();

                    if ($mentor) {
                        $students = Student::where('id_guru', $mentor->id_guru)->with('major')->get();
                    } else {
                        $students = collect();
                    }

                    $presences = Presence::with('siswa')->get();

                    return view('presensi.index', ['students' => $students, 'presences' => $presences]);
                } else {
                    $presences = Presence::with('siswa')->get();
                    return view('presensi.index', $presences);
                }
            }
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode_latitude' => 'required|max:50',
            'kode_longitude' => 'required|max:50',
            'jurnal_kegiatan' => 'required|string',
            'keterangan' => 'required|in:Hadir,Sakit,Izin',
        ]);

        $user = Auth::user();
        $id_siswa = $user->student->id_siswa;
        $nama_siswa = $user->student->nama;

        $tanggal = date('Y-m-d');
        $waktu = date('H:i:s', time());

        $now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $jamMasuk = new DateTime('08:00:00', new DateTimeZone('Asia/Jakarta'));
        $batasTelat = new DateTime('08:30:00', new DateTimeZone('Asia/Jakarta'));
        $batasTidakHadir = new DateTime('12:00:00', new DateTimeZone('Asia/Jakarta'));

        if ($now > $jamMasuk && $now < $batasTelat) {
            $status = 'Masuk';
        } elseif ($now > $batasTelat && $now < $batasTidakHadir) {
            $status = 'Telat';
        } else {
            $status = 'Tidak Hadir';
        }

        // dd([$validate, $id_siswa, $nama_siswa, $tanggal, $waktu, $status]);

        Presence::create([
            'id_siswa' => $id_siswa,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'keterangan' => $validate['keterangan'],
            'kode_latitude' => $validate['kode_latitude'],
            'kode_longitude' => $validate['kode_longitude'],
            'jurnal_kegiatan' => $validate['jurnal_kegiatan'],
            'status' => $status,
        ]);

        $notification = array(
            'message' => "Berhasil Mengisi Absen!",
            'alert-type' => 'success'
        );

        return redirect()->route('presensi.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function rekap(string $id_siswa)
    {
        $students = Student::where('id_siswa', $id_siswa)->first();
        $presences = Presence::where('id_siswa', $id_siswa)->orderBy('tanggal', 'desc')->get();

        return view('presensi.komponen.rekap', ['students' => $students, 'presences' => $presences]);
    }

    public function print(String $id_siswa)
    {
        $students = Student::where('id_siswa', $id_siswa)->first();
        // $presences = Presence::where('id_siswa', $id_siswa)->orderBy('tanggal', 'desc')->get();

        $presences_agustus = Presence::with('siswa') // Eager load relasi siswa
            ->where('id_siswa', $id_siswa)
            ->whereMonth('tanggal', '=', 8)
            ->orderBy('tanggal', 'asc')
            ->limit(50)
            ->get();

        $presences_september = Presence::with('siswa')
            ->where('id_siswa', $id_siswa)
            ->whereMonth('tanggal', '=', 9) // Bulan September
            ->orderBy('tanggal', 'asc')
            ->limit(50)
            ->get();

        $presences_oktober = Presence::with('siswa')
            ->where('id_siswa', $id_siswa)
            ->whereMonth('tanggal', '=', 10) // Bulan Oktober
            ->orderBy('tanggal', 'asc')
            ->limit(50)
            ->get();

        $presences_november = Presence::with('siswa')
            ->where('id_siswa', $id_siswa)
            ->whereMonth('tanggal', '=', 11) // Bulan November
            ->orderBy('tanggal', 'asc')
            ->limit(50)
            ->get();

        // $pdf = Pdf::loadView('presensi.komponen.print', ['students' => $students, 'presences' => $presences]);
        // return $pdf->download('rekap-presensi ' . $students->nama . ' .pdf');

        $pdf = Pdf::loadView('presensi.komponen.print', [
            'students' => $students,
            'presences_agustus' => $presences_agustus,
            'presences_september' => $presences_september,
            'presences_oktober' => $presences_oktober,
            'presences_november' => $presences_november
        ]);

        return $pdf->download('rekap-presensi ' . $students->nama . ' .pdf');
    }
}
