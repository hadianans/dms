<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Sock;
use App\Models\Color;
use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders     = Order::with(['customer', 'sock', 'color'])->where('status', '0')->get();
        $socks      = Sock::all();
        $colors     = Color::all();
        $customers  = Customer::all();

        return view('order')->with(['orders' => $orders, 'socks' => $socks, 'colors' => $colors, 'customers' => $customers]);
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
        $order = new order();
        $order->customer_id = Customer::where('name', $request->customer)->first()->id;
        $order->sock_id     = Sock::where('name', $request->sock)->first()->id;
        $order->color_id    = Color::where('name', $request->color)->first()->id;
        $order->size        = $request->size;
        
        if($request->type == '0'){
            $order->amount      = $request->amount * 12;
        } else{
            $order->amount      = $request->amount;
        }
        
        $order->price       = $request->price;
        $order->deadline    = $request->deadline;
        $order->note        = $request->note;
        $order->status      = '0';

        // Save to Database
        $order->save();
        
        Alert::success('Success!', 'Order berhasil disimpan');
        return redirect()->action([OrderController::class, 'index']);
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
        $order->status      = '1';
        $order->save();
        
        Alert::success('Success!', 'Order selesai!');
        return redirect()->action([OrderController::class, 'index']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order = Order::find($request->id);
        $order->customer_id = Customer::where('name', $request->customer)->first()->id;
        $order->sock_id     = Sock::where('name', $request->sock)->first()->id;
        $order->color_id    = Color::where('name', $request->color)->first()->id;
        $order->size        = $request->size;
        
        if($request->type == '0'){
            $order->amount      = $request->amount * 12;
        } else{
            $order->amount      = $request->amount;
        }
        
        $order->price       = $request->price;
        $order->deadline    = $request->deadline;
        $order->note        = $request->note;
        $order->status      = '0';

        // Save to Database
        $order->save();
        
        Alert::success('Success!', 'Order berhasil diedit');
        return redirect()->action([OrderController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
           
        Alert::success('Success!', 'Order berhasil dihapus!');
        return redirect()->action([OrderController::class, 'index']);
    }
}
