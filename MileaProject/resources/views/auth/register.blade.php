@extends('layouts.main_template')

@section('title', 'Login Page')

@section('JS')
<script>
    $(document).ready(function () {
        $("#pass1").on('click', function (event) {
            event.preventDefault();
            if ($('#inputPassword').attr("type") == "text") {
                $('#inputPassword').attr('type', 'password');
                $('#psw_ico1').html("sentiment_very_satisfied");
            } else if ($('#inputPassword').attr("type") == "password") {
                $('#inputPassword').attr('type', 'text');
                $('#psw_ico1').html("sentiment_very_dissatisfied");
            }
        });
        $("#pass2").on('click', function (event) {
            event.preventDefault();
            if ($('#inputPassword1').attr("type") == "text") {
                $('#inputPassword1').attr('type', 'password');
                $('#psw_ico2').html("sentiment_very_satisfied");
            } else if ($('#inputPassword1').attr("type") == "password") {
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
                            <a class="nav-link" id="auth-login-tab" data-toggle="pill" href="#login-tab"
                                role="tab" aria-controls="login-tab" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="auth-register-tab" data-toggle="pill" href="#register-tab"
                                role="tab" aria-controls="register-tab" aria-selected="false">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="login-tab" role="tabpanel"
                            aria-labelledby="auth-login-tab">
                            <br>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <small id="email" class="form-text text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <small id=password" class="form-text text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="tab-pane fade show active" id="register-tab" role="tabpanel"
                            aria-labelledby="auth-register-tab">
                            <br>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputNama">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="ex: Safarudin Riyan" @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                    @error('name')
                                        <small id="name" class="form-text text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <small id="email" class="form-text text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone_number">No Telp</label>
                                        <input type="number" class="form-control" name="phone_number" id="phone_number" @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required>
                                        @error('phone_number')
                                            <small id="phone_number" class="form-text text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="input-group col-md-6">
                                        <input type="password" id="password" class="form-control"
                                            placeholder="password" name="password" aria-describedby="basic-addon2" @error('phone_number') is-invalid @enderror" required>
                                        <div class="input-group-append" id="pass1">
                                            <span class="input-group-text material-icons" id="psw_ico1"
                                                style="cursor: pointer">
                                                sentiment_very_satisfied
                                            </span>
                                        </div>
                                        @error('password')
                                            <small id="password" class="form-text text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                        @enderror
                                    </div>
                                    <div class="input-group col-md-6">
                                        <input type="password" id="password_confirmation" class="form-control"
                                            placeholder="ketik ulang password" name="password_confirmation" aria-describedby="basic-addon2" required>
                                        <div class="input-group-append" id="pass2">
                                            <span class="input-group-text material-icons" id="psw_ico2"
                                                style="cursor: pointer">
                                                sentiment_very_satisfied
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea name="address" id="address" class="form-control"
                                        placeholder="1234 Main St" @error('address') is-invalid @enderror" value="{{ old('address') }}" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <small id="address" class="form-text text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="avatar">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="avatar"
                                            aria-describedby="avatar" name="avatar">
                                        <label class="custom-file-label" for="avatar">Choose file</label>
                                    </div>
                                    @error('avatar')
                                        <small id="avatar" class="form-text text-danger" role="alert"><strong>{{ $message }}</strong></small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
