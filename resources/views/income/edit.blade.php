@extends('layouts.front.master')
@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="icofont icofont-table bg-c-blue"></i>
                        <div class="d-inline">
                            <h4>Halaman ubah data income</h4>
                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                       <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Halaman ubah data income</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">ubah income</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

        <!-- Hover table card start -->
        <div class="card">
            <div class="card-header">
                <h5>Ubah data income</h5>
                <div class="card-header-right"> 
                    <a href="{{'/spending'}}" class="btn btn-secondary btn-round">Back</a>
                    {{-- <ul class="list-unstyled card-option">     
                        <li><i class="icofont icofont-simple-left "></i></li>        
                        <li><i class="icofont icofont-maximize full-card"></i></li>        
                        <li><i class="icofont icofont-minus minimize-card"></i></li>       
                        <li><i class="icofont icofont-refresh reload-card"></i></li>        
                        <li><i class="icofont icofont-error close-card"></i></li>    
                    </ul> --}}
                </div>
            </div>
            <div class="card-block table-border-style">
                <div class="card-body">
                    <form action="{{ url('income/'.$income->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Date Income</label>
                            <div class="col-sm-10">
                                <input type="date" name="date_income" class="form-control @error('date_income') is-invalid @enderror"
                                placeholder="Input tanggal income" value="{{ old('date_income', $income->date_income) }}">
                                @error('date_spending')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Total</label>
                                <div class="col-sm-10">
                                    <input type="number" name="total" class="form-control @error('total') is-invalid @enderror"
                                    placeholder="Input Total" value="{{ old('total', $income->total) }}">
                                    @error('total')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Resource Income</label>
                                <div class="col-sm-10">
                                    <select name="resource_id" class="form-control @error('resource_id') is-invalid @enderror">
                                        <option value="">==> Pilih Sumber Income <==</option>
                                        @foreach($resources as $data)
                                            <option value="{{ $data->id }}" {{ old('resource_id', $income->resource_id ) == $data->id ? 'selected' : null }}>{{ $data->name_resource }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
        <!-- Hover table card end -->
    </div>
    <!-- Page-body end -->
</div>
</div>
@endsection