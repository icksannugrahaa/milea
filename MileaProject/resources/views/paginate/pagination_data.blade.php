@foreach($books as $row)
<tr>
    <td>{{ $row->id}}</td>
    <td>{{ $row->judul }}</td>
    <td>{{ $row->pengarang }}</td>
</tr>
@endforeach
<tr>
    <td colspan="3" align="center">
        {!! $books->links() !!}
    </td>
</tr>
