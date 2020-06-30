@extends('layouts.dashboard')

@section('title', "Daftar Buku")

@section('CSS')
<style>
    .multiselect-container.dropdown-menu.show {
        width: max-content;
    }

</style>
@endsection

@section('JS')
<script>
    function clear_icon() {
        $('#id_icon').html('');
        $('#post_title_icon').html('');
    }

    function fetch_data(page, sort_type, sort_by, query) {
        var penerbit = $('#filter_penerbit').val();
        var pengarang = $('#filter_pengarang').val();
        var tahun = $('#filter_tahun').val();
        if (penerbit.length < 0) {
            penerbit = [];
        }
        if (pengarang.length < 0) {
            pengarang = [];
        }

        $.ajax({
            url: "book/paginate?page=" + page + "&sort_by=" + sort_by + "&sort_type=" + sort_type +
                "&query=" + query + "&t=books&penerbit=" + penerbit + "&pengarang=" + pengarang + "&thn=" +
                tahun,
            success: function (data) {
                $('#tbl_data').html('');
                $('#tbl_data').html(data);
            }
        });
    }

    function getAllInput() {
        var test = [];
        $("#form_filter").each(function (index, elem) {
            var input = $(this).find(':input');
            for (let index = 0; index < input.length; index++) {
                if (input[index].name != "") {
                    test.push(input[index].name);
                }
            }
        });
        return test;
    }

    $(document).on('click', '#btn_search', function () {
        var query = $('#filter_judul').val();
        var coloum = $('#hidden_column_name').val();
        var short = $('#hidden_sort_type').val();
        var page = $('#hidden_page').val();
        var test = getAllInput();

        fetch_data(page, short, coloum, query);
    });

    $(document).on('click', '.sorting', function () {
        var coloum_name = $(this).data('column_name');
        var order_type = $(this).data('sorting_type');
        var reverse_order = '';
        if (order_type == 'asc') {
            $(this).data('sorting_type', 'desc');
            reverse_order = 'desc';
            clear_icon();
            $('#' + coloum_name + '_icon').html('<i class="fad fa-arrow-bottom"></i>');
        } else if (order_type == 'desc') {
            $(this).data('sorting_type', 'asc');
            reverse_order = 'asc';
            clear_icon();
            $('#' + coloum_name + '_icon').html('<i class="fad fa-arrow-up"></i>');
        }
        $('#hidden_column_name').val(coloum_name);
        $('#hidden_sort_type').val(reverse_order);
        var page = $('#hidden_page').val();
        var query = $('#filter_judul').val();
        fetch_data(page, reverse_order, coloum_name, query);
    });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var column_name = $('#hidden_column_name').val();
        var sort_type = $('#hidden_sort_type').val();
        var query = $('#filter_judul').val();
        $('li').removeClass('active');
        $(this).parent().addClass('active');
        fetch_data(page, sort_type, column_name, query);
    });

</script>
@endsection

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('officer.home')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Daftar Buku</li>
</ol>
<div class="container-fluid">
    <h1 class="float-left">Daftar Buku</h1>
    <a href="{{route('book.create')}}" class="btn btn-success float-right">Tambah</a>
    <br><br>
    <hr>
    <div class="card">
        <div class="card-header">Filter</div>
        <div class="card-body">
            <form action="" name="form_filter" id="form_filter">
                <div class="row">
                    <div class="form-row col-md-6">
                        <div class="col-md-3">Penerbit</div>
                        <div class="col-md-9">
                            <select class="multiple-checkboxes" name="filter_penerbit" id="filter_penerbit"
                                multiple="multiple">
                                @foreach ($list_penerbit as $penerbit)
                                <option value="{{$penerbit->penerbit}}">{{$penerbit->penerbit}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row col-md-6">
                        <div class="col-md-3">Pengarang</div>
                        <div class="col-md-9">
                            <select class="multiple-checkboxes" name="filter_pengarang" id="filter_pengarang"
                                multiple="multiple">
                                @foreach ($list_pengarang as $pengarang)
                                <option value="{{$pengarang->pengarang}}">{{$pengarang->pengarang}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row col-md-6">
                        <div class="col-md-3">Tahun Terbit</div>
                        <div class="col-md-9">
                            <input type="number" name="filter_tahun" id="filter_tahun" class="form-control">
                        </div>
                    </div>
                    <div class="form-row col-md-6">
                        <div class="col-md-3">Judul Buku</div>
                        <div class="col-md-9">
                            <input type="text" name="filter_judul" id="filter_judul" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="button" id="btn_search" class="btn btn-primary" name="submit"
                            value="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">Data</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="judul"
                                style="cursor: pointer">Judul <i id="id_icon"></i></th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Jumlah Hal</th>
                            <th class="text-center" scope="col" style="width: 170px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_data">
                        @include('officer.buku.book-data')
                    </tbody>
                </table>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
            </div>
        </div>
    </div>
</div>
@endsection
