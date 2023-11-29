<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\serie;
use Carbon\Carbon;

class AdminSeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Serie::all();
        return view('admin.series.index', compact('series'));
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
        ]);

        $series = [
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ];

        Serie::where('id', $id)->update($series);
        return redirect()->route('series.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Serie::where('id', $id)->delete();
        return redirect()->route('series.index');
    }
}
