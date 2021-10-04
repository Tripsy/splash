@extends('layout.default')

@section('content')
    <h1>
        @isset($commercial->id)
            Edit commercial ad
        @else
            Add commercial ad
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
    <form action="{{ $commercial->id == null ? route('commercial.store') :  route('commercial.update', $commercial->id) }}" method="POST">
        @csrf
        @isset($commercial->id)
            @method('PUT')
        @endisset

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">- category -</option>
                @foreach ($category as $entry)
                    <option value="{{ $entry->id }}" {{ old('category_id', $commercial->category_id) == $entry->id ? 'selected' : '' }}>{{ $entry->name }}</option>
                    @foreach($entry->children as $child)
                        <option value="{{ $child->id }}" {{ old('category_id', $commercial->category_id) == $child->id ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp; > {{ $child->name }}</option>
                    @endforeach
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $commercial->name) }}" placeholder="Name" />
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Content" rows="4">{{ old('content', $commercial->content) }}</textarea>
        </div>
        <div class="form-group">
            <legend class="form-label">Type</legend>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="type_basic" value="basic" {{ old('type', $commercial->type) == 'basic' ? 'checked' : '' }} />
                <label class="form-check-label" for="type_basic">
                    Basic
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="type_extra" value="extra" {{ old('type', $commercial->type) == 'extra' ? 'checked' : '' }} />
                <label class="form-check-label" for="type_extra">
                    Extra
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="type_basic" value="ultra" {{ old('type', $commercial->type) == 'ultra' ? 'checked' : '' }} />
                <label class="form-check-label" for="type_ultra">
                    Ultra
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
