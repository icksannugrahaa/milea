@extends('layouts.main_template')

@section('title', 'Milea Apps (Mileanial Library Apps)')

@section('CSS')
<style>
    .bg-custom-1 {
        background-color: #85144b;
    }

    .bg-custom-2 {
        background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
    }

    .parallax {
        /* The image used */
        background-image: url("image/bg-1.jpg");

        /* Set a specific height */
        height: 350px;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

</style>
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid parallax" style="margin-top: 4.3%">
    <div class="container text-center" style="background-color: rgba(255, 255, 225, 0.8);">
        <h1 class="display-4">Milenial Library Application</h1>
        <p class="lead">Kata-kata bijak !!</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card-body text-center">
                <a href="#">
                    <img src="{{ asset('image/icons/bk_baru.png') }}" width="130px" height="130px" alt="" class="img-fluid">
                    <p class="card-text">Buku Baru</p>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card-body text-center">
                <a href="#">
                    <img src="{{ asset('image/icons/bk_pilihan.png') }}" width="130px" height="130px" alt="" class="img-fluid">
                    <p class="card-text">Buku Pilihan</p>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card-body text-center">
                <a href="#">
                    <img src="{{ asset('image/icons/bk_import.png') }}" width="130px" height="130px" alt="" class="img-fluid">
                    <p class="card-text">Buku Import</p>
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card-body text-center">
                <a href="#">
                    <img src="{{ asset('image/icons/bk_diskon.png') }}" width="130px" height="130px" alt="" class="img-fluid">
                    <p class="card-text">Buku Promo</p>
                </a>
            </div>

            <br>
            <br>
        </div>
        <div class="col-md-12 text-center">
            <h2 class="float-left">Buku Terpopuler</h2>
            <a href="#" class="float-right m-3">Lihat Semua</a>
            <br>
            <hr>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="margin: 0% 5%;">
                <img src="{{ asset('image/buku/hak_angket__w414_hauto.jpg') }}"
                    class="card-img-top img-fluid" alt="...">
                <div class="card-body col-12">
                    <h6 class="text-truncate" >Hak Angket Kawal Demokrasi</h6>
                    <hr>
                    <p class="text-truncate" >Buku ini penting sebagai bacaan
                        bagi para pengambil kebijakan, khususnya
                        terkait tata kelola pemerintahan daerah.</p>
                    <hr>
                    <span class="badge badge-success">Tersedia</span>
                </div>
            </div>
            <br>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="margin: 0% 5%;">
                <img src="{{ asset('image/buku/hak_angket__w414_hauto.jpg') }}"
                    class="card-img-top img-fluid" alt="...">
                <div class="card-body col-12">
                    <h6 class="text-truncate" >Hak Angket Kawal Demokrasi</h6>
                    <hr>
                    <p class="text-truncate" >Buku ini penting sebagai bacaan
                        bagi para pengambil kebijakan, khususnya
                        terkait tata kelola pemerintahan daerah.</p>
                    <hr>
                    <span class="badge badge-success">Tersedia</span>
                </div>
            </div>
            <br>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="margin: 0% 5%;">
                <img src="{{ asset('image/buku/hak_angket__w414_hauto.jpg') }}"
                    class="card-img-top img-fluid" alt="...">
                <div class="card-body col-12">
                    <h6 class="text-truncate" >Hak Angket Kawal Demokrasi</h6>
                    <hr>
                    <p class="text-truncate" >Buku ini penting sebagai bacaan
                        bagi para pengambil kebijakan, khususnya
                        terkait tata kelola pemerintahan daerah.</p>
                    <hr>
                    <span class="badge badge-success">Tersedia</span>
                </div>
            </div>
            <br>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="margin: 0% 5%;">
                <img src="{{ asset('image/buku/hak_angket__w414_hauto.jpg') }}"
                    class="card-img-top img-fluid" alt="...">
                <div class="card-body col-12">
                    <h6 class="text-truncate" >Hak Angket Kawal Demokrasi</h6>
                    <hr>
                    <p class="text-truncate" >Buku ini penting sebagai bacaan
                        bagi para pengambil kebijakan, khususnya
                        terkait tata kelola pemerintahan daerah.</p>
                    <hr>
                    <span class="badge badge-success">Tersedia</span>
                </div>
            </div>
            <br>
        </div>

        <div class="col-md-12 text-center">
            <br><br>
            <h2 class="float-left">Buku Pilihan</h2>
            <a href="#" class="float-right m-3">Lihat Semua</a>
            <br>
            <hr>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="margin: 0% 5%;">
                <img src="{{ asset('image/buku/hak_angket__w414_hauto.jpg') }}"
                    class="card-img-top img-fluid" alt="...">
                <div class="card-body col-12">
                    <h6 class="text-truncate" >Hak Angket Kawal Demokrasi</h6>
                    <hr>
                    <p class="text-truncate" >Buku ini penting sebagai bacaan
                        bagi para pengambil kebijakan, khususnya
                        terkait tata kelola pemerintahan daerah.</p>
                    <hr>
                    <span class="badge badge-success">Tersedia</span>
                </div>
            </div>
            <br>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="margin: 0% 5%;">
                <img src="{{ asset('image/buku/hak_angket__w414_hauto.jpg') }}"
                    class="card-img-top img-fluid" alt="...">
                <div class="card-body col-12">
                    <h6 class="text-truncate" >Hak Angket Kawal Demokrasi</h6>
                    <hr>
                    <p class="text-truncate" >Buku ini penting sebagai bacaan
                        bagi para pengambil kebijakan, khususnya
                        terkait tata kelola pemerintahan daerah.</p>
                    <hr>
                    <span class="badge badge-success">Tersedia</span>
                </div>
            </div>
            <br>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="margin: 0% 5%;">
                <img src="{{ asset('image/buku/hak_angket__w414_hauto.jpg') }}"
                    class="card-img-top img-fluid" alt="...">
                <div class="card-body col-12">
                    <h6 class="text-truncate" >Hak Angket Kawal Demokrasi</h6>
                    <hr>
                    <p class="text-truncate" >Buku ini penting sebagai bacaan
                        bagi para pengambil kebijakan, khususnya
                        terkait tata kelola pemerintahan daerah.</p>
                    <hr>
                    <span class="badge badge-success">Tersedia</span>
                </div>
            </div>
            <br>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card" style="margin: 0% 5%;">
                <img src="{{ asset('image/buku/hak_angket__w414_hauto.jpg') }}"
                    class="card-img-top img-fluid" alt="...">
                <div class="card-body col-12">
                    <h6 class="text-truncate" >Hak Angket Kawal Demokrasi</h6>
                    <hr>
                    <p class="text-truncate" >Buku ini penting sebagai bacaan
                        bagi para pengambil kebijakan, khususnya
                        terkait tata kelola pemerintahan daerah.</p>
                    <hr>
                    <span class="badge badge-success">Tersedia</span>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
