@extends('layouts.dashboard')

@section('title', "Edit Buku")

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('officer.home')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('books')}}">Daftar Buku</a>
    </li>
    <li class="breadcrumb-item active">Ubah Buku</li>
</ol>
<div class="container">
    <h1>Ubah Data</h1>
    <hr>
    <form action="{{route('book.update', $id)}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group row">
            <input type="hidden" name="id" value="{{$id}}" required autofocus>
            <label for="judul" class="col-md-2 col-form-label">Judul</label>

            <div class="col-md-6">
                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ (old('judul')) ? old('judul') : $judul }}" required autofocus>

                @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="pengarang" class="col-md-2 col-form-label">Pengarang</label>

            <div class="col-md-6">
                <input id="pengarang" type="text" class="form-control @error('pengarang') is-invalid @enderror" name="pengarang" value="{{ (old('pengarang')) ? old('pengarang') : $pengarang }}" required>

                @error('pengarang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="penerbit" class="col-md-2 col-form-label">Penerbit</label>

            <div class="col-md-6">
                <input id="penerbit" type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" value="{{ (old('penerbit')) ? old('penerbit') : $penerbit }}" required>

                @error('penerbit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="sinopsis" class="col-md-2 col-form-label">Sinopsis</label>

            <div class="col-md-6">
                <textarea name="sinopsis" id="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror" rows="2" value="{{ (old('sinopsis')) ? old('sinopsis') : $sinopsis }}">{{ (old('sinopsis')) ? old('sinopsis') : $sinopsis }}</textarea>

                @error('sinopsis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="tahunterbit" class="col-md-2 col-form-label">Tahun Terbit</label>

            <div class="col-md-6">
                <input id="tahunterbit" type="text" class="form-control @error('tahunterbit') is-invalid @enderror" name="tahunterbit" value="{{ (old('tahunterbit')) ? old('tahunterbit') : $tahunterbit }}" required>

                @error('tahunterbit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="hal" class="col-md-2 col-form-label">Jumlah Halaman</label>

            <div class="col-md-6">
                <input id="hal" type="text" class="form-control @error('hal') is-invalid @enderror" name="hal" value="{{ (old('hal')) ? old('hal') : $hal }}" required>

                @error('hal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="bk_sisa" class="col-md-2 col-form-label">Stok Buku Sekarang </label>

            <div class="col-md-6">
                <input id="bk_total" type="number" class="form-control @error('bk_sisa') is-invalid @enderror" name="bk_sisa"
                value="{{ (old('bk_sisa')) ? old('bk_sisa') : $bk_sisa }}" required>

                @error('bk_sisa')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="bk_total" class="col-md-2 col-form-label">Stok Buku Total </label>

            <div class="col-md-6">
                <input id="bk_total" type="number" class="form-control @error('bk_total') is-invalid @enderror" name="bk_total"
                value="{{ (old('bk_total')) ? old('bk_total') : $bk_total }}" required>

                @error('bk_total')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="status">Status Buku</label>

            <div class="col-md-6" style="margin-top: 5px">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="status" id="status" {{($status == 1 ? "checked" : "")}}>
                    <label class="custom-control-label" for="status"></label>
                  </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="hal" class="col-md-2 col-form-label">Covers</label>

            <div class="col-md-6">
                <input id="cover" type="file" class="form-control @error('hal') is-invalid @enderror" name="cover[]"
                    multiple>
            </div>

            @error('cover')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button onclick="return confirm('Apakah anda yakin akan mengupdate?')" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
