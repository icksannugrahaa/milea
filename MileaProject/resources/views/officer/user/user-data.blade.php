@if(count($users) == 0)
<tr>
    <td colspan="5"> <h5 class="text-center">Tidak ada data users !</h5></td>
</tr>
@endif

@foreach ($users as $usr)
<tr>
    <th scope="row">{{ ($users->currentPage() * $users->perPage())-($users->perPage() - $loop->iteration) }}</th>
    <td>{{$usr->name}}</td>
    <td>{{$usr->email}}</td>
    <td>{{$usr->phone_number}}</td>
    <td>
        <button type="button" class="btn btn-success view-user" data-toggle="tooltip" data-placement="top"
            title="Lihat Detail" data-id="{{$usr->id}}"><i class="fad fa-eye"></i></button>
        <button data-id="{{$usr->id}}" class="btn btn-info reset-pass" data-toggle="tooltip" data-placement="top"
            title="Reset Password"><i class="fad fa-history"></i></button>
        <button onclick="launchOptionModal('Hapus',{{$usr->id}}, 'destroy')" class="btn btn-danger" data-toggle="tooltip"
            data-placement="top" title="Hapus"><i class="fad fa-trash-alt"></i></button>
    </td>
</tr>
@endforeach

<tr>
    <td colspan="5" align="center">
        {!! $users->links() !!}
    </td>
</tr>
