<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\kategori;

class UploadpdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('uploadpdf.index', compact('pdfFiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1204',
            'judul' => 'required|max:255',
            'sinopsis' => 'required',
            'kategori' => 'required'
        ]);

        // Cover
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('asset/img/cover'),$imageName);

        // pdf
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $path = $file->storeAs('uploadpdf', $nama_file, 'public');

        buku::create([
            'cover' => $imageName,
            'pdf' => $nama_file,
            'path' => $path,
            'judul'=> request('judul'),
            'sinopsis'=> request('sinopsis'),
            'id_kategori' => request('kategori'),
        ]);

        return redirect()->route('uploadpdf.create')->with('success', 'PDF Berhasil Diupload');
    }

    /**
     * Display the specified resource.
     */
     public function show($filename)
    {
        $filePath = storage_path('app/public/uploadpdf/'.$filename);

        // Pastikan file ada sebelum ditampilkan
        if (file_exists($filePath)) {
            return view('user.buku.pdf.index', compact('filePath'));
        } else {
            abort(404); // Atau tindakan lain sesuai kebutuhan
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
