<?php

namespace App\Http\Controllers;

use App\Models\Sock;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socks = Sock::all();
        return view('sock')->with(['socks' => $socks]);
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

        $sock = new Sock();
        $sock->name = $request->sock;

        // Save to Database
        $sock->save();
        
        Alert::success('Success!', 'Kaos Kaki berhasil ditambahkan');
        return redirect()->action([SockController::class, 'index']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Sock $sock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sock $sock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sock = Sock::find($request->id);
        $sock->name  = $request->sock;
        $sock->update();

        Alert::success('Success!', 'Kaos Kaki berhasil diedit');
        return redirect()->action([SockController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sock = Sock::find($id);
        $sock->delete();
        
        Alert::success('Success!', 'Kaos Kaki berhasil dihapus');
        return redirect()->action([SockController::class, 'index']);
    }
}
