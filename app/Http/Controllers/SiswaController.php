<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
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

                    return view('siswa.index', ['students' => $students]);
                } else {
                    $data['students'] = Student::get();

                    return view('siswa.index', $data);
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['majors'] = Student::pluck('major', 'id_jurusan');
        $data['mentor'] = Student::pluck('mentor', 'id_guru');
        return view('siswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nis' => 'required|max:30',
            'nama' => 'required|max:50',
            'id_jurusan' => 'required|max:10',
            'jenis_kelamin' => 'required|max:5',
        ]);

        // dd($validate);

        $user = new User();
        $user->name = $validate['nama'];
        $user->username = $validate['nis'];
        $user->password = Hash::make('Password123');
        $user->save();

        $siswa = Student::create([
            'nis' => $validate['nis'],
            'nama' => $validate['nama'],
            'id_jurusan' => $validate['id_jurusan'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'id_user' => $user->id,
        ]);

        $user->assignRole('siswa');

        $notification = array(
            'message' => "Data siswa berhasil ditambahkan",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('siswa.index')->with($notification);
        } else {
            return redirect()->route('siswa.create')->with($notification);
        }
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
    public function edit(string $id_siswa)
    {
        $siswa = Student::with('user')->findOrFail($id_siswa);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_siswa)
    {
        $validate = $request->validate([
            'nis' => 'required|max:30',
            'nama' => 'required|max:50',
            'id_jurusan' => 'required|max:10',
            'jenis_kelamin' => 'required|max:5',
        ]);

        // dd($validate);

        $siswa = Student::findOrFail($id_siswa);
        $user = User::find($siswa->id_user);

        $user->name = $validate['nama'];
        $user->username = $validate['nis'];
        $user->save();

        $user->update([
            'username' => $validate['nis'],
            'name' => $validate['nama'],
        ]);

        $siswa->update([
            'nis' => $validate['nis'],
            'nama' => $validate['nama'],
            'id_jurusan' => $validate['id_jurusan'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
        ]);

        $notification = [
            'message' => "Data siswa berhasil diperbarui",
            'alert-type' => 'success'
        ];

        return redirect()->route('siswa.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_siswa)
    {
        $siswa = Student::findOrFail($id_siswa);
        $user = User::find($siswa->id_user);

        $siswa->delete();
        $user->delete();

        $notification = array(
            'message' => "Data siswa berhasil dihapus",
            'alert-type' => 'success'
        );

        return redirect()->route('siswa.index')->with($notification);
    }
}
