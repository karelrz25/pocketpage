<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use Carbon\Carbon;

class AdminBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = buku::all();
        return view('admin.buku.index', compact('buku'));
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
        //
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
        // dd($request->all());
        $request->validate([
            'status'=>'required',
            'rekomendasi'=>'required',
        ]);

        $buku = [
            'status' => $request->status,
            'rekomendasi' => $request->rekomendasi,
            'updated_at' => Carbon::now(),
        ];

        Buku::where('id', $id)->update($buku);
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buku::where('id', $id)->delete();
        return redirect()->route('buku.index');
    }
}
