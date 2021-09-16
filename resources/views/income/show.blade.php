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
                            <h4>Halaman Detail Income</h4>
                            <span>Ini adalah halaman untuk menampilkan order list income</span>
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
                            <li class="breadcrumb-item"><a href="#!">Halaman Detail View Order List Income</a>
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
                <h5>Ini adalah tabel Income</h5>
                <div class="card-header-right"> 
                    <a href="{{'/income' }}" class="btn btn-secondary btn-round">Back</a>
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
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%">Date Income</th>
                                        <td>{{ $income->date_income }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name Product</th>
                                        <td>{{ $income->name_product }}</td>
                                    </tr>
                                    <tr>
                                        <th>Quantity</th>
                                        <td>{{ $income->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <th>Resource Income</th>
                                        <td>{{ $income->resources->name_resource }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>Rp. {{ $income->total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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