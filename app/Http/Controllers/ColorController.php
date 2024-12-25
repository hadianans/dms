<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        return view('color')->with(['colors' => $colors]);
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
        $color = new Color();
        $color->name = $request->color;

        // Save to Database
        $color->save();
        
        Alert::success('Success!', 'Warna berhasil ditambahkan');
        return redirect()->action([ColorController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $color = Color::find($request->id);
        $color->name  = $request->color;
        $color->update();

        Alert::success('Success!', 'Warna berhasil diedit');
        return redirect()->action([ColorController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::find($id);
        $color->delete();
        
        Alert::success('Success!', 'Warna berhasil dihapus');
        return redirect()->action([ColorController::class, 'index']);
    }
}
