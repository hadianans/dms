<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Order;
use App\Models\Sock;
use App\Models\Color;
use App\Models\Customer;
use App\Models\Finishing;
use App\Models\Production;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
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

        return view('order')->with(['orders' => $orders, 'socks' => $socks, 'colors' => $colors, 'customers' => $customers,]);
    }

    public function dataOrder(Request $request){

        if($request->ajax()){
            
            $data = new Order;
            $data = $data->get();

            return DataTables::of($data)
            ->addColumn('customer',function($data){
                return $data->customer->name;
            })
            ->addColumn('sock',function($data){
                return $data->sock->name;
            })
            ->addColumn('color',function($data){
                return $data->color->name;
            })
            ->addColumn('amount',function($data){
                return $data->amount;
            })
            ->addColumn('deadline',function($data){
                return Carbon::parse($data->deadline)->translatedFormat('d M Y');
            })
            ->addColumn('production',function($data){
                return $data->production->sum('amount');
            })
            ->addColumn('note',function($data){
                return $data->note;
            })
            ->addColumn('priority',function($data){
                if($data->priority == '0'){
                    return '<span class="btn btn-primary priority" onclick="changePriority(id = '.$data->id.', priority = '.$data->priority.', this)">Normal</span>';
                }else{
                    return '<span class="btn btn-danger priority" onclick="changePriority(id = '.$data->id.', priority = '.$data->priority.', this)">Urgen</span>';
                }
            })
            ->addColumn('action',function($data){
                return '
                <a href="#" class="btn btn-danger" onclick="deleteData(id = ' . $data->id . ', url = \'order\')"><span class="icon-trash"></span></a>
                <a href="#" class="btn btn-warning detail" data-toggle="modal" data-target="#UpdateModal" data-id="'. $data->id .'" data-customer="'.$data->customer->name.'" data-sock="'.$data->sock->name.'" data-color="'.$data->color->name.'" data-size="'.$data->size.'" data-amount="'.$data->amount.'" data-price="'.$data->price.'" data-deadline="'.$data->deadline.'" data-note="'.$data->note.'"><span class="icon-pencil"></span></a>
                <a href="#" class="btn btn-success" onclick="doneOrder(id = ' . $data->id . ', amount = ' .$data->amount. ', production = '.$data->production->sum("amount").')"><span class="icon-check-square"></span></a>
                ';
            })
            ->rawColumns(['priority', 'action'])
            ->make(true);
        }


        return view('order')->with([compact('request')]);

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
        $order->priority    = '0';
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
            $order->amount  = $request->amount * 12;
        } else{
            $order->amount  = $request->amount;
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

    public function changePriority(Request $request){

        $id         = $request->input('id');
        $priority   = $request->input('priority');

        $order = Order::find($id);

        if ($priority == 0) {

            $order->priority = '1';
            $order->save();

            return response()->json([
                'status' => 'success',
            ]);
        }
        elseif($priority == 1){

            $order->priority = '0';
            $order->save();

            return response()->json([
                'status' => 'success',
            ]);
        }
        else {
            return response()->json([
                'status' => 'error',
                'message' => 'Error tidak diketahui!',
            ]);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        
        Production::where('order_id', $order->id)->delete();
        Finishing::where('order_id', $order->id)->delete();
           
        Alert::success('Success!', 'Order berhasil dihapus!');
        return redirect()->action([OrderController::class, 'index']);
    }
}
