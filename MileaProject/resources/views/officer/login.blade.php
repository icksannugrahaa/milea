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
                            <a class="nav-link active" id="auth-login-tab" data-toggle="pill" href="#login-tab"
                                role="tab" aria-controls="login-tab" aria-selected="true">Login</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="login-tab" role="tabpanel"
                            aria-labelledby="auth-login-tab">
                            <br>
                            <form method="POST" action="{{ route('officer.login') }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
