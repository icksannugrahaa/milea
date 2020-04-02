@extends('layouts.main_template')

@section('title', 'Login Page')

@section('JS')
    <script>
        $(document).ready(function() {
            $("#pass1").on('click', function(event) {
                event.preventDefault();
                if($('#inputPassword').attr("type") == "text"){
                    $('#inputPassword').attr('type', 'password');
                    $('#psw_ico1').html("sentiment_very_satisfied");
                }else if($('#inputPassword').attr("type") == "password"){
                    $('#inputPassword').attr('type', 'text');
                    $('#psw_ico1').html("sentiment_very_dissatisfied");
                }
            });
            $("#pass2").on('click', function(event) {
                event.preventDefault();
                if($('#inputPassword1').attr("type") == "text"){
                    $('#inputPassword1').attr('type', 'password');
                    $('#psw_ico2').html("sentiment_very_satisfied");
                }else if($('#inputPassword1').attr("type") == "password"){
                    $('#inputPassword1').attr('type', 'text');
                    $('#psw_ico2').html("sentiment_very_dissatisfied");
                }
            });
        });
    </script>
@endsection

@section('content')
<div class="container" style="margin-top: 5%">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill" id="auth-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="auth-login-tab" data-toggle="pill" href="#login-tab"
                                role="tab" aria-controls="login-tab" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="auth-register-tab" data-toggle="pill" href="#register-tab"
                                role="tab" aria-controls="register-tab" aria-selected="false">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="login-tab" role="tabpanel"
                            aria-labelledby="auth-login-tab">
                            <br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="tab-pane fade" id="register-tab" role="tabpanel"
                            aria-labelledby="auth-register-tab">
                            <br>
                            <div class="form-group">
                                <label for="inputNama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="inputNama"
                                    placeholder="ex: Safarudin Riyan">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputTelp">No Telp</label>
                                    <input type="number" class="form-control" id="inputTelp">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="input-group col-md-6">
                                    <input type="password" id="inputPassword" class="form-control"
                                        placeholder="password" aria-describedby="basic-addon2">
                                    <div class="input-group-append" id="pass1">
                                        <span class="input-group-text material-icons" id="psw_ico1"
                                            style="cursor: pointer">
                                            sentiment_very_satisfied
                                        </span>
                                    </div>
                                </div>
                                <div class="input-group col-md-6">
                                    <input type="password" id="inputPassword1" class="form-control"
                                        placeholder="ketik ulang password" aria-describedby="basic-addon2">
                                    <div class="input-group-append" id="pass2">
                                        <span class="input-group-text material-icons" id="psw_ico2"
                                            style="cursor: pointer">
                                            sentiment_very_satisfied
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAlamat">Alamat</label>
                                <textarea name="alamat" id="inputAlamat" class="form-control"
                                    placeholder="1234 Main St"></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
