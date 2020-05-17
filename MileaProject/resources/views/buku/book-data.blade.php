<div class="col-sm-12 col-md-12 col-lg-12">
    {!! $books->links() !!}
    <br>
</div>
@foreach ($books as $book)
<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card" style="margin: 0% 5%;">
        <img src="{{ asset($book->image) }}" class="card-img-top img-fluid" alt="...">
        <div class="card-body col-12">
            <h6 class="text-truncate"> <a href="{{route('book.show', $book->judul)}}">
                    {{$book->judul}} </a></h6>
            <hr>
            <p class="text-truncate">{{$book->sinopsis}}.</p>
            <hr>
            <span class="badge badge-success">{{ ($book->status == 1) ? "Tersedia" : "Tidak Tersedia" }}</span>
        </div>
    </div>
    <br>
</div>
@endforeach
<div class="col-sm-12 col-md-12 col-lg-12">
    {!! $books->links() !!}
</div>
