@extends('layout.default')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h1 class="my-0 font-weight-normal">{{ $commercial->name }}</h1>
        </div>
        <div class="card-body">
            Type: {{ ucfirst($commercial->type) }}; Category:  <a href="{{ route('category.show', $commercial->category->id) }}" title="View category">{{ $commercial->category->name }}</a>  <br /><br />
            {{ $commercial->content }}
        </div>
    </div>

@endsection
