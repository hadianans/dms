@extends('layout')
@section('title', 'Color | Hafsocks')

@section('content')

<div class="row pb-4">
    <div class="col bg-dark text-white p-2 m-2" style="border-radius: 10px;">
        <h1 class="m-0" style="text-align: center;"><b>Data Warna</b></h1>
    </div>
</div>

<div class="row pb-4">
    <div class="col" style="text-align: center;">
        <button class="btn btn-info" data-toggle="modal" data-target="#AddModal" style="font-weight: 500; width:100px"><span class="icon-plus-circle mr-2"></span>Add</button>
    </div>
</div>

<div class="row">
    <div class="col">
        <table id="table" class="table table-hover">
            <thead class="thead-dark">
                <th style="width: 7%;">No</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($colors as $color)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $color->name }}</td>
                    <td>
                        <a href="#" class="btn btn-danger" onclick="deleteData(id = '{{$color->id}}', url = 'color')"><span class="icon-trash"></span></a>
                        <button class="btn btn-warning detail" data-toggle="modal" data-target="#UpdateModal" data-id="{{$color->id}}" data-color="{{$color->name}}" ><span class="icon-pencil"></span></button>
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
        <h5 class="modal-title" id="AddModalTitle">Tambah Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('color.store') }}" method="POST" class="m-3">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="inputColor" class="col-sm-2 col-form-label">Nama</label>
                <div class="col">
                    <input type="text" name="color" class="form-control" id="inputColor" placeholder="nama warna" required>
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
        <h5 class="modal-title" id="UpdateModalTitle">Update Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('color.update', 1) }}" method="POST" class="m-3">
            {{ csrf_field() }}
            @method('PUT')
            <input name="id" class="border-0 w-100" type="hidden" id="edit-id" value="">
            <div class="form-group row">
                <label for="updateColor" class="col-sm-2 col-form-label">Nama</label>
                <div class="col">
                    <input type="text" name="color" class="form-control" id="updateColor" placeholder="nama warna">
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


{{-- form delete hidden --}}
<form action="" method="POST" id="form-delete">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@push('styles')
<link href="{{ asset('css/color.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/color.js') }}"></script>
@endpush

@endsection