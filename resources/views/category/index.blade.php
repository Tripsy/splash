@extends('layout.default')

@section('content')
    <h1>List categories</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Parent</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        @foreach ($category as $entry)
            <tr>
                <td>{{ $entry->name }}</td>
                <td>@if ($entry->parentName) {{ $entry->parentName->name }} @endif</td>
                <td>{{ $entry->created_at }}</td>
                <td class="text-center">
                    <a href="{{ route('category.show', $entry->id) }}" title="View category"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('category.edit', $entry->id) }}" title="Edit category"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('category.destroy', $entry->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="Delete category" style="border: none; background-color: transparent;">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
