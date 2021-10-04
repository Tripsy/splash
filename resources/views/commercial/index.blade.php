@extends('layout.default')

@section('content')
    <h1>List ads</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Category</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        @foreach ($commercial as $entry)
            <tr>
                <td>{{ $entry->name }}</td>
                <td>{{ $entry->type }}</td>
                <td>{{ $entry->category->name }}</td>
                <td>{{ $entry->created_at }}</td>
                <td class="text-center">
                    <a href="{{ route('commercial.show', $entry->id) }}" title="View commercial ad"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('commercial.edit', $entry->id) }}" title="Edit commercial ad"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('commercial.destroy', $entry->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="Delete commercial add" style="border: none; background-color: transparent;">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
