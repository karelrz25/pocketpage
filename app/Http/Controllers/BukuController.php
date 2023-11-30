<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\kategori;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.buku.lihat'); 
    }

    public function CeritaSaya()
    {
        return view('user.buku.ceritasaya'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.buku.nulis', [
            'categories' => kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cover Image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'judul' => 'required|max:255',
            'sinopsis' => 'required',
            'kategori' => 'required'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('asset/upload_buku'),$imageName);

        buku::create([
            'cover'=>$imageName,
            'judul'=> request('judul'),
            'sinopsis'=> request('sinopsis'),
            'id_kategori' => request('kategori')
        ]);

        return redirect()->route('buku.create')
        ->with('success','Buku Uploaded Successfully.');
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
