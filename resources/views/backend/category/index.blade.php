@extends('Backend.layout.app')

@section('custom-style')
    <style>
        .category-image {
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
@endsection

@section('main-content')
<div class="container mt-4">
    <h2 class="text-center mb-4 bg-light border border-primary rounded p-3 ">
        Category Management
    </h2>


    <div class="row">
        {{-- Left Column: Create Category Form --}}
        <div class="col-md-4">
            {{-- Success and Error Messages --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Card --}}
            <div class="card">
                <div class="card-header">Add New Category</div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="banner" class="form-label">Banner</label>
                            <input type="file" class="form-control" id="banner" name="banner">
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon</label>
                            <input type="file" class="form-control" id="icon" name="icon">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Create Category</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Right Column: Category List --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category List</div>
                <div class="card-body p-0">
                    <table class="table table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Banner</th>
                                <th>Icon</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    @if ($category->banner)
                                        <img src="{{ asset('storage/'.$category->banner) }}" alt="Banner" width="80" height="50" class="category-image">
                                    @else
                                        <span class="text-muted">No Banner</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($category->icon)
                                        <img src="{{ asset('storage/'.$category->icon) }}" alt="Icon" width="40" height="40" class="category-image">
                                    @else
                                        <span class="text-muted">No Icon</span>
                                    @endif
                                </td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @if ($categories->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center text-muted">No categories found.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- /.col-md-8 -->
    </div> <!-- /.row -->
</div>
@endsection
