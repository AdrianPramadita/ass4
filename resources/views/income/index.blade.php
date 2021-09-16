@extends('layouts.front.master')

@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                        <div class="d-inline">
                            <h4>Ini adalah halaman income</h4>
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
                            <li class="breadcrumb-item"><a href="#!">Halaman Income</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Income page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <!-- Hover table card start -->
        <div class="card">
            <div class="card-header">
                <h5>Ini adalah tabel Income</h5>
                <div><br/></div>
                <div class="card-header-center">
                    <!-- Start kode untuk form pencarian -->
                    <form class="form" method="get" action="{{ route('searchIncome') }}">
                        <div class="form-group w-50 mb-3">
                            <label for="search" class="d-block mr-2">Searching Minimum Date</label>
                            <input type="date" name="search" class="form-control w-75 d-inline" id="search" value="{{ old('date_income') }}">
                            <button type="submit" class="btn btn-primary mb-1">Search</button>
                        </div>
                        {{-- <div class="form-group w-50 mb-3">
                        <label for="keyword" class="d-block mr-2">Searching Keyword</label>
                        <input type="text" name="keyword" class="form-control w-75 d-inline" id="search" value="{{ old('keyword') }}">
                        </div> --}}
                    </form>
                    <!-- Start kode untuk form pencarian -->
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="card-header-right"> 
                    <a href="{{'income/create' }}" class="btn btn-success btn-round">Add Income</a>
                    <a href="{{'daterange' }}" class="btn btn-info btn-round">Date Range Filter</a>
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="">Date Income</th>
                                <th class="">Product Name</th>
                                <th class="">Resource Income</th>
                                <th class="">Total</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($incomes as $key =>  $data)
                            <tr>
                                <th class="text-center" scope="row">{{ $incomes->firstItem() + $key }}</th>
                                <td>{{ $data->date_income }}</td>
                                <td>{{ $data->name_product }}</td>
                                <td>{{ $data->resources->name_resource }}</td>
                                <td>Rp. {{ $data->total }}</td>
                                <td class="text-center">
                                    <a href="{{ url('income/'.$data->id) }}" class="btn btn-warning btn-outline-warning">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="{{ url('income/'.$data->id.'/edit' ) }}" class="btn btn-primary btn-outline-primary">
                                        <i class="ti-wand"></i>
                                    </a>
                                    <form action="{{ url('income/'.$data->id) }}" method="post" class="d-inline" onsubmit="return confirm('are you sure for delete')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-outline-danger">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $incomes->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Hover table card end -->

    </div>
    <!-- Page-body end -->
</div>
</div>
@endsection