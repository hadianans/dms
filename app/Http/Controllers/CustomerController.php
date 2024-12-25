<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer')->with(['customers' => $customers]);
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
        $customer           = new Customer();
        $customer->name     = $request->name;
        $customer->email    = $request->email;
        $customer->phone    = $request->phone;
        $customer->address  = $request->address;

        // Save to Database
        $customer->save();
        
        Alert::success('Success!', 'Customer berhasil ditambahkan');
        return redirect()->action([CustomerController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer           = Customer::find($request->id);
        $customer->name     = $request->name;
        $customer->email    = $request->email;
        $customer->email    = $request->email;
        $customer->address  = $request->address;
        
        $customer->update();

        Alert::success('Success!', 'Customer berhasil diedit');
        return redirect()->action([CustomerController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
