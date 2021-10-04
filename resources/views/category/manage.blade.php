@extends('layout.default')

@section('content')
    <h1>
        @isset($commercial->id)
            Edit category
        @else
            Add category
        @endisset
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong><br />
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ $category->id == null ? route('category.store') :  route('category.update', $category->id) }}" method="POST">
        @csrf
        @isset($category->id)
            @method('PUT')
        @endisset

        <div class="form-group">
            <label for="parent_id">Parent category</label>
            <select class="form-control" name="parent_id" id="parent_id">
                <option value="">- category -</option>
                @foreach ($parent as $entry)
                    <option value="{{ $entry->id }}" {{ old('parent_id', $category->parent_id) == $entry->id ? 'selected' : '' }}>{{ $entry->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $category->name) }}" placeholder="Name" />
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
