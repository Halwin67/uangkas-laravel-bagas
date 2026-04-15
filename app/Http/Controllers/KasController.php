<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Siswa; // Pastikan ini ada
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    
    // Pastikan ini Siswa::bukan Kas::
    $data_kas = Siswa::with('kas')
        ->when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%");
        })
        ->paginate(10);

    return view('kas.index', compact('data_kas'));
}
}