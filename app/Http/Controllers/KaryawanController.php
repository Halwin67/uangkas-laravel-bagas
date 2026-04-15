<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // READ
    public function index()
    {
        $karyawan = Karyawan::all(); // -> SELECT * FROM karyawan;

        return view('karyawan.index', ['karyawan' => $karyawan]);
    }

    public function show()
    {
        return view('karyawan.tambah');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'posisi' => 'required'
        ]);
    
        Karyawan::create([
            'nama' => $validatedData['nama'],
            'posisi' => $validatedData['posisi']
        ]);

        return redirect('/karyawan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        return view('karyawan.edit', ['karyawan' => $karyawan]);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'posisi' => 'required'
        ]);
        
        $karyawan->update([
            'nama' => $request->nama,
            'posisi' => $request->posisi
        ]);

        return redirect('/karyawan');
    }

    // DELETE
    public function destroy($id)
    {
        Karyawan::destroy($id);

        return redirect('/karyawan');
    }
}