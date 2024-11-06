<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jadwal = Jadwal::with('kelas','guru')->latest()->paginate(5);
        return view('jadwal.index',compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kelaslist = Kelas::all();
        $guru = Guru::all();
        return view('jadwal.create',compact('kelaslist','guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kelas_id' => 'required',
            'guru_id' => 'required',
            'nama' => 'required|min:3',
            'day_of_week' => 'required',
            'waktu_mulai' => 'required',
            'waktu_habis' => 'required'
        ]);

        Jadwal::create([
            'kelas_id' => $request->kelas_id,
            'guru_id' => $request->guru_id,
            'nama' => $request->nama,
            'day_of_week' => $request->day_of_week,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_habis' => $request->waktu_habis
        ]);

        return redirect()->route('jadwal.index')->with('success','Data berhasil disimpan');
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
        $jadwal = Jadwal::findOrFail($id);
        $kelaslist = Kelas::all();
        $guru = Guru::all();
        return view('jadwal.edit',compact('jadwal','kelaslist','guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'kelas_id' => 'required',
            'guru_id' => 'required',
            'nama' => 'required|min:3',
            'day_of_week' => 'required',
            'waktu_mulai' => 'required',
            'waktu_habis' => 'required'
        ]);

        Jadwal::create([
            'kelas_id' => $request->kelas_id,
            'guru_id' => $request->guru_id,
            'nama' => $request->nama,
            'day_of_week' => $request->day_of_week,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_habis' => $request->waktu_habis
        ]);

        return redirect()->route('jadwal.index')->with('success','Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
