<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::all();
        return view('employe')->with(['employes' => $employes]);
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
        $employe            = new employe();
        $employe->name      = $request->employe;
        $employe->phone     = $request->phone;
        $employe->role      = $request->role;
        $employe->status    = $request->status;

        // Save to Database
        $employe->save();
        
        Alert::success('Success!', 'Pegawai berhasil ditambahkan');
        return redirect()->action([EmployeController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employe            = Employe::find($request->id);
        $employe->name      = $request->employe;
        $employe->phone     = $request->phone;
        $employe->role      = $request->role;
        $employe->status    = $request->status;
        $employe->update();

        Alert::success('Success!', 'Pegawai berhasil diedit');
        return redirect()->action([EmployeController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employe)
    {
        //
    }
}
