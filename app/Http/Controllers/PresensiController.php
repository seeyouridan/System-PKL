<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['presences'] = Presence::with('siswa')->get();
        return view('presensi.index');
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

        $tanggal = Carbon::now()->format('Y-m-d');
        $waktu = Carbon::now('Asia/Jakarta')->format('H:i:s');

        if (Carbon::now('Asia/Jakarta')->between(
            Carbon::createFromTimeString('08:00:00', 'Asia/Jakarta'),
            Carbon::createFromTimeString('08:30:00', 'Asia/Jakarta')
        )) {
            $status = 'Tepat Waktu';
        } elseif (Carbon::now('Asia/Jakarta')->between(
            Carbon::createFromTimeString('08:31:00', 'Asia/Jakarta'),
            Carbon::createFromTimeString('12:00:00', 'Asia/Jakarta')
        )) {
            $status = 'Telat';
        }
        // elseif (Carbon::now('Asia/Jakarta')->between(
        //     Carbon::createFromTimeString('12:00:01', 'Asia/Jakarta'),
        //     Carbon::createFromTimeString('07:59:00', 'Asia/Jakarta')
        // )) {
        //     $status = 'Tidak Hadir';
        // } else {
        //     $status = 'Tidak Hadir';
        // }

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
}
