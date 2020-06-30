@extends('layouts.dashboard')

@section('title', "Daftar User")

@section('CSS')
<style>
    .multiselect-container.dropdown-menu.show {
        width: max-content;
    }
    label>#profile {
        display: none;
    }
</style>
@endsection

@section('JS')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#imagePreview").attr("src",e.target.result);
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile").change(function() {
        readURL(this);
    });
    function clear_icon() {
        $('#id_icon').html('');
        $('#post_title_icon').html('');
    }

    function fetch_data(page, sort_type, sort_by, query) {
        var penerbit = $('#filter_penerbit').val();
        var pengarang = $('#filter_pengarang').val();
        $.ajax({
            url: "user/paginate?page=" + page + "&sort_by=" + sort_by + "&sort_type=" + sort_type +
                "&search=" + query,
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
        var query = $('#filter_name').val();
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
        var query = $('#filter_name').val();
        $('li').removeClass('active');
        $(this).parent().addClass('active');
        fetch_data(page, sort_type, column_name, query);
    });
    $('.reset-pass').on('click', function() {
        let id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('officer/manajemen-user/user/resetpass')}}"+'/'+id,
            type: "POST",
            success: function (data) {
                alert('Password baru anda : ' + data.password);
            }
        });
    });

    $('.view-user').on('click', function() {

        let id = $(this).data('id');
        $('#viewUser-'+id).modal('show');
    });
</script>
@endsection

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('officer.home')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Daftar User</li>
</ol>
<div class="container-fluid">
    <h1 class="float-left">Daftar User</h1>
    <br><br>
    <hr>
    <hr>
    <div class="card">
        <div class="card-header">Filter</div>
        <div class="card-body">
            <form action="" name="form_filter" id="form_filter">
                <div class="row">
                    <div class="form-row col-md-6">
                        <div class="col-md-3">Nama User</div>
                        <div class="col-md-9">
                            <input type="text" name="filter_name" id="filter_name" class="form-control">
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
        <div class="card-header">Data User</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" class="sorting" data-sorting_type="asc" data-column_name="judul"
                                style="cursor: pointer">Nama <i id="id_icon"></i></th>
                            <th scope="col">Email</th>
                            <th scope="col">No Telepon</th>
                            <th class="text-center" scope="col" style="width: 170px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_data">
                        @include('officer.user.user-data')
                    </tbody>
                </table>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
            </div>
            @foreach ($users as $usr)
            <div class="modal" id="viewUser-{{$usr->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="viewUserLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">User Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="nama"
                                            value="{{$usr->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="email"
                                            value="{{$usr->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number" class="col-sm-2 col-form-label">No Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="phone_number"
                                            value="{{$usr->phone_number}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="address"
                                            value="{{$usr->address}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="avatar" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <div class="text-center">
                                            <div class="pad-ver">
                                                <img id="imagePreview" width="200" src="data:image/png;base64,{{ (!isset($usr) || is_null($usr->avatar) ? base64_encode(file_get_contents('image/user/default.png')) : $usr->avatar )}}" class="img-lg img-circle" alt="Profile Picture">
                                            </div>
                                            <label class="btn btn-block btn-success">Pilih Gambar
                                                <input type="file" name="avatar" id="profile" accept=".png, .jpg, .jpeg" disabled>
                                                <label for="profile"></label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
