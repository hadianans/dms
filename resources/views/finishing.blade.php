@extends('layout')
@section('title', 'Finishing | Hafsocks')

@section('content')

<div class="row pb-4">
    <div class="col bg-dark text-white p-2 m-2" style="border-radius: 10px;">
        <h1 class="m-0" style="text-align: center;"><b>Data Finishing</b></h1>
    </div>
</div>

<div class="row pb-4">
    <div class="col">
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white"><b>Total Finishing</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-loyalty mr-3"></span>2015Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-info mb-3">
            <div class="card-header bg-info text-white"><b>Obras</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-steam mr-3"></span>75Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-warning mb-3">
            <div class="card-header bg-warning text-white"><b>Pairing</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-attach_file mr-3"></span>450Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger mb-3">
            <div class="card-header bg-danger text-white"><b>Oven</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-check-square-o mr-3"></span>1050Dz</h4>
            </div>
        </div>
    </div>
</div>

<div class="row pb-4">
    <div class="col" style="text-align: center;">
        <button class="btn btn-secondary" data-toggle="modal" data-target="#AddModal" style="font-weight: 500; width:100px"><span class="icon-plus-circle mr-2"></span>Add</button>
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
                <th>Total</th>
                <th>Type</th>
                <th>Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($finishs as $finish)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $finish->order->customer->name }}</td>
                    <td>{{ $finish->order->sock->name }}</td>
                    <td>{{ $finish->order->color->name }}</td>
                    <td class="amount">{{ $finish->amount }}</td>
                    
                    @if($finish->type == '0')
                        <td>Obras</td>
                    @elseif($finish->type == '1')
                        <td>Oven</td>
                    @else
                        <td>Pairing</td>
                    @endif
                    
                    <td>{{ \Carbon\Carbon::parse($finish->date)->translatedFormat('d M Y') }}</td>
                    <td>
                        <a href="#" class="btn btn-danger"><span class="icon-trash"></span></a>
                        <button class="btn btn-warning detail" data-toggle="modal" data-target="#UpdateModal" data-id="{{$finish->id}}" data-customer="{{$finish->order->customer->name}}" data-sock="{{$finish->order->sock->name}}" data-color="{{$finish->order->color->name}}" data-employe="{{$finish->employe_id}}" data-amount="{{$finish->amount}}" data-finishing="{{$finish->type}}" data-date="{{$finish->date}}"><span class="icon-pencil"></span></button>
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
        <h5 class="modal-title" id="AddModalTitle">Tambah Finishing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('finishing.store') }}" method="POST" class="mx-3 mb-3">
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
                    <select id="inputType" name="type" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-lg-2 px-75">
                    <label for="inputEmploye" class="col col-form-label">Pegawai</label>
                    <select id="inputEmploye" name="employe" class="form-control" required>
                        <option selected value="">...</option>
                        @foreach($employes as $employe)
                            <option value="{{ $employe->id }}">{{ $employe->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 px-75">
                    <label for="inputFinishingType" class="col col-form-label">Finishing</label>
                    <select id="inputFinishingType" name="finishing" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Obras</option>
                        <option value="1">Oven</option>
                        <option value="2">Pairing</option>
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
                                <button class="btn btn-secondary" onclick="addid(id = {{ $order->id }})"><span class="icon-add_circle"></span></button>
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
        <h5 class="modal-title" id="UpdateModalTitle">Update Finishing</h5>
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
                <div class="col-lg-4 px-75">
                    <label for="updateCustomer" class="col col-form-label">Total</label>
                    <input type="text" class="form-control" id="updateCustomer" required readonly>
                </div>
                <div class="col-lg-4 px-75">
                    <label for="updateSock" class="col col-form-label">Total</label>
                    <input type="text" class="form-control" id="updateSock" required readonly>
                </div>
                <div class="col-lg-4 px-75">
                    <label for="updateColor" class="col col-form-label">Total</label>
                    <input type="text" class="form-control" id="updateColor" required readonly>
                </div>
            </div>
            
            <div class="form-group row">
                <!-- <div class="col-lg-2 px-75">
                    <label for="updateId" class="col col-form-label">ID PO</label>
                    <input type="number" name="order_id" class="form-control" id="updateId" readonly>
                </div> -->

                <div class="col-lg-3 px-75">
                    <label for="updateEmploye" class="col col-form-label">Pegawai</label>
                    <select id="updateEmploye" name="employe" class="form-control" required disabled="true">
                        <option selected value="">...</option>
                        @foreach($employes as $employe)
                            <option value="{{ $employe->id }}">{{ $employe->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 px-75">
                    <label for="updateFinishingType" class="col col-form-label">Finishing</label>
                    <select id="updateFinishingType" name="finishing" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Obras</option>
                        <option value="1">Oven</option>
                        <option value="2">Pairing</option>
                    </select>
                </div>
                <div class="col-lg-2 px-75">
                    <label for="updateAmount" class="col col-form-label">Total</label>
                    <input type="number" name="amount" class="form-control" id="updateAmount" required>
                </div>
                <div class="col-lg-2 px-75">
                    <label for="updateType" class="col col-form-label">Type</label>
                    <select id="updateType" name="type" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-lg-3 px-75">
                    <label for="updateDate" class="col col-form-label">Date</label>
                    <input type="date" name="date" class="form-control" id="updateDate" required>
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
<link href="{{ asset('css/finishing.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/finishing.js') }}"></script>
@endpush

@endsection