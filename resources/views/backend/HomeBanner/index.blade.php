@extends('Backend.layout.app')

@section('custom-style')
    <style>
        .banner-table th, .banner-table td {
            vertical-align: middle;
        }
        .banner-img {
            width: 100px;
            height: auto;
        }
    </style>
@endsection

@section('main-content')
    <div class="container mt-5">
        <h2 class="text-center form-heading mb-4">Home Banners</h2>
        <!-- Add New Banner Button -->
        <div class="text-end">
            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Add New Banner</a>
        </div>
        <!-- Table to Display Home Banners -->
        <table class="table table-bordered table-hover banner-table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Offer</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($banners as $index => $banner)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        {{-- <td>
                            <img src="{{ asset('storage/' . $banner->photo) }}" alt="Banner Image" class="banner-img">
                        </td> --}}
                        <td class="text-center">
                            @if ($banner->photo)
                                <img src="{{ Storage::url($banner->photo) }}" alt="Profile Picture" width="200" height="50">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>{{ $banner->title }}</td>
                        <td>{{ $banner->subtitle }}</td>
                        <td>{{ $banner->offer }}</td>
                        <td>{{ $banner->position }}</td>
                        <td>
                            @if($banner->published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-danger">Unpublished</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this banner?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No banners available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


    </div>
@endsection
