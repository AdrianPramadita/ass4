<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Login form Salt Restorant</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    {{-- Error Alert --}}
                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Halaman Register</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('registerProses') }}" method="POST">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control"
                                                    placeholder="Input nama anda">
                                                    @if($errors->has('name'))
                                                    <span class="error">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Username</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="username" class="form-control"
                                                        placeholder="Input username" >
                                                        @if($errors->has('username'))
                                                        <span class="error">{{ $errors->first('username') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control"
                                                        placeholder="Input email" >
                                                        @if($errors->has('email'))
                                                        <span class="error">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="password" class="form-control "
                                                        placeholder="Input password">
                                                        @if($errors->has('password'))
                                                        <span class="error">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Owner</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="level" class="form-control"
                                                        placeholder="Admin" value="owner" readonly>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success">Save</button>
                                                </form>
                                            </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>

                    </div>
                    <script
                        src="https://code.jquery.com/jquery-3.4.1.min.js"
                        crossorigin="anonymous"></script>
                    <script
                        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
                        crossorigin="anonymous"></script>
                    <script src="{{url('assets/js/scripts.js')}}"></script>
                </body>
            </html>
