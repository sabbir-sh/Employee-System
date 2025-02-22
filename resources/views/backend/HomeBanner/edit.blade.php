@extends('Backend.layout.app')

@section('custom-style')
    <style>
        /* Custom styling can be added here */
    </style>
@endsection

@section('main-content')
    <div class="container mt-5">
        <h2 class="text-center form-heading mb-4">Edit Home Banner</h2>

        <!-- Form to Edit Home Banner -->
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            @method('PUT')

            <!-- Banner Details Form -->
            <div class="row">
                <!-- Photo Field -->
                <div class="col-md-6 mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    @if ($banner->photo)
                        <img src="{{ asset('storage/' . $banner->photo) }}" alt="Current Photo" class="mt-2" width="100">
                    @endif
                </div>

                <!-- Title Field -->
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $banner->title }}">
                </div>

                <!-- Subtitle Field -->
                <div class="col-md-6 mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $banner->subtitle }}">
                </div>

                <!-- Offer Field -->
                <div class="col-md-6 mb-3">
                    <label for="offer" class="form-label">Offer</label>
                    <input type="text" name="offer" id="offer" class="form-control" value="{{ $banner->offer }}">
                </div>

                <!-- Position Field -->
                <div class="col-md-6 mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="number" name="position" id="position" class="form-control" value="{{ $banner->position }}">
                </div>

                <!-- Status Field -->
                <div class="col-md-6 mb-3">
                    <label for="published" class="form-label">Status</label>
                    <select name="published" id="published" class="form-select">
                        <option value="1" {{ $banner->published ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ !$banner->published ? 'selected' : '' }}>Unpublished</option>
                    </select>
                </div>

                <!-- Link Field -->
                <div class="col-md-6 mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="url" name="link" id="link" class="form-control" value="{{ $banner->link }}">
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
