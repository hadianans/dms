@extends('layout')
@section('title', 'Yarn | Hafsocks')

@section('content')

<div class="row pb-4">
    <div class="col bg-dark text-white p-2 m-2" style="border-radius: 10px;">
        <h1 class="m-0" style="text-align: center;"><b>Data Benang</b></h1>
    </div>
</div>

<div class="row pb-4">
    <div class="col">
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white"><b>Karet</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-battery_std mr-3"></span>235 <sub class="text-secondary">kg</sub></h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-danger mb-3">
            <div class="card-header bg-danger text-white"><b>PE</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-battery_std mr-3"></span>180 <sub class="text-secondary">kg</sub></h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-warning mb-3">
            <div class="card-header bg-warning text-white"><b>Nylon</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-battery_std mr-3"></span>215 <sub class="text-secondary">kg</sub></h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-success mb-3">
            <div class="card-header bg-success text-white"><b>Polyster</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-battery_std mr-3"></span>129 <sub class="text-secondary">kg</sub></h4>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-info mb-3">
            <div class="card-header bg-info text-white"><b>Spandex</b></div>
            <div class="card-body text-dark">
                <h4 class="card-title"><span class="icon-battery_std mr-3"></span>102 <sub class="text-secondary">kg</sub></h4>
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
                <th>Name</th>
                <th>Color</th>
                <th>Weight</th>
                <th>Price</th>
                <th>Note</th>
                <th>Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                @for($i = 0; $i < 50; $i++)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>PE 30S</td>
                    <td>Black</td>
                    <td>50.0</td>
                    <td>8.000.000</td>
                    <td>Indojaya</td>
                    <td>23 Desember 2024</td>
                    <td>
                        <a href="#" class="btn btn-danger"><span class="icon-trash"></span></a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#UpdateModal"><span class="icon-pencil"></span></button>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>


<!-- Modal Add -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddModalTitle">Tambah Data Benang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="m-3">
            <div class="form-group row">
                <div class="col-4">
                    <label for="inputYarn" class="col-sm-2 col-form-label">Jenis</label>
                    <select id="inputYarn" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="PE">PE</option>
                        <option value="Nylon">Nylon</option>
                        <option value="Karet">Karet</option>
                        <option value="Polyster">Polyster</option>
                        <option value="Spandex">Spandex</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="inputColor" class="col-sm-2 col-form-label">Color</label>
                    <input type="text" class="form-control" id="inputColor" placeholder="warna benang">
                </div>
                <div class="col-4">
                    <label for="inputWeight" class="col-sm-2 col-form-label">Weight</label>
                    <input type="number" class="form-control" id="inputWeight" placeholder="berat total">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="inputPrize" class="col-sm-2 col-form-label">Price</label>
                    <input type="number" class="form-control" id="inputPrize" placeholder="harga benang">
                </div>
                <div class="col">
                    <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                    <input type="date" class="form-control" id="inputDate" placeholder="harga benang">
                </div>
                <div class="col">
                    <label for="inputNote" class="col-sm-2 col-form-label">Note</label>
                    <input type="text" class="form-control" id="inputNote" placeholder="catatan">
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
<!-- End Modal Add -->

<!-- Modal Update -->
<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="UpdateModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateModalTitle">Update Data Benang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="m-3">
            <div class="form-group row">
                <div class="col-4">
                    <label for="updateYarn" class="col-sm-2 col-form-label">Jenis</label>
                    <select id="updateYarn" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="PE">PE</option>
                        <option value="Nylon">Nylon</option>
                        <option value="Karet">Karet</option>
                        <option value="Polyster">Polyster</option>
                        <option value="Spandex">Spandex</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="updateColor" class="col-sm-2 col-form-label">Color</label>
                    <input type="text" class="form-control" id="updateColor" placeholder="warna benang">
                </div>
                <div class="col-4">
                    <label for="updateWeight" class="col-sm-2 col-form-label">Weight</label>
                    <input type="number" class="form-control" id="updateWeight" placeholder="berat total">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="updatePrize" class="col-sm-2 col-form-label">Price</label>
                    <input type="number" class="form-control" id="updatePrize" placeholder="harga benang">
                </div>
                <div class="col">
                    <label for="updateDate" class="col-sm-2 col-form-label">Date</label>
                    <input type="date" class="form-control" id="updateDate" placeholder="harga benang">
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col" style="text-align: center;">
                    <button type="button" class="btn btn-warning"><span class="icon-input"></span> Update</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Update -->

@push('styles')
<link href="{{ asset('css/yarn.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/yarn.js') }}"></script>
@endpush

@endsection