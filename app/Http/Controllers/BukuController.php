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
        // 
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

    public function pdf()
    {
        return view('user.buku.pdf.create', [
            'categories' => kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'judul' => 'required|max:255',
            'sinopsis' => 'required',
            'kategori' => 'required',
            'file' => 'mimes:pdf|max:10240', 
        ]);

        // Cover Image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('asset/img/cover'), $imageName);

        // PDF
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $path = $file->storeAs('uploadpdf', $nama_file, 'public');
        } else {
            $nama_file = null;
            $path = null;
        }

        buku::create([
            'cover' => $imageName,
            'pdf' => $nama_file,
            'path' => $path,
            'judul' => $request->input('judul'),
            'sinopsis' => $request->input('sinopsis'),
            'id_kategori' => $request->input('kategori'),
        ]);

        return redirect()->route('buku.create')->with('success', 'Buku Uploaded Successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($filename)
    {
        $nama_file = public_path('storage/uploadpdf/'.$filename);

        // Pastikan file ada sebelum ditampilkan
        if (file_exists($nama_file)) {
            return view('user.buku.pdf.index', compact('nama_file'));
        } else {
            return response()->json(['error' => 'File Tidak Diktemukan'], 404);
        }
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
