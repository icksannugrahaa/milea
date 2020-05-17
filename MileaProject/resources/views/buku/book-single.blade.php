@extends('layouts.main_template')

@section('title', (isset($book[0]->judul) ? $book[0]->judul : "Buku"))

@section('content')
@foreach ($book as $item)
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset($item->image) }}" class="card-img-top img-fluid" style="width:300px">
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$item->judul}}</h5>
                    <p>{{$item->pengarang}}</p>
                    <br>
                    <p>Jumlah : Tersisa {{$item->bk_sisa}} dari total {{$item->bk_total}}</p>
                    <hr>
                    <button class="btn btn-primary btn-block">Booking</button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card">
                <div class="card-body overflow-auto" style="height: 484px;">
                    <h5 class="card-title text-center">Buku Terbaru</h5>
                    <hr>
                    @foreach ($newest_book as $books)
                    <div class="card-body text-center">
                        <img src="{{ asset($books->image) }}" class="card-img-top img-fluid" style="width:100px">
                        <h6 class="text-truncate"> <a href="{{route('book.show', $books->judul)}}">
                                {{$books->judul}} </a></h6>
                        <hr>
                        <p class="text-truncate">{{$books->sinopsis}}.</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-sinopsis-tab" data-toggle="pill" href="#v-pills-sinopsis"
                                    role="tab" aria-controls="v-pills-home" aria-selected="true">Sinopsis</a>
                                <a class="nav-link" id="v-pills-detail-tab" data-toggle="pill" href="#v-pills-detail"
                                    role="tab" aria-controls="v-pills-profile" aria-selected="false">Detail</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-sinopsis" role="tabpanel"
                                    aria-labelledby="v-pills-sinopsis-tab">{{$item->sinopsis}}</div>
                                <div class="tab-pane fade" id="v-pills-detail" role="tabpanel"
                                    aria-labelledby="v-pills-detail-tab">
                                    <h5>Tahun Terbit : {{$item->tahunterbit}}</h5>
                                    <h5>Hal : {{$item->hal}} Hal</h5>
                                    <h5>Rating : {{($item->rating != null ? $item->rating : "Belum tersedia")}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
