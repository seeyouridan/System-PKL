<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['mentors'] = Mentor::get();
        return view('guru.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['mentors'] = Mentor::pluck('mentor', 'id_guru')->get();
        return view('guru.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|max:255',
            'nip_guru' => 'nullable|max:30',
            'nama_guru' => 'required|max:30',
            'jenis_kelamin' => 'required|max:5',
            'no_telp' => 'nullable|max:15',
        ]);

        // dd($validate);

        $user = new User();
        $user->name = $validate['nama_guru'];
        $user->username = $validate['username'];
        $user->password = Hash::make('Password123');
        $user->save();

        $guru = Mentor::create([
            'nip_guru' => $validate['nip_guru'],
            'nama_guru' => $validate['nama_guru'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'no_telp' => $validate['no_telp'],
            'id_user' => $user->id,
        ]);

        $user->assignRole('guru');

        $notificaion = array(
            'message' => "Data guru berhasil ditambahkan",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('guru.index')->with($notificaion);
        } else {
            return redirect()->route('guru.create')->with($notificaion);
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
    public function edit(string $id_guru)
    {
        $mentor = Mentor::with('user')->findOrFail($id_guru);
        return view('guru.edit', ['mentor' => $mentor]);
    }

    public function update(Request $request, string $id_guru)
    {
        $validate = $request->validate([
            'username' => 'required|max:255',
            'nip_guru' => 'nullable|max:30',
            'nama_guru' => 'required|max:30',
            'jenis_kelamin' => 'required|max:5',
            'no_telp' => 'nullable|max:15',
        ]);

        $guru = Mentor::findOrFail($id_guru);
        $user = User::find($guru->id_user);

        $user->name = $validate['nama_guru'];
        $user->username = $validate['username'];
        $user->save();

        $user->update([
            'username' => $validate['username'],
            'name' => $validate['nama_guru'],
        ]);

        $guru->update([
            'nip_guru' => $validate['nip_guru'],
            'nama_guru' => $validate['nama_guru'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'no_telp' => $validate['no_telp'],
        ]);

        $notification = [
            'message' => "Data guru berhasil diperbarui",
            'alert-type' => 'success'
        ];

        return redirect()->route('guru.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_guru)
    {
        $guru = Mentor::findOrFail($id_guru);
        $user = User::find($guru->id_user);

        $guru->delete();
        $user->delete();

        $notification = array(
            'message' => "Data guru berhasil dihapus",
            'alert-type' => 'success'
        );

        return redirect()->route('guru.index')->with($notification);
    }
}
