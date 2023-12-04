<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use Carbon\Carbon;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
        $request->validate([
            'nama'=>'required',
        ],[
            'nama.required'=>'Nama Kategori Wajib Diisi',
        ]);
        
        // Cek apakah kagori sudah ada?
        $dataKategori = Kategori::where('nama', $request->nama)->first();
        if ($dataKategori) {
            return redirect()->route('kategori.index');
        }

        $kategori = [
            'nama' => $request->nama,
            'created_at' => Carbon::now(),
        ];

        Kategori::create($kategori);
        return redirect()->route('kategori.index');
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
        //  dd($request->all());
        $request->validate([
            'nama'=>'required',
        ],[
            'nama.required'=>'Nama Kategori Wajib Diisi',
        ]);

        // Cek apakah kagori sudah ada?
        $dataKategori = Kategori::where('nama', $request->nama)->first();
        if ($dataKategori) {
            return redirect()->route('kategori.index');
        }

        $kategori = [
            'nama' => $request->nama,
            'updated_at' => Carbon::now(),
        ];

        Kategori::where('id', $id)->update($kategori);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::where('id', $id)->delete();
        return redirect()->route('kategori.index');
    }
}
