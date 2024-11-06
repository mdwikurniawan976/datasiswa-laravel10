<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $g =  Guru::latest()->paginate(5);
        return view('guru.index',compact('g'));
    }

    /**
     * Show the form for creating a new resource.   
     */
    public function create()
    {
        //
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email|min:3',
            'nohp' => 'required|min:5'
        ]);
        
        Guru::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nohp' => $request->nohp
        ]);

        return redirect()->route('guru.index')->with('success','Data berhasil ditambah');
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
        $guru = Guru::findOrFail($id);
        return view('guru.edit',compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email|min:3',
            'nohp' => 'required|min:5'
        ]);
        $guru = Guru::findOrFail($id);
        $guru->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'nohp' => $request->nohp
        ]);

        return redirect()->route('guru.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success','Data berhasil dihapus');
    }
}
