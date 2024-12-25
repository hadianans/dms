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
                @for($i = 0; $i < 100; $i++)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>Abdul</td>
                    <td>Oldschool</td>
                    <td>White</td>
                    <td>50 dz</td>
                    <td>Obras</td>
                    <td>15 Januari 2024</td>
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
        <h5 class="modal-title" id="AddModalTitle">Tambah Finishing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mx-3 mb-3">
            <div class="form-group row">
                <div class="col-lg-2">
                    <label for="inputId" class="col col-form-label">ID PO</label>
                    <input type="number" class="form-control" id="inputId" placeholder="ID PO">
                </div>
                <div class="col-lg-2">
                    <label for="inputTotal" class="col col-form-label">Total</label>
                    <input type="number" class="form-control" id="inputTotal" placeholder="Total">
                </div>
                <div class="col-lg-2">
                    <label for="inputType" class="col col-form-label">Type</label>
                    <select id="inputType" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Dz</option>
                        <option value="1">Ps</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="finishingType" class="col col-form-label">Finishing</label>
                    <select id="finishingType" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Obras</option>
                        <option value="1">Pairing</option>
                        <option value="2">Oven</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="inputDate" class="col col-form-label">Date</label>
                    <input type="date" class="form-control" id="inputDate">
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col" style="text-align: center;">
                    <button type="button" class="btn btn-info"><span class="icon-input"></span> Input</button>
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
                        @for($i = 0; $i < 100; $i++)
                        <tr>
                            <td>Abdul</td>
                            <td>Oldschool</td>
                            <td>White</td>
                            <td>L</td>
                            <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, accusamus.</td>
                            <td>
                                <button class="btn btn-secondary"><span class="icon-add_circle"></span></button>
                            </td>
                        </tr>
                        @endfor
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
                    <label for="updateFinishing" class="col col-form-label">Finishing</label>
                    <select id="updateFinishing" class="form-control" required>
                        <option selected value="">...</option>
                        <option value="0">Obras</option>
                        <option value="1">Pairing</option>
                        <option value="2">Oven</option>
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
<link href="{{ asset('css/order.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/order.js') }}"></script>
@endpush

@endsection