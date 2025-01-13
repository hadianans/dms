@extends('layout')
@section('title', 'Production | Hafsocks')

@section('content')

<div class="row pb-4">
    <div class="col bg-dark text-white p-2 m-2" style="border-radius: 10px;">
        <h1 class="m-0" style="text-align: center;"><b>Data Produksi</b></h1>
    </div>
</div>

<div class="row pb-4">
    <div class="col">
        <div class="card border-dark mb-3">
            <div class="card-header bg-dark text-white"><b>Total Produksi</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title amount"><span class="icon-gears mr-3"></span>{{ \App\Models\Production::sum('amount') }}</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-info mb-3">
            <div class="card-header bg-info text-white"><b>Shift Pagi</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title amount"><span class="icon-clock-o mr-3"></span>{{ \App\Models\Production::where('shift', '0')->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('amount') }}</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-warning mb-3">
            <div class="card-header bg-warning text-white"><b>Shift Siang</b></div>
            <div class="card-body">
                <h4 class="card-title amount"><span class="icon-wb_sunny mr-3"></span>{{ \App\Models\Production::where('shift', '1')->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('amount') }}</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white"><b>Shift Malam</b></div>
            <div class="card-body">
                <h4 class="card-title amount"><span class="icon-moon-o mr-3"></span>{{ \App\Models\Production::where('shift', '2')->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('amount') }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="row pb-4">
    <!-- <div class="col">
        <button class="btn btn-secondary" style="float: left; font-weight: 500; width:100px"><span class="icon-history mr-2"></span>history</button>
    </div> -->
    <div class="col" style="text-align: center;">
        <button class="btn btn-secondary" data-toggle="modal" data-target="#AddModal" style="font-weight: 500; width:100px"><span class="icon-plus-circle mr-2"></span>Add</button>
    </div>
</div>

<div class="row">
    <div class="col">
        <table id="production-table" class="table table-hover">
            <thead class="thead-dark">
                <!-- <th>No</th> -->
                <th>Customer</th>
                <th>Sock</th>
                <th>Color</th>
                <th>Note</th>
                <th>Operator</th>
                <th>Produksi</th>
                <th>Shift</th>
                <th>Date</th>
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
        <h5 class="modal-title" id="AddModalTitle">Tambah Produksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('production.store') }}" method="POST" class="mx-3 mb-3">
            {{ csrf_field() }}
            <div class="form-group row">
                <div class="col-lg-2 px-75">
                    <label for="inputId" class="col col-form-label">ID PO</label>
                    <input type="number" name="order_id" class="form-control" id="inputId" placeholder="ID PO" required>
                </div>
                <div class="col-lg-2 px-75">
                    <label for="inputAmount" class="col col-form-label">Total</label>
                    <input type="number" name="amount" class="form-control" id="inputAmount" placeholder="Total" required>
                </div>
                <div class="col-lg-2 px-75">
                    <label for="inputType" class="col col-form-label">Type</label>
                    <select id="inputType" name="type" class="form-control" onchange="inputselect(this)" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-lg-2 px-75">
                    <label for="inputShift" class="col col-form-label">Shift</label>
                    <select id="inputShift" name="shift" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Pagi</option>
                        <option value="1">Siang</option>
                        <option value="2">Malam</option>
                    </select>
                </div>
                <div class="col-lg-2 px-75">
                    <label for="inputOperator" class="col col-form-label">Operator</label>
                    <select id="inputOperator" name="operator" class="form-control" required>
                        <option selected value="">...</option>
                        @foreach($operators as $operator)
                        <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 px-75">
                    <label for="inputDate" class="col col-form-label">Date</label>
                    <input type="date" name="date" class="form-control" id="inputDate" required>
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col" style="text-align: center;">
                    <button type="submit" class="btn btn-info"><span class="icon-input"></span> Input</button>
                </div>
            </div>
        </form>
        <div class="form-group row m-3">
            <div class="col">
                <table id="order-detail" class="table table-hover">
                    <thead class="thead-dark">
                        <th>Customer</th>
                        <th>Sock</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Note</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
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
        <h5 class="modal-title" id="UpdateModalTitle">Update Produksi</h5>
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
                <div class="col-lg-3">
                    <label for="updateCustomer" class="col col-form-label">Customer</label>
                    <input type="text" class="form-control" id="updateCustomer" readonly>
                </div>
                <div class="col-lg-3">
                    <label for="updateSock" class="col col-form-label">Sock</label>
                    <input type="text" class="form-control" id="updateSock" readonly>
                </div>
                <div class="col-lg-3">
                    <label for="updateColor" class="col col-form-label">Color</label>
                    <input type="text" class="form-control" id="updateColor" readonly>
                </div>
                <div class="col-lg-3">
                    <label for="updateOperator" class="col col-form-label">Operator</label>
                    <select id="updateOperator" name="operator" class="form-control" disabled="true">
                        <option value="">...</option>
                        @foreach($operators as $operator)
                        <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <!-- <div class="col-lg-2">
                    <label for="updateId" class="col col-form-label">ID PO</label>
                    <input type="number" class="form-control" id="updateId" placeholder="ID PO" readonly>
                </div> -->
                <div class="col-lg-3">
                    <label for="updateAmount" class="col col-form-label">Total</label>
                    <input type="number" name="amount" class="form-control" id="updateAmount" placeholder="Total">
                </div>
                <div class="col-lg-3">
                    <label for="updateType" class="col col-form-label">Type</label>
                    <select id="updateType" name="type" class="form-control" onchange="updateselect(this)" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label for="updateShift" class="col col-form-label">Shift</label>
                    <select id="updateShift" name="shift" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Pagi</option>
                        <option value="1">Siang</option>
                        <option value="2">Malam</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label for="updateDate" class="col col-form-label">Date</label>
                    <input type="date" name="date" class="form-control" id="updateDate">
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col" style="text-align: center;">
                    <button type="submit" class="btn btn-info"><span class="icon-input"></span> Input</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Update -->

@push('styles')
<link href="{{ asset('css/production.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/production.js') }}"></script>
@endpush

@endsection