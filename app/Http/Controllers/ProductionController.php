<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders         = Order::all();
        $productions    = Production::all();

        return view('production')->with(['orders' => $orders, 'productions' => $productions]);
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

        $production = Production::updateOrCreate(
            ['order_id' => $request->order_id, 'shift' => $request->shift, 'date' => $request->date],
            ['amount' => DB::raw("amount + $amount")]
        );
        
        Alert::success('Success!', 'Produksi berhasil disimpan');
        return redirect()->action([ProductionController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Production $production)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Production $production)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Production $production)
    {
        //
    }
}
