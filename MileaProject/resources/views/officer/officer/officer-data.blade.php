@if(count($officers) == 0)
<tr>
    <td colspan="5"> <h5 class="text-center">Tidak ada data Officer !</h5></td>
</tr>
@endif

@foreach ($officers as $off)
<tr>
    <th scope="row">{{ ($officers->currentPage() * $officers->perPage())-($officers->perPage() - $loop->iteration) }}</th>
    <td>{{$off->name}}</td>
    <td>{{$off->email}}</td>
    <td>{{$off->phone_number}}</td>
    <td>
        <a href="{{route('book.show', $off->id)}}" class="btn btn-success" data-toggle="tooltip" data-placement="top"
            title="Visit" data-toggle="modal" data-target="#exampleModal"><i class="fad fa-eye"></i></a>
        <a href="{{route('book.edit', $off->id)}}" class="btn btn-info" data-toggle="tooltip" data-placement="top"
            title="Edit" data-toggle="modal" data-target="#exampleModal"><i class="fad fa-edit"></i></a>
        <a onclick="launchOptionModal('Hapus',{{$off->id}}, 'destroy')" class="btn btn-danger" data-toggle="tooltip"
            data-placement="top" title="Hapus"><i class="fad fa-trash-alt"></i></a>
    </td>
</tr>
@endforeach

<tr>
    <td colspan="7" align="center">
        {!! $officers->links() !!}
    </td>
</tr>
