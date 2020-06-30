@extends('layouts.main_template')

@section('title', (isset($book->judul) ? $book->judul : "Buku"))

@section('CSS')
<style>
    /* Style the Image Used to Trigger the Modal */
    img {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    img:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    #image-viewer {
        display: none;
        z-index: 9999 !important;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    .modal-content {
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    #image-viewer .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    #image-viewer .close:hover,
    #image-viewer .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }

</style>
@endsection

@section('JS')
<script>
    $(".images img").click(function () {
        $("#full-image").attr("src", $(this).attr("src"));
        $('#image-viewer').show();
    });

    $("#image-viewer .close").click(function () {
        $('#image-viewer').hide();
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body text-center images">
                    @foreach ($book_covers as $cover)
                    <img src="{{ asset($cover->image) }}" class="card-img-top img-fluid" style="width:300px"><br>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$book->judul}}</h5>
                    <p>{{$book->pengarang}}</p>
                    <br>
                    <p>Jumlah : Tersisa {{$book->bk_sisa}} dari total {{$book->bk_total}}</p>
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
                    @foreach ($new_books as $books)
                    <div class="card-body text-center">
                        <img src="{{ asset($new_book_covers[$books->id]->image) }}" class="card-img-top img-fluid"
                            style="width:100px">
                        <h6 class="text-truncate"> <a href="{{route('book.show', $books->judul)}}">
                                {{$books->judul}} </a></h6>
                        <hr>
                        <p class="text-truncate">{{$books->sinopsis}}.</p>
                    </div>
                    @endforeach
                    <div id="image-viewer">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="full-image">
                    </div>
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
                                <a class="nav-link active" id="v-pills-sinopsis-tab" data-toggle="pill"
                                    href="#v-pills-sinopsis" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">Sinopsis</a>
                                <a class="nav-link" id="v-pills-detail-tab" data-toggle="pill" href="#v-pills-detail"
                                    role="tab" aria-controls="v-pills-profile" aria-selected="false">Detail</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-sinopsis" role="tabpanel"
                                    aria-labelledby="v-pills-sinopsis-tab">{{$book->sinopsis}}</div>
                                <div class="tab-pane fade" id="v-pills-detail" role="tabpanel"
                                    aria-labelledby="v-pills-detail-tab">
                                    <h5>Tahun Terbit : {{$book->tahunterbit}}</h5>
                                    <h5>Hal : {{$book->hal}} Hal</h5>
                                    <h5>Rating : {{($book->rating != null ? $book->rating : "Belum tersedia")}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
