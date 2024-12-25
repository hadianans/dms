<?php

namespace App\Http\Controllers;

use App\Models\Finishing;
use Illuminate\Http\Request;

class FinishingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('finishing');
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
    public function show(Finishing $finishing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finishing $finishing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Finishing $finishing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finishing $finishing)
    {
        //
    }
}
