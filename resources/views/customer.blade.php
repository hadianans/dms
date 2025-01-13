@extends('layout')
@section('title', 'Customer | Hafsocks')

@section('content')

<div class="row pb-4">
    <div class="col bg-dark text-white p-2 m-2" style="border-radius: 10px;">
        <h1 class="m-0" style="text-align: center;"><b>Data Customer</b></h1>
    </div>
</div>

<!-- <div class="row pb-4">
    <div class="col">
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white"><b>Total Customer</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-users mr-3"></span>2015Dz</h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger mb-3">
            <div class="card-header bg-danger text-white"><b>Customer Aktif</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-user mr-3"></span>75Dz</h4>
            </div>
        </div>
    </div>
</div> -->

<div class="row pb-4">
    <div class="col" style="text-align: center;">
        <button class="btn btn-info" data-toggle="modal" data-target="#AddModal" style="font-weight: 500; width:100px"><span class="icon-plus-circle mr-2"></span>Add</button>
    </div>
</div>

<div class="row">
    <div class="col">
        <table id="table" class="table table-hover">
            <thead class="thead-dark">
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Order</th>
                <th>Address</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td><a href="https://wa.me/62{{ $customer->phone }}" target="_blank">0{{ $customer->phone }}</a></td>
                    <td>-</td>
                    <td>{{ $customer->address }}</td>
                    <td>
                        <!-- <a href="#" class="btn btn-danger"><span class="icon-trash"></span></a> -->
                        <button class="btn btn-warning detail" data-toggle="modal" data-target="#UpdateModal" data-id="{{$customer->id}}" data-name="{{$customer->name}}" data-email="{{$customer->email}}" data-phone="{{$customer->phone}}" data-address="{{$customer->address}}"><span class="icon-pencil"></span></button>
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
        <h5 class="modal-title" id="AddModalTitle">Tambah Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="m-3" action="{{ route('customer.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col">
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="nama lengkap" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col">
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col">
                    <input type="number" name="phone" class="form-control" id="inputPhone" placeholder="no telepon" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAdress" class="col-sm-2 col-form-label">Adress</label>
                <div class="col">
                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="alamat lengkap" required>
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
<!-- End Modal Add -->

<!-- Modal Update -->
<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="UpdateModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateModalTitle">Update Customer</h5>
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
                <label for="updateName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col">
                    <input type="text" name="name" class="form-control" id="updateName" placeholder="nama lengkap">
                </div>
            </div>
            <div class="form-group row">
                <label for="updateEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col">
                    <input type="email" name="email" class="form-control" id="updateEmail" placeholder="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="updatePhone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col">
                    <input type="number" name="phone" class="form-control" id="updatePhone" placeholder="no telepon">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAdress" class="col-sm-2 col-form-label">Adress</label>
                <div class="col">
                    <input type="text" name="address" class="form-control" id="updateAddress" placeholder="alamat lengkap" required>
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col" style="text-align: center;">
                    <button type="submit" class="btn btn-warning"><span class="icon-input"></span> Input</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Update -->

@push('styles')
<link href="{{ asset('css/customer.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/customer.js') }}"></script>
@endpush

@endsection