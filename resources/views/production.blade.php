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
                <h4 class="card-title"><span class="icon-gears mr-3"></span>2015Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-info mb-3">
            <div class="card-header bg-info text-white"><b>Shift Pagi</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-clock-o mr-3"></span>75Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-warning mb-3">
            <div class="card-header bg-warning text-white"><b>Shift Siang</b></div>
            <div class="card-body">
                <h4 class="card-title"><span class="icon-wb_sunny mr-3"></span>450Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white"><b>Shift Malam</b></div>
            <div class="card-body">
                <h4 class="card-title"><span class="icon-moon-o mr-3"></span>1050Dz</h4>
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
        <table id="table" class="table table-hover">
            <thead class="thead-dark">
                <!-- <th>No</th> -->
                <th>Customer</th>
                <th>Sock</th>
                <th>Color</th>
                <th>Note</th>
                <th>Produksi</th>
                <th>Shift</th>
                <th>Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($productions as $production)
                <tr>
                    <!-- <td>{{ $loop->iteration }}</td> -->
                    <td>{{ $production->order->customer->name }}</td>
                    <td>{{ $production->order->sock->name }}</td>
                    <td>{{ $production->order->color->name }}</td>
                    <td>{{ $production->order->note }}</td>
                    <td class="amount">{{ $production->amount }}</td>

                    @if($production->shift == '0')
                        <td>Pagi</td>
                    @elseif($production->shift == '1')
                        <td>Siang</td>
                    @else
                        <td>Malam</td>
                    @endif
                    <td>{{ \Carbon\Carbon::parse($production->date)->translatedFormat('d M Y') }}</td>
                    <td>
                        <a href="#" class="btn btn-danger"><span class="icon-trash"></span></a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#UpdateModal"><span class="icon-pencil"></span></button>
                    </td>
                </tr>
                @endforeach
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
                <div class="col-lg-2">
                    <label for="inputId" class="col col-form-label">ID PO</label>
                    <input type="number" name="order_id" class="form-control" id="inputId" placeholder="ID PO" required>
                </div>
                <div class="col-lg-2">
                    <label for="inputAmount" class="col col-form-label">Total</label>
                    <input type="number" name="amount" class="form-control" id="inputAmount" placeholder="Total" required>
                </div>
                <div class="col-lg-2">
                    <label for="inputType" class="col col-form-label">Type</label>
                    <select id="inputType" name="type" class="form-control" onchange="tes(this)" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="inputShift" class="col col-form-label">Shift</label>
                    <select id="inputShift" name="shift" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Pagi</option>
                        <option value="1">Siang</option>
                        <option value="2">Malam</option>
                    </select>
                </div>
                <div class="col-lg-4">
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
                <table id="table-detail" class="table table-hover">
                    <thead class="thead-dark">
                        <th>Customer</th>
                        <th>Sock</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Note</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->sock->name }}</td>
                            <td>{{ $order->color->name }}</td>
                            <td>{{ $order->size }}</td>
                            <td>{{ $order->note }}</td>
                            <td>
                                <button class="btn btn-secondary" onclick="addid(id = {{ $order->id }}, order = {{ $order->amount }}, production = {{ $order->production->sum('amount') }})"><span class="icon-add_circle"></span></button>
                            </td>
                        </tr>
                        @endforeach
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
        <form class="m-3">
            <div class="form-group row">
                <div class="col-lg-2">
                    <label for="updateId" class="col col-form-label">ID PO</label>
                    <input type="number" class="form-control" id="updateId" placeholder="ID PO" readonly>
                </div>
                <div class="col-lg-2">
                    <label for="updateTotal" class="col col-form-label">Total</label>
                    <input type="number" class="form-control" id="updateTotal" placeholder="Total">
                </div>
                <div class="col-lg-2">
                    <label for="updateType" class="col col-form-label">Type</label>
                    <select id="updateType" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="updateShift" class="col col-form-label">Shift</label>
                    <select id="updateShift" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Pagi</option>
                        <option value="1">Siang</option>
                        <option value="2">Malam</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="updateDate" class="col col-form-label">Date</label>
                    <input type="date" class="form-control" id="updateDate">
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col" style="text-align: center;">
                    <button type="button" class="btn btn-info"><span class="icon-input"></span> Input</button>
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