@foreach ($books as $book)
<tr>
    <th scope="row">{{ ($books->currentPage() * $books->perPage())-($books->perPage() - $loop->iteration) }}</th>
    <td>{{$book->judul}}</td>
    <td>{{$book->pengarang}}</td>
    <td>{{$book->penerbit}}</td>
    <td>{{$book->tahunterbit}}</td>
    <td>{{$book->hal}}</td>
    <td>
        <a href="{{route('book.show', $book->judul)}}" class="btn btn-success" data-toggle="tooltip" data-placement="top"
            title="Visit" data-toggle="modal" data-target="#exampleModal"><i class="fad fa-eye"></i></a>
        <a href="{{route('book.edit', $book->id)}}" class="btn btn-info" data-toggle="tooltip" data-placement="top"
            title="Edit" data-toggle="modal" data-target="#exampleModal"><i class="fad fa-edit"></i></a>
        <a onclick="launchOptionModal('Hapus',{{$book->id}}, 'destroy')" class="btn btn-danger" data-toggle="tooltip"
            data-placement="top" title="Hapus"><i class="fad fa-trash-alt"></i></a>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="7" align="center">
        {!! $books->links() !!}
    </td>
</tr>
