@extends('layout.default')

@section('content')
    <h1>{{ $category->name }}</h1>

    @if(count($list) > 0)
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Date</th>
        </tr>
        @foreach ($list as $entry)
            <tr>
                <td>{{ $entry->name }}</td>
                <td>{{ $entry->type }}</td>
                <td>{{ $entry->created_at }}</td>
            </tr>
        @endforeach
    </table>
    @else
    <div class="text-danger">
        There are no ads listed in this category
    </div>
    @endif


@endsection
