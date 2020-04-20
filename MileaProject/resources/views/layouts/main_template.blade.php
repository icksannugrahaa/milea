<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.css" rel="stylesheet">


    <title>@yield('title')</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700);

        body {
            font-family: Rubik, sans-serif;
            position: relative;
            font-weight: 400;
            font-size: 15px
        }

        ul {
            padding: 0;
            margin: 0
        }

        li {
            list-style: none
        }

        a:focus,
        a:hover {
            text-decoration: none;
            -webkit-transition: .3s ease;
            -o-transition: .3s ease;
            transition: .3s ease
        }

        a:focus {
            outline: 0
        }

        img {
            max-width: 100%
        }

        p {
            font-size: 16px;
            line-height: 30px;
            color: #898b96;
            font-weight: 300
        }

        h4 {
            font-family: Rubik, sans-serif;
            margin: 0;
            font-weight: 400;
            padding: 0;
            color: #363940
        }

        a {
            color: #5867dd
        }

        .no-padding {
            padding: 0 !important
        }

        .go_top {
            margin-top: 9px;
            padding: 12px;
            cursor: pointer;
            background: #5867dd;
            color: #fff;
            position: absolute;
            -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, .1);
            box-shadow: 0 4px 4px rgba(0, 0, 0, .1);
            -webkit-border-radius: 50%;
            border-radius: 50%;
            right: -webkit-calc((100% - 1140px)/ 2);
            right: calc((100% - 1140px)/ 2);
            z-index: 111;
            text-align: center
        }

        .go_top span {
            display: grid
        }

        .footer-big {
            padding: 105px 0 65px 0;
            margin-top: 30px;
        }

        .footer-big .footer-widget {
            margin-bottom: 40px
        }

        .footer--light {
            background: #e7e8ed
        }

        .footer-big .footer-menu ul li a,
        .footer-big p,
        .footer-big ul li {
            color: #898b96
        }

        .footer-menu {
            padding-left: 48px
        }

        .footer-menu ul li a {
            font-size: 15px;
            line-height: 32px;
            -webkit-transition: .3s;
            -o-transition: .3s;
            transition: .3s
        }

        .footer-menu ul li a:hover {
            color: #5867dd
        }

        .footer-menu--1 {
            width: 100%
        }

        .footer-widget-title {
            line-height: 42px;
            margin-bottom: 10px;
            font-size: 18px
        }

        .mini-footer {
            background: #192027;
            text-align: center;
            padding: 32px 0
        }

        .mini-footer p {
            margin: 0;
            line-height: 26px;
            font-size: 15px;
            color: #999
        }

        .mini-footer p a {
            color: #5867dd
        }

        .mini-footer p a:hover {
            color: #34bfa3
        }

        .widget-about img {
            display: block;
            margin-bottom: 30px
        }

        .widget-about p {
            font-weight: 400
        }

        .widget-about .contact-details {
            margin: 30px 0 0 0
        }

        .widget-about .contact-details li {
            margin-bottom: 10px
        }

        .widget-about .contact-details li:last-child {
            margin-bottom: 0
        }

        .widget-about .contact-details li span {
            padding-right: 12px
        }

        .widget-about .contact-details li a {
            color: #5867dd
        }

        @media (max-width:991px) {
            .footer-menu {
                padding-left: 0
            }
        }

    </style>
    @yield('CSS')
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-sm fixed-top">
        <a class="navbar-brand" href="#">
            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/logo_white.png"
                width="30" height="30" alt="logo">
            Milea Apps
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-2"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-list-2">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About Us</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-sm-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div style="margin-top: 90px"></div>
    @yield('content')
    <a href="#">
        <div class="go_top">
            <span class="material-icons">
                keyboard_arrow_up
            </span>
        </div>
    </a>
    <footer class="footer-area footer--light">
        <div class="footer-big">
            <!-- start .container -->
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="footer-widget">
                            <div class="widget-about">
                                <img src="http://placehold.it/250x80" alt="" class="img-fluid">
                                <p class="text-justify">Milenial Library Application adalah web perpustakaan online yang
                                    berguna untuk membooking atau mengecek keteresediaan buku diperpustakaan.</p>
                                <p>Jadi anda dapat meminjam buku lebih mudah melalui aplikasi ini.</p>
                            </div>
                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- end /.col-md-4 -->
                    <div class="col-md-3 col-sm-4">
                        <div class="footer-widget">
                            <div class="footer-menu footer-menu--1">
                                <h4 class="footer-widget-title">Kategori Buku</h4>
                                <ul>
                                    <li>
                                        <a href="#">Komik</a>
                                    </li>
                                    <li>
                                        <a href="#">Pelajaran</a>
                                    </li>
                                    <li>
                                        <a href="#">Cooming Soon ...</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.footer-menu -->
                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-md-3 col-sm-4">
                        <div class="footer-widget">
                            <div class="footer-menu">
                                <h4 class="footer-widget-title">Menu</h4>
                                <ul>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Register</a>
                                    </li>
                                    <li>
                                        <a href="#">Log In</a>
                                    </li>
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.footer-menu -->
                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- end /.col-lg-3 -->

                    <div class="col-md-3 col-sm-4">
                        <div class="footer-widget">
                            <div class="footer-menu no-padding">
                                <h4 class="footer-widget-title">Kontak Kami</h4>
                                <ul class="contact-details">
                                    <li>
                                        <span class="icon-earphones"></span> Whatsapp:
                                        <a href="tel:+6283822145705">+6283822145705</a>
                                    </li>
                                    <li>
                                        <span class="icon-envelope-open"></span> Email:
                                        <a href="mailto: icksannugrahaa@gmail.com">icksannugrahaa@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.footer-menu -->
                        </div>
                        <!-- Ends: .footer-widget -->
                    </div>
                    <!-- Ends: .col-lg-3 -->

                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.footer-big -->

        <div class="mini-footer bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            <p>© 2018
                                <a href="#">Milea Apps</a>. All rights reserved. Created by
                                <a href="#">Icksan Nugraha</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.js"></script>
    @yield('JS')
</body>

</html>
