@extends('Backend.layout.app')

@section('custom-style')
    <style>
        /* Custom styling can be added here */
    </style>
@endsection

@section('main-content')
<div class="container mt-4">
    <h1>Edit Category</h1>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mb-3">Back to Categories</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $category->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required>
        </div>

        <div class="mb-3">
            <label for="banner" class="form-label">Banner</label>
            <input type="file" class="form-control" id="banner" name="banner">
            @if ($category->banner)
                <p class="mt-2"><strong>Current Banner:</strong></p>
                <img src="{{ asset('storage/' . $category->banner) }}" alt="Current Banner" width="150">
            @endif
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icon</label>
            <input type="file" class="form-control" id="icon" name="icon">
            @if ($category->icon)
                <p class="mt-2"><strong>Current Icon:</strong></p>
                <img src="{{ asset('storage/' . $category->icon) }}" alt="Current Icon" width="100">
            @endif
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>
@endsection
