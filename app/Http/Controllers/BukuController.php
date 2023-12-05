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
        $data = buku::all();
        return view('user.buku.ceritasaya', compact('data')); 
    }

    public function tampil($filename)
    {
        $path = public_path('storage/uploadpdf/'.$filename);
        return view('user.buku.pdf.index', compact('path','filename'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
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

        $user_id = Auth::id();

        buku::create([
            'cover' => $imageName,
            'pdf' => $nama_file,
            'path' => $path,
            'judul' => $request->input('judul'),
            'sinopsis' => $request->input('sinopsis'),
            'id_kategori' => $request->input('kategori'),
            'id_penulis' => $user_id,
            'status' => "P",
        ]);

        return redirect()->route('buku.create')->with('success', 'Buku Uploaded Successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($filename)
    {

         $item = Buku::where('pdf', $filename)->first();

        if (!$item) {
            abort(404, 'File not found');
        }

        $path = public_path('storage/uploadpdf/' . $filename);

        // Pastikan file ada sebelum ditampilkan
        if (file_exists($path)) {
            return redirect()->route('user.buku.tampil', ['filename' => $filename]);
        } else {
            abort(404, 'File not found');
        }

        // $path = public_path('storage/uploadpdf/' . $filename);

        // // Pastikan file ada sebelum ditampilkan
        // if (file_exists($path)) {
        //     $file = file_get_contents($path);

        //     return redirect()->route('user.buku.tampil', ['filename'=>$item->pdf]);

        //     // return response($file, 200, [
        //     //     'Content-Type' => 'aplication/pdf',
        //     // ]);
        // } else {
        //     abort(404, 'File not found');
        // }
    }

    // Tampil PDF
    // public function bacapdf($id) 
    // {
    //     $pdf = buku::findOrFail($id);

    //     // Tampilkan isi PDF
    //     return PDF::loadFile(storage_path('app/public/' . $pdf->path))->stream();
    // }

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
