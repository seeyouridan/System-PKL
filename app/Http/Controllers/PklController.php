<?php

namespace App\Http\Controllers;

use App\Models\Instance;
use App\Models\Pkl;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pkls = Pkl::with(['student', 'instance'])->get();
        return view('pkl.index', compact('pkls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['students'] = Student::all();
        $data['instances'] = Instance::all();
        return view('pkl.create', compact(['students', 'instances']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_siswa' => 'required|integer',
            'id_instansi' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $pkl = Pkl::create([
                'id_siswa' => $validated['id_siswa'],
                'id_instansi' => $validated['id_instansi'],
            ]);

            $instansi = Instance::findOrFail($validated['id_instansi']);
            $id_guru = $instansi->id_guru;

            // dd([$validated, $id_guru]);

            $student = Student::findOrFail($validated['id_siswa']);
            $student->id_guru = $id_guru;
            $student->save();

            DB::commit();

            $notification = [
                'message' => "Data PKL berhasil ditambahkan",
                'alert-type' => 'success'
            ];

            return redirect()->route('pkl.index')->with($notification);
        } catch (\Exception $e) {
            DB::rollBack();

            $notification = [
                'message' => "Terjadi kesalahan: " . $e->getMessage(),
                'alert-type' => 'error'
            ];

            return redirect()->back()->withInput()->with($notification);
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
    public function destroy(string $id_pkl)
    {
        $pkl = Pkl::findOrFail($id_pkl);

        $pkl->delete();

        $notification = array(
            'message' => "Data pkl berhasil dihapus",
            'alert-type' => 'success'
        );

        return redirect()->route('pkl.index')->with($notification);
    }
}
