<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Employe;
use App\Models\Finishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FinishingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders         = Order::all();
        $finishs        = Finishing::all();
        $employes       = Employe::whereIn('role', ['1', '2'])->get();

        return view('finishing')->with(['orders' => $orders, 'finishs' => $finishs, 'employes' => $employes]);
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
        if($request->type == '0'){
            $amount      = $request->amount * 12;
        } else{
            $amount      = $request->amount;
        }

        $production = Finishing::updateOrCreate(
            ['order_id' => $request->order_id, 'employe_id' => $request->employe, 'type' => $request->finishing, 'date' => $request->date],
            ['amount' => DB::raw("amount + $amount")]
        );
        
        Alert::success('Success!', 'Finishing berhasil disimpan');
        return redirect()->action([FinishingController::class, 'index']);
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
        $finishing         = Finishing::find($request->id);
        
        if($request->type == '0'){
            $finishing->amount      = $request->amount * 12;
        } else{
            $finishing->amount      = $request->amount;

        }

        $finishing->type   = $request->finishing;
        $finishing->date   = $request->date;
        
        // Save to Database
        $finishing->save();
        
        Alert::success('Success!', 'Finishing berhasil diedit');
        return redirect()->action([FinishingController::class, 'index']);

        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finishing $finishing)
    {
        //
    }
}
