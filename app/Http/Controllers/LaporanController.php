<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Mentor;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $reports = collect();

        if (Auth::check()) {
            $userRole = Auth::user()->roles->first()->name;

            if ($userRole == 'guru') {
                $mentor = Mentor::where('id_user', $userId)->first();

                if ($mentor) {
                    $students = Student::where('id_guru', $mentor->id_guru)->with('reports')->get();

                    foreach ($students as $student) {
                        foreach ($student->reports as $report) {
                            $reports->push($report);
                        }
                    }
                }
            } else if ($userRole == 'siswa') {
                $student = Student::where('id_user', $userId)->first();
                if ($student) {
                    $reports = Laporan::where('id_siswa', $student->id_siswa)->get();
                }
            } else {
                $reports = Laporan::all();
            }
        }

        return view('laporan.index', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['reports'] = Laporan::get();
        return view('laporan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'laporan' => 'required|file|mimes:pdf|max:10240',
        ]);

        $user = Auth::user();
        $id_siswa = $user->student->id_siswa;

        $namaFileAsli = $request->file('laporan')->getClientOriginalName();
        $laporanPath = $request->file('laporan')->storeAs('public/laporan', $namaFileAsli);

        Laporan::create([
            'id_siswa' => $id_siswa,
            'laporan' => $laporanPath,
            'nama_file' => $namaFileAsli,
        ]);

        $notification = array(
            'message' => "Laporan berhasil dikirimkan!",
            'alert-type' => 'success'
        );

        return redirect()->route('laporan.index')->with($notification);
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
    public function edit(string $id_laporan)
    {
        $reports = Laporan::findOrFail($id_laporan);
        return view('laporan.edit', ['laporan' => $reports]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_laporan)
    {
        $request->validate([
            'laporan_revisi' => 'required|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('laporan_revisi')) {
            $laporanRevisi = Laporan::findOrFail($id_laporan);

            $user = Auth::user();
            $siswa = $user->student;
            $id_siswa = $siswa->id_siswa;

            $laporanRevisiName = $request->file('laporan_revisi')->getClientOriginalName();
            $laporanRevisiPath = $request->file('laporan_revisi')->storeAs('public/laporan-revisi', $laporanRevisiName);

            $laporanRevisi->update([
                'id_siswa' => $id_siswa,
                'laporan_revisi' => $laporanRevisiPath,
                'nama_file_revisi' => $laporanRevisiName,
            ]);
        }

        $notification = array(
            'message' => "Laporan berhasil dikirimkan!",
            'alert-type' => 'success'
        );

        return redirect()->route('laporan.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_laporan)
    {
        $laporan = Laporan::findOrFail($id_laporan);

        $laporan->delete();

        $notification = array(
            'message' => "Data laporan berhasil dihapus",
            'alert-type' => 'success'
        );

        return redirect()->route('laporan.index')->with($notification);
    }

    public function updateNilai(Request $request, $id_laporan)
    {
        $validated = $request->validate([
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        // dd($validated);

        $laporan = Laporan::findOrFail($id_laporan);
        $laporan->update([
            'nilai' => $validated['nilai'],
        ]);

        $notification = array(
            'message' => "Berhasil menginputkan nilai!",
            'alert-type' => 'success'
        );

        return redirect()->route('laporan.index')->with($notification);
    }
}
