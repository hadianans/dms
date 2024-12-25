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
            <div class="card-header bg-primary text-white"><b>Total Order</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-th-list mr-3"></span>2015Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger mb-3">
            <div class="card-header bg-danger text-white"><b>Customer</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-clock-o mr-3"></span>75Dz</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <table id="table" class="table table-hover">
            <thead class="thead-dark">
                <th>No</th>
                <th>Customer</th>
                <th>Sock</th>
                <th>Color</th>
                <th>Size</th>
                <th>Total</th>
                <th>Done</th>
                <th>Note</th>
                <!-- <th>Action</th> -->
            </thead>
            <tbody>
                @for($i = 0; $i < 100; $i++)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>Abdul</td>
                    <td>Oldschool</td>
                    <td>White</td>
                    <td>L</td>
                    <td>50 dz</td>
                    <td>15 Januari</td>
                    <td>Oldschool putih garis hitam, size L</td>
                    <!-- <td>
                        <a href="#" class="btn btn-danger"><span class="icon-trash"></span></a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#UpdateModal"><span class="icon-pencil"></span></button>
                        <a href="#" class="btn btn-success"><span class="icon-check-square"></span></a>
                    </td> -->
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>

@push('styles')
<link href="{{ asset('css/order.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/order.js') }}"></script>
@endpush

@endsection