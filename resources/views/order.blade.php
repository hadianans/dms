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
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white"><b>Total PO</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-th-list mr-3"></span>2015Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger mb-3">
            <div class="card-header bg-danger text-white"><b>Pending</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-clock-o mr-3"></span>75Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-warning mb-3">
            <div class="card-header bg-warning text-white"><b>Progress</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-gears mr-3"></span>450Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-success mb-3">
            <div class="card-header bg-success text-white"><b>Done</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-check-square-o mr-3"></span>1050Dz</h4>
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
        <table id="table" class="table table-hover">
            <thead class="thead-dark">
                <th>No</th>
                <th>Customer</th>
                <th>Sock</th>
                <th>Color</th>
                <th>Size</th>
                <th>Total</th>
                <th>Deadline</th>
                <th>Produksi</th>
                <th>Finishing</th>
                <th>Note</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->sock->name }}</td>
                    <td>{{ $order->color->name }}</td>
                    <td>{{ $order->size }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->deadline }}</td>
                    <td>40/50 (80%)</td>
                    <td>25/50 (50%)</td>
                    <td>{{ $order->note }}</td>
                    <td>
                        <a href="#" class="btn btn-danger" onclick="deleteData(id = '{{$order->id}}', url = 'order')"><span class="icon-trash"></span></a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#UpdateModal"><span class="icon-pencil"></span></button>
                        <a href="#" class="btn btn-success"><span class="icon-check-square"></span></a>
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
                    <input class="form-control" list="customerOptions" id="inputCustomer" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
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
                    <input class="form-control" list="sockOptions" id="inputSock" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
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
                    <input class="form-control" list="colorOptions" id="inputColor" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
                    <datalist id="colorOptions">
                        @foreach($colors as $color)
                            <option data-value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="inputSize" class="col-sm-2 col-form-label">Size</label>
                    <input type="number" class="form-control" id="inputSize" placeholder="Size">
                </div>
                <div class="col-md-3">
                    <label for="inputTotal" class="col-sm-2 col-form-label">Total</label>
                    <input type="number" class="form-control" id="inputTotal" placeholder="Total">
                </div>
                <div class="col-md-2">
                    <label for="inputType" class="col-sm-2 col-form-label">Type</label>
                    <select id="inputType" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="inputDeadline" class="col-sm-2 col-form-label">Deadline</label>
                    <input type="date" class="form-control" id="inputDeadline">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="inputNote" class="col-sm-2 col-form-label">Note</label>
                    <textarea class="form-control" id="inputNote" rows="3"></textarea>
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
        <form action="{{ route('order.update', 1) }}" method="POST" class="m-3">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group row">
                <label for="updateCustomer" class="col-sm-2 col-form-label">Customer</label>
                <div class="col">
                    <input class="form-control" list="customerOptions" id="updateCustomer" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
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
                    <input class="form-control" list="sockOptions" id="updateSock" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
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
                    <input class="form-control" list="colorOptions" id="updateColor" onchange="resetIfInvalid(this);" required placeholder="Type to search...">
                    <datalist id="colorOptions">
                        @foreach($colors as $color)
                            <option data-value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="updateSize" class="col-sm-2 col-form-label">Size</label>
                    <input type="number" class="form-control" id="updateSize" placeholder="Size">
                </div>
                <div class="col-md-3">
                    <label for="updateTotal" class="col-sm-2 col-form-label">Total</label>
                    <input type="number" class="form-control" id="updateTotal" placeholder="Total">
                </div>
                <div class="col-md-2">
                    <label for="updateType" class="col-sm-2 col-form-label">Type</label>
                    <select id="updateType" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="updateDeadline" class="col-sm-2 col-form-label">Deadline</label>
                    <input type="date" class="form-control" id="updateDeadline">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="updateNote" class="col-sm-2 col-form-label">Note</label>
                    <textarea class="form-control" id="updateNote" rows="3"></textarea>
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

@push('styles')
<link href="{{ asset('css/order.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/order.js') }}"></script>
@endpush

@endsection