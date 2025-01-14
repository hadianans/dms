@extends('layout')
@section('title', 'Order | Hafsocks')

@section('content')

<div class="row pb-4">
    <div class="col bg-dark text-white p-2 m-2" style="border-radius: 10px;">
        <h1 class="m-0" style="text-align: center;"><b>Data Order</b></h1>
    </div>
</div>

<div class="row pb-4">
    <div class="col">
        <div class="card border-danger mb-3">
            <div class="card-header bg-danger text-white"><b>PO Bulanan</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-clock-o mr-3"></span><span class="amount-dash">{{ \App\Models\Order::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('amount') }}</span></h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-info mb-3">
            <div class="card-header bg-info text-white"><b>Progress</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-gears mr-3"></span><span class="amount-dash">{{ \App\Models\Order::where('status', '0')->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('amount') }}</span></h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-success mb-3">
            <div class="card-header bg-success text-white"><b>Done</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-check-square-o mr-3"></span><span class="amount-dash">{{ \App\Models\Order::where('status', '1')->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('amount') }}</span></h4>
            </div>
        </div>
    </div>
</div>

<div class="row pb-4">
    <div class="col">
        <a href="/history" class="btn btn-secondary" style="float: left; font-weight: 500; width:100px"><span class="icon-history mr-2"></span>history</a>
    </div>
    <div class="col">
        <button class="btn btn-info" data-toggle="modal" data-target="#AddModal" style="float: right; font-weight: 500; width:100px"><span class="icon-plus-circle mr-2"></span>Add</button>
    </div>
</div>

<div class="row">
    <div class="col">
        <table id="order-table" class="table table-hover">
            <thead class="thead-dark">
                <th>Customer</th>
                <th>Sock</th>
                <th>Color</th>
                <th>Total</th>
                <th>Deadline</th>
                <th>Produksi</th>
                <!-- <th>Finishing</th> -->
                <th style="width: 20%;">Note</th>
                <th>Priority</th>
                <th>Action</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>


<!-- Modal Add -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddModalTitle">Tambah Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('order.store') }}" method="POST" class="m-3">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="inputCustomer" class="col-sm-2 col-form-label">Customer</label>
                <div class="col">
                    <input class="form-control" name="customer" list="customerOptions" id="inputCustomer" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
                    <datalist id="customerOptions">
                        @foreach($customers as $customer)
                            <option data-value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSock" class="col-sm-2 col-form-label">Sock</label>
                <div class="col">
                    <input class="form-control" name="sock" list="sockOptions" id="inputSock" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
                    <datalist id="sockOptions">
                        @foreach($socks as $sock)
                            <option data-value="{{ $sock->id }}">{{ $sock->name }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputColor" class="col-sm-2 col-form-label">Color</label>
                <div class="col">
                    <input class="form-control" name="color" list="colorOptions" id="inputColor" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
                    <datalist id="colorOptions">
                        @foreach($colors as $color)
                            <option data-value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 px-75">
                    <label for="inputSize" class="col-sm-2 col-form-label">Size</label>
                    <input type="number" name="size" class="form-control" id="inputSize" placeholder="Size" required>
                </div>
                <div class="col-md-2 px-75">
                    <label for="inputAmount" class="col-sm-2 col-form-label">Total</label>
                    <input type="number" name="amount" class="form-control" id="inputAmount" placeholder="Total" required>
                </div>
                <div class="col-md-2 px-75">
                    <label for="inputType" class="col-sm-2 col-form-label">Type</label>
                    <select name="type" id="inputType" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-md-3 px-75">
                    <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="inputPrice" placeholder="Rp." required>
                </div>
                <div class="col-md-3 px-75">
                    <label for="inputDeadline" class="col-sm-2 col-form-label">Deadline</label>
                    <input type="date" name="deadline" class="form-control" id="inputDeadline" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="inputNote" class="col-sm-2 col-form-label">Note</label>
                    <textarea class="form-control" name="note" id="inputNote" rows="3" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col" style="text-align: center;">
                    <button type="submit" class="btn btn-info"><span class="icon-input"></span> Input</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Add -->

<!-- Modal Update -->
<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="UpdateModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateModalTitle">Update Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="m-3" id="form-update">
            {{ csrf_field() }}
            @method('PUT')
            <input name="id" class="border-0 w-100" type="hidden" id="edit-id" value="">
            <div class="form-group row">
                <label for="updateCustomer" class="col-sm-2 col-form-label">Customer</label>
                <div class="col">
                    <input class="form-control" name="customer" list="customerOptions" id="updateCustomer" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
                    <datalist id="customerOptions">
                        @foreach($customers as $customer)
                            <option data-value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <div class="form-group row">
                <label for="updateSock" class="col-sm-2 col-form-label">Sock</label>
                <div class="col">
                    <input class="form-control" name="sock" list="sockOptions" id="updateSock" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
                    <datalist id="sockOptions">
                        @foreach($socks as $sock)
                            <option data-value="{{ $sock->id }}">{{ $sock->name }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <div class="form-group row">
                <label for="updateColor" class="col-sm-2 col-form-label">Color</label>
                <div class="col">
                    <input class="form-control" name="color" list="colorOptions" id="updateColor" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
                    <datalist id="colorOptions">
                        @foreach($colors as $color)
                            <option data-value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 px-75">
                    <label for="updateSize" class="col-sm-2 col-form-label">Size</label>
                    <input type="number" name="size" class="form-control" id="updateSize" placeholder="Size" required>
                </div>
                <div class="col-md-2 px-75">
                    <label for="updateAmount" class="col-sm-2 col-form-label">Total</label>
                    <input type="number" name="amount" class="form-control" id="updateAmount" placeholder="Total" required>
                </div>
                <div class="col-md-2 px-75">
                    <label for="updateType" class="col-sm-2 col-form-label">Type</label>
                    <select name="type" id="updateType" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-md-3 px-75">
                    <label for="updatePrice" class="col-sm-2 col-form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="updatePrice" placeholder="Rp." required>
                </div>
                <div class="col-md-3 px-75">
                    <label for="updateDeadline" class="col-sm-2 col-form-label">Deadline</label>
                    <input type="date" name="deadline" class="form-control" id="updateDeadline" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="updateNote" class="col-sm-2 col-form-label">Note</label>
                    <textarea class="form-control" name="note" id="updateNote" rows="3" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col" style="text-align: center;">
                    <button type="submit" class="btn btn-info"><span class="icon-input"></span> Update</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Update -->

{{-- form order hidden --}}
<form action="" method="GET" id="form-order">
    <input type="hidden" name="_method" value="EDIT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@push('styles')
<link href="{{ asset('css/order.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/order.js') }}"></script>
@endpush

@endsection