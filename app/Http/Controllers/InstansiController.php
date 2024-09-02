<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Instance;
use App\Models\Kota;
use App\Models\Mentor;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InstansiController extends Controller
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
                        $instances = Instance::where('id_guru', $mentor->id_guru)->with('kota')->get();
                    } else {
                        $instances = collect();
                    }

                    return view('instansi.index', ['instances' => $instances]);
                } else {
                    $data['instances'] = Instance::with('kota')->get();
                    return view('instansi.index', $data);
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['cities'] = Kota::pluck('kota', 'id_kota');
        return view('instansi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode_instansi' => 'required|max:30',
            'nama_instansi' => 'required|max:255',
            'kuota' => 'required|integer|max:10',
            'alamat' => 'required',
            'id_kota' => 'required|integer|max:10',
            'no_telp' => 'nullable|max:15',
            'id_guru' => 'required|integer|max:10'
        ]);

        // dd($validate);

        DB::transaction(function () use ($validate) {
            Instance::create($validate);

            Kota::where('id_kota', $validate['id_kota'])->increment('jml_instansi');
        });

        $notification = array(
            'message' => "Data instansi berhasil ditambahkan",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('instansi.index')->with($notification);
        } else {
            return redirect()->route('instansi.create')->with($notification);
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
    public function edit(string $id_instansi)
    {
        $instansi = Instance::with('kota', 'mentor')->findOrFail($id_instansi);
        $mentors = Mentor::all();
        return view('instansi.edit', ['instansi' => $instansi, 'mentors' => $mentors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_instansi)
    {
        $validate = $request->validate([
            'kode_instansi' => 'required|max:30',
            'nama_instansi' => 'required|max:255',
            'kuota' => 'required|integer|max:10',
            'alamat' => 'required',
            'id_kota' => 'required|integer|max:10',
            'no_telp' => 'nullable|max:15',
            'id_guru' => 'required|integer|max:10',
        ]);

        // dd($validate);

        $instansi = Instance::findOrFail($id_instansi);

        $oldKotaId = $instansi->id_kota;

        $instansi->update($validate);

        // Jika kota pada data instance diubah
        if ($oldKotaId != $validate['id_kota']) {
            // Kurangi jumlah instansi di kota lama
            Kota::where('id_kota', $oldKotaId)->decrement('jml_instansi');
            // Tambah jumlah instansi di kota baru
            Kota::where('id_kota', $validate['id_kota'])->increment('jml_instansi');
        }

        $notification = array(
            'message' => "Data instansi berhasil ditambahkan",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('instansi.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_instansi)
    {
        $instansi = Instance::findOrFail($id_instansi);

        $oldKotaId = $instansi->id_kota;

        $instansi->delete();

        Kota::where('id_kota', $oldKotaId)->decrement('jml_instansi');

        $notification = array(
            'message' => "Data instansi berhasil dihapus",
            'alert-type' => 'success'
        );

        return redirect()->route('instansi.index')->with($notification);
    }

    public function getInstansiBySiswa($id_siswa)
    {
        $submission = Submission::where('id_siswa', $id_siswa)->first();

        if (!$submission) {
            return response()->json([]);
        }

        $id_kota = $submission->id_kota;
        $instances = Instance::where('id_kota', $id_kota)->get();

        return response()->json($instances);
    }
}
