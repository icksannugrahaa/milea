@extends('layouts.dashboard')

@section('title', "Daftar Buku")

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('officer.home')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Daftar Buku</li>
</ol>
<div class="container">
    <h1 class="float-left">Daftar Buku</h1>
    <a href="{{route('book.tambah')}}" class="btn btn-success float-right">Tambah</a>
    <br><br>
    <hr>
    <table class="table table-hover table-bordered table-responsive" style="width:100%">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Jumlah Hal</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$book->judul}}</td>
                <td>{{$book->pengarang}}</td>
                <td>{{$book->penerbit}}</td>
                <td>{{$book->tahunterbit}}</td>
                <td>{{$book->hal}}</td>
                <td>
                    <a href="{{route('book.ubah',$book->id)}}" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus?')"  href="{{route('book.hapus',$book->id)}}" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
