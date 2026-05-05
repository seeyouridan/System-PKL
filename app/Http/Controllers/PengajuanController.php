<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Pkl;
use App\Models\Student;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua pengajuan untuk ditampilkan di tabel
        $data['submissions'] = Submission::with('student', 'city')->orderBy('status', 'asc')->get();
        return view('pengajuan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['students'] = Student::all();
        $data['cities'] = Kota::all();
        return view('pengajuan.create', compact('student', 'citie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_kota' => 'required|integer|max:10',
        ]);

        $user = Auth::user();
        $siswa = $user->student;
        $id_siswa = $siswa->id_siswa;

        // dd([$validate, $id_siswa]);

        Submission::create([
            'id_siswa' => $id_siswa,
            'id_kota' => $validate['id_kota'],
            'status' => 0,
        ]);

        return redirect()->route('pengajuan.index')->with([
            'message' => 'Pengajuan berhasil dikirim!',
            'alert-type' => 'success'
        ]);
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
    public function destroy(string $id_pengajuan)
    {
        $pengajuan = Submission::find($id_pengajuan);

        if ($pengajuan && $pengajuan->status == 0) {
            $pengajuan->delete();

            return redirect()->route('pengajuan.index')->with([
                'message' => 'Pengajuan berhasil dibatalkan',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('pengajuan.index')->with([
            'message' => 'Pengajuan gagal dibatalkan',
            'alert-type' => 'error'
        ]);
    }

    public function verify($id_pengajuan)
    {
        $submission = Submission::find($id_pengajuan);

        $submission->status = 1;
        $submission->save();

        $notification = [
            'message' => "Pengajuan berhasil diverifikasi!",
            'alert-type' => 'success'
        ];

        return redirect()->route('pengajuan.index')->with($notification);
    }

    public function unverify($id_pengajuan)
    {
        $submission = Submission::find($id_pengajuan);

        $submission->status = 0;
        $submission->save();

        $notification = [
            'message' => "Pengajuan berhasil diunverifikasi!",
            'alert-type' => 'success'
        ];

        return redirect()->route('pengajuan.index')->with($notification);
    }
}
