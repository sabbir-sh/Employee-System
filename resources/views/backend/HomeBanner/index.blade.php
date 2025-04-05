

@extends('Backend.layout.app')

@section('main-content')
<div class="container mt-5">
    <h2 class="text-center mb-4 bg-light border border-primary rounded p-3 ">
        Home Banners Management
    </h2>

    <div class="row">
        {{-- Left Section: Add Banner Form --}}
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Add New Banner</div>
                <div class="card-body">
                    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" id="photo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="offer" class="form-label">Offer</label>
                            <input type="text" name="offer" id="offer" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="number" name="position" id="position" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="published" class="form-label">Status</label>
                            <select name="published" id="published" class="form-select">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="url" name="link" id="link" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Add Banner</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Right Section: Banner List --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>All Banners</span>
                    <a href="{{ route('admin.banners.create') }}" class="btn btn-sm btn-success">Add New</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($banners as $index => $banner)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-center">
                                        @if ($banner->photo)
                                            <img src="{{ asset('storage/'.$banner->photo)}}" width="120" height="40" style="object-fit: cover;" alt="Banner">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $banner->title }}<br>
                                        <small class="text-muted">{{ $banner->subtitle }}</small><br>
                                        <small class="text-info">{{ $banner->offer }}</small>
                                    </td>
                                    <td>
                                        @if ($banner->published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-danger">Unpublished</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this banner?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No banners available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- /.row -->
</div>
@endsection

