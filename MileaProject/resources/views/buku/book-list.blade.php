@extends('layouts.main_template')

@section('title', 'Semua Buku')


@section('CSS')
<style>
    .multiselect-container.dropdown-menu.show {
        width: max-content;
    }

</style>
@endsection

@section('JS')
<script>
    function fetch_data(page, sort_type, sort_by) {
        var penerbit = $('#filter_penerbit').val();
        var pengarang = $('#filter_pengarang').val();
        var status = $("input[name='filter_status']:checked").val();
        if (penerbit.length < 0) {
            penerbit = [];
        }
        if (pengarang.length < 0) {
            pengarang = [];
        }

        $.ajax({
            url: "{{request()->segment(2)}}/paginate?page=" + page + "&sort_by=" + sort_by + "&sort_type=" + sort_type +
                "&penerbit=" + penerbit + "&pengarang=" + pengarang + "&status=" +
                status,
            success: function (data) {
                $('#list_data').html('');
                $('#list_data').html(data);
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
        var status  = $("input[name='filter_status']:checked").val();
        var coloum  = $('#sort_by').val();
        var short   = $('#sort_type').val();
        var page    = $('#sort_page').val();
        var test    = getAllInput();

        fetch_data(page, short, coloum);
    });

    $(document).on('click', '.sort', function () {
        var coloum_name = $('#sort_by').val();
        var order_type = $('#sort_type').val();
        var reverse_order = '';
        if (order_type == 'asc') {
            $('#sort_type').val('desc');
            reverse_order = 'desc';
        } else if (order_type == 'desc') {
            $('#sort_type').val('asc');
            reverse_order = 'asc';
        }
        $('#sort_by').val(coloum_name);
        $('#sort_type').val(reverse_order);
        var page = $('#sort_page').val();
        fetch_data(page, reverse_order, coloum_name);
    });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#sort_page').val(page);
        var column_name = $('#sort_by').val();
        var sort_type = $('#sort_type').val();
        $('li').removeClass('active');
        $(this).parent().addClass('active');
        fetch_data(page, sort_type, column_name);
    });

</script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Filter</h5>
                    <hr>
                    <form action="#" id="form_filter">
                        <div class="row">
                            <div class="form-row col-md-12">
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
                            <div class="form-row col-md-12">
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
                            <div class="form-row col-md-12">
                                <div class="col-md-3">Status</div>
                                <div class="col-md-9">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="filter_status1" name="filter_status"
                                            class="custom-control-input" checked>
                                        <label class="custom-control-label" value="0" for="filter_status1">Semua</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="filter_status2" value="1" name="filter_status"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="filter_status2">Tersedia</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <button type="button" id="btn_search" class="btn btn-primary" name="submit"
                                    value="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <select class="form-control col-md-3 sort" name="sort_page" id="sort_page">
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        &nbsp;
                        <select class="form-control col-md-3 sort" name="sort_type" id="sort_type">
                            <option value="">-- Jenis urutan --</option>
                            <option value="desc">Terbaru</option>
                            <option value="asc">Terlama</option>
                        </select>
                        &nbsp;
                        <select class="form-control col-md-3 sort" name="sort_by" id="sort_by">
                            <option value="">-- Urut Berdasarkan --</option>
                            <option value="diskon">Diskon</option>
                            <option value="rating">Terbaik</option>
                        </select>
                    </div>
                    <div class="row" id="list_data">
                        @include('buku.book-data')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
