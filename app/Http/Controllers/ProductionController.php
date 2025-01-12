<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Employe;
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productions    = Production::with(['order', 'employe'])->get();
        $operators      = Employe::where('role', '0')->where('status', '1')->get();
        $orders         = Order::with(['customer', 'sock', 'color'])->where('status', '0')->get();

        return view('production')->with(['orders' => $orders, 'productions' => $productions, 'operators' => $operators]);
    }

    public function dataProduction(Request $request){

        if($request->ajax()){
            
            $data = new Production;
            $data = $data->get();

            return DataTables::of($data)
            ->addColumn('customer',function($data){
                return $data->order->customer->name;
            })
            ->addColumn('sock',function($data){
                return $data->order->sock->name;
            })
            ->addColumn('color',function($data){
                return $data->order->color->name;
            })
            ->addColumn('note',function($data){
                return $data->order->note;
            })
            ->addColumn('operator',function($data){
                return $data->employe->name;
            })
            ->addColumn('production',function($data){
                return $data->amount;
            })
            ->addColumn('shift',function($data){
                if($data->shift == '0'){
                    return 'Pagi';
                }elseif($data->shift == '1'){
                    return 'Siang';
                }else{
                    return 'Malam';
                }
            })
            ->addColumn('date',function($data){
                return Carbon::parse($data->date)->translatedFormat('d M Y');
            })
            ->addColumn('action',function($data){
                return '
                <a href="#" class="btn btn-danger" onclick="deleteData(id = '. $data->id . ', url = \'production\')"><span class="icon-trash"></span></a>
                <button class="btn btn-warning detail" data-toggle="modal" data-target="#UpdateModal" data-id="'. $data->id .'" data-order="'. $data->order->amount .'" data-production="'. $data->order->production->sum("amount") .'" data-customer="'. $data->order->customer->name .'" data-sock="'. $data->order->sock->name .'" data-color="'. $data->order->color->name .'" data-amount="'. $data->amount .'" data-operator="'. $data->employe->id .'" data-shift="'. $data->shift .'" data-date="'. $data->date .'"><span class="icon-pencil"></span></button>
                ';
            })
            ->rawColumns(['shift', 'action'])
            ->make(true);
        }

        return view('production')->with([compact('request')]);

    }

    public function dataOrderProduction(Request $request){

        if($request->ajax()){
            
            $data = Order::where('status', '0')->get();;

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
            ->addColumn('size',function($data){
                return $data->size;
            })
            ->addColumn('note',function($data){
                return $data->note;
            })
            ->addColumn('action',function($data){
                return '
                <button class="btn btn-secondary" onclick="addid(id ='. $data->id.', order = '. $data->amount.', production = '. $data->production->sum("amount").')"><span class="icon-add_circle"></span></button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('order')->with([compact('request')]);

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
            ['order_id' => $request->order_id, 'employe_id' => $request->operator, 'shift' => $request->shift, 'date' => $request->date],
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
        $production         = Production::find($request->id);
        
        if($request->type == '0'){
            $production->amount      = $request->amount * 12;
        } else{
            $production->amount      = $request->amount;

        }
        $production->shift  = $request->shift;
        $production->date   = $request->date ;
        
        // Save to Database
        $production->save();
        
        Alert::success('Success!', 'Produksi berhasil diedit');
        return redirect()->action([ProductionController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Production $production)
    {
        $production->delete();
           
        Alert::success('Success!', 'Produksi berhasil dihapus!');
        return redirect()->action([ProductionController::class, 'index']);
    }
}
