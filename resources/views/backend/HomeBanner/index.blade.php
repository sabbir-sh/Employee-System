@extends('Backend.layout.app')

@section('custom-style')
    <style>
        .banner-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        .banner-card:hover {
            transform: translateY(-5px);
        }
        .banner-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .banner-content {
            padding: 15px;
        }
        .banner-actions {
            border-top: 1px solid #eaeaea;
            padding: 10px 15px;
            background-color: #f9f9f9;
        }
        .banner-actions a,
        .banner-actions form button {
            margin-right: 5px;
        }
    </style>
@endsection

@section('main-content')
    <div class="container mt-5">
        <h2 class="text-center form-heading mb-4">Home Banners</h2>

        <!-- Add New Banner Button -->
        <div class="text-end mb-4">
            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Add New Banner</a>
        </div>

        <!-- Display Home Banners -->
        <div class="row">
            @forelse ($banners as $banner)
                <div class="col-md-4 mb-4">
                    <div class="banner-card">
                        <!-- Image Display -->
                        {{-- @if ($banner->photo)
                                <img src="{{ asset('storage/' . $banner->photo) }}" alt="Current Photo" class="mt-2" width="100">
                            @endif --}}
                        <div class="col-md-6 mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" id="photo" class="form-control">
                            @if ($banner->photo)
                                <img src="{{ asset('storage/' . $banner->photo) }}" alt="Current Photo" class="mt-2" width="100">
                            @endif
                        </div>

                        <!-- Banner Details -->
                        <div class="banner-content">
                            <h5>{{ $banner->title }}</h5>
                            @if ($banner->subtitle)
                                <p class="text-muted">{{ $banner->subtitle }}</p>
                            @endif

                            @if ($banner->offer)
                                <p><strong>Offer:</strong> {{ $banner->offer }}</p>
                            @endif

                            @if ($banner->position)
                                <p><strong>Position:</strong> {{ $banner->position }}</p>
                            @endif

                            @if (!is_null($banner->published))
                                <p>
                                    <strong>Status:</strong>
                                    @if($banner->published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-danger">Unpublished</span>
                                    @endif
                                </p>
                            @endif

                            @if ($banner->link)
                                <p>
                                    <strong>Link:</strong>
                                    <a href="{{ $banner->link }}" target="_blank">Visit</a>
                                </p>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="banner-actions d-flex justify-content-end">
                            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this banner?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No banners available</p>
                </div>
            @endforelse
        </div>

    </div>
@endsection
