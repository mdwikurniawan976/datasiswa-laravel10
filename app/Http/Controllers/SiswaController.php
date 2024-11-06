<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $siswa =  Siswa::with('kelas')->latest()->paginate(5);
        return view('siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kelaslist =  Kelas::all();
        return view('siswa.create',compact('kelaslist'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'foto' => 'required|image|mimes:png,jpg,jpeg,webp,svg|max:2048',
            'nama' => 'required|min:5',
            'nis'  => 'required|min:10',
            'tanggal' => 'required|date',
            'kelas_id' => 'required'
        ]);


        $foto = $request->file('foto');
        $foto->storeAs('public/foto', $foto->hashName());

        Siswa::create([
            'foto' => $foto->hashName(),
            'nama' => $request->nama,
            'nis' => $request->nis,
            'tanggal' => $request->tanggal,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect()->route('siswa.index')->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $siswa = Siswa::with('kelas')->findOrFail($id);
        return view('siswa.show',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $siswa = Siswa::with('kelas')->findOrFail($id);
        $kelaslist =  Kelas::all();
        return view('siswa.edit',compact('siswa','kelaslist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'foto' => 'image|mimes:png,jpg,jpeg,webp,svg|max:2048',
            'nama' => 'required|min:5',
            'nis'  => 'required|min:10',
            'tanggal' => 'required|date',
            'kelas_id' => 'required'
        ]);

        $siswa = Siswa::with('kelas')->findOrFail($id);
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $foto->storeAs('public/foto', $foto->hashName());
            Storage::delete('public/foto', $siswa->foto);

            $siswa->update([
                'foto' => $foto->hashName(),
                'nama' => $request->nama,
                'nis' => $request->nis,
                'tanggal' => $request->tanggal,
                'kelas_id' => $request->kelas_id
            ]);
        }else{
            $siswa->update([
          
                'nama' => $request->nama,
                'nis' => $request->nis,
                'tanggal' => $request->tanggal,
                'kelas_id' => $request->kelas_id
            ]);
        }
        
        return redirect()->route('siswa.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $siswa = Siswa::with('kelas')->findOrFail($id);
        Storage::delete('public/foto', $siswa->foto);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success','Data berhasil dihapus');
    }
}
