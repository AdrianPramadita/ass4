@extends('layouts.front.master')
@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <em class="icofont icofont-table bg-c-blue"></em>
                        <div class="d-inline">
                            <h4>Ini adalah halaman Admin</h4>
                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                       <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <em class="icofont icofont-home"></em>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Halaman Admin</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Admin Table</a>
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
                <h5>Ini adalah tabel admin</h5>
                <div class="card-header-right"> 
                    <a href="{{'admin/add' }}" class="btn btn-success btn-round">Add Akun</a>
                    {{-- <ul class="list-unstyled card-option">     
                        <li><em class="icofont icofont-simple-left "></em></li>        
                        <li><em class="icofont icofont-maximize full-card"></em></li>        
                        <li><em class="icofont icofont-minus minimize-card"></em></li>       
                        <li><em class="icofont icofont-refresh reload-card"></em></li>        
                        <li><em class="icofont icofont-error close-card"></em></li>    
                    </ul> --}}
                </div>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Admin</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $akun)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $akun->name }}</td>
                                <td>{{ $akun->username }}</td>
                                <td>{{ $akun->email }}</td>
                                <td>{{ $akun->level }}</td>
                                <td class="text-center">
                                    <a href="{{ url('admin/edit/'.$akun->id) }}" class="btn btn-primary btn-outline-primary">
                                        <em class="ti-wand"></em>
                                    </a>
                                    <form action="{{ url('admin/'.$akun->id) }}" method="post" class="d-inline" onsubmit="return confirm('are you sure for delete')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-outline-danger">
                                            <em class="ti-trash"></em>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $users->links() }} --}}
                </div>
            </div>
        </div>
        <!-- Hover table card end -->

    </div>
    <!-- Page-body end -->
</div>
</div>
@endsection