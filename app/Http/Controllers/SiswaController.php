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
        // $userId = Auth::id();

        // $mentor = \App\Models\Mentor::where('id_user', $userId)->first();

        // if ($mentor) {
        //     $students = Student::where('id_guru', $mentor->id_guru)->with('major')->get();
        // } else {
        //     $students = collect();
        // }

        // return view('siswa.index', ['students' => $students]);
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
        $data['majors'] = Student::pluck('major', 'id_jurusan')->get();
        $data['mentor'] = Student::pluck('mentor', 'id_guru')->get();
        return view('guru.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|max:255',
            'nis' => 'required|max:30',
            'nama' => 'required|max:50',
            'id_jurusan' => 'required|max:10',
            'jenis_kelamin' => 'required|max:5',
            'id_guru' => 'required|max:10',
        ]);

        // dd($validate);

        $user = new User();
        $user->name = $validate['nama'];
        $user->username = $validate['username'];
        $user->password = Hash::make('Password123');
        $user->save();

        $guru = Mentor::create([
            'nis' => $validate['nis'],
            'nama' => $validate['nama'],
            'id_jurusan' => $validate['id_jurusan'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'id_guru' => $validate['id_guru'],
            'id_user' => $user->id,
        ]);

        $user->assignRole('guru');

        $notificaion = array(
            'message' => "Data siswa berhasil ditambahkan",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('siswa.index')->with($notificaion);
        } else {
            return redirect()->route('siswa.create')->with($notificaion);
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
