@extends('layout')
@section('title', 'Employe | Hafsocks')

@section('content')

<div class="row pb-4">
    <div class="col bg-dark text-white p-2 m-2" style="border-radius: 10px;">
        <h1 class="m-0" style="text-align: center;"><b>Data Pegawai</b></h1>
    </div>
</div>

<!-- <div class="row pb-4">
    <div class="col">
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white"><b>Total Kaos Kaki</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-users mr-3"></span>2015Dz</h4>
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
                <th style="width: 5%;">No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($employes as $employe)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employe->name }}</td>
                    <td><a href="https://wa.me/62{{ $employe->phone }}" target="_blank">0{{ $employe->phone }}</a></td>
                    @if($employe->role == '0')
                        <td>Operator</td>
                    @elseif($employe->role == '1')
                        <td>Obras</td>
                    @else
                        <td>Finishing</td>
                    @endif

                    @if($employe->status == '0')
                        <td>Tidak Aktif</td>
                    @else
                        <td>Aktif</td>
                    @endif
                    <td>
                        <!-- <a href="#" class="btn btn-danger" onclick="deleteData(id = '{{$employe->id}}', url = 'employe')"><span class="icon-trash"></span></a> -->
                        <button class="btn btn-warning detail" data-toggle="modal" data-target="#UpdateModal" data-id="{{$employe->id}}" data-employe="{{$employe->name}}" data-phone="{{$employe->phone}}" data-role="{{$employe->role}}" data-status="{{$employe->status}}"><span class="icon-pencil"></span></button>
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
        <h5 class="modal-title" id="AddModalTitle">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('employe.store') }}" method="POST" class="m-3">
            {{ csrf_field() }}
            <div class="form-group row">
                <div class="col">
                    <label for="inputEmploye" class="col-sm-2 col-form-label">Nama</label>
                    <input type="text" name="employe" class="form-control" id="inputEmploye" placeholder="nama pagawai" required>
                </div>
                <div class="col">
                    <label for="inputPhone" class="col-sm-2 col-form-label">Telepon</label>
                    <input type="number" name="phone" class="form-control" id="inputPhone" placeholder="no telepon" required>
                </div>
                <div class="col">
                    <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                    <select name="role" id="inputRole" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Operator</option>
                        <option value="1">Obras</option>
                        <option value="2">Finishing</option>
                    </select>
                </div>
                <div class="col">
                    <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                    <select name="status" id="inputStatus" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="1">Aktif</option>
                        <option value="0">Non Aktif</option>
                    </select>
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
        <h5 class="modal-title" id="UpdateModalTitle">Update Pegawai</h5>
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
                <div class="col">
                    <label for="updateEmploye" class="col-sm-2 col-form-label">Nama</label>
                    <input type="text" name="employe" class="form-control" id="updateEmploye" required>
                </div>
                <div class="col">
                    <label for="updatePhone" class="col-sm-2 col-form-label">Telepon</label>
                    <input type="number" name="phone" class="form-control" id="updatePhone" required>
                </div>
                <div class="col">
                    <label for="updateRole" class="col-sm-2 col-form-label">Role</label>
                    <select name="role" id="updateRole" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Operator</option>
                        <option value="1">Obras</option>
                        <option value="2">Finishing</option>
                    </select>
                </div>
                <div class="col">
                    <label for="updateStatus" class="col-sm-2 col-form-label">Status</label>
                    <select name="status" id="updateStatus" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="1">Aktif</option>
                        <option value="0">Non Aktif</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col" style="text-align: center;">
                    <button type="submit" class="btn btn-warning"><span class="icon-input"></span> Update</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Update -->
 
@push('styles')
<link href="{{ asset('css/employe.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/employe.js') }}"></script>
@endpush

@endsection