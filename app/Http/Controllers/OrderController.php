<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Sock;
use App\Models\Color;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socks      = Sock::all();
        $colors     = Color::all();
        $customers  = Customer::all();

        return view('order')->with(['socks' => $socks, 'colors' => $colors, 'customers' => $customers]);
    }

    /**
     * Display a listing of the resource history.
     */
    public function history()
    {
        return view('history');
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
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
