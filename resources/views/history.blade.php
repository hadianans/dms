@extends('layout')
@section('title', 'History | Hafsocks')

@section('content')

<div class="row pb-4">
    <div class="col bg-dark text-white p-2 m-2" style="border-radius: 10px;">
        <h1 class="m-0" style="text-align: center;"><b>History Order</b></h1>
    </div>
</div>

<div class="row pb-4">
    <div class="col">
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white"><b>Total PO</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title amount"><span class="icon-th-list mr-3"></span>{{ \App\Models\Order::sum('amount') }}</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger mb-3">
            <div class="card-header bg-danger text-white"><b>Customer</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-clock-o mr-3"></span>{{ \App\Models\Customer::count() }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <table id="history-table" class="table table-hover">
            <thead class="thead-dark">
                <th>Customer</th>
                <th>Sock</th>
                <th>Color</th>
                <th>Size</th>
                <th>Total</th>
                <th>Price</th>
                <th>Done</th>
                <th>Note</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

@push('styles')
<link href="{{ asset('css/history.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/history.js') }}"></script>
@endpush

@endsection