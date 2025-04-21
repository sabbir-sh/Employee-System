@extends('Backend.layout.app')


@section('main-content')
<div class="container-fluid mt-4">
    <h2 class="mb-4">Add New Product</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-header">
                <h4>Create Product</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    {{-- Name --}}
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Product Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    {{-- Tagline --}}
                    <div class="col-md-6 mb-3">
                        <label for="tagline" class="form-label">Tagline</label>
                        <input type="text" name="tagline" class="form-control" value="{{ old('tagline') }}">
                    </div>

                    {{-- Category --}}
                    <div class="col-md-6 mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" value="{{ old('category') }}">
                    </div>

                    {{-- Price --}}
                    <div class="col-md-3 mb-3">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}">
                    </div>

                    {{-- Quantity --}}
                    <div class="col-md-3 mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                    </div>

                    {{-- Discount --}}
                    <div class="col-md-3 mb-3">
                        <label for="discount" class="form-label">Discount (%)</label>
                        <input type="number" name="discount" class="form-control" value="{{ old('discount') }}">
                    </div>


                    {{-- Photos --}}
                    <div class="col-md-6 mb-3">
                        <label for="photos" class="form-label">Photos</label>
                        <input type="file" name="photos[]" class="form-control" multiple onchange="previewPhotos(event)">
                        <div id="photos-preview" class="d-flex flex-wrap mt-2 gap-2"></div>
                    </div>

                    {{-- Thumbnail --}}
                    <div class="col-md-6 mb-3">
                        <label for="thumbnail_img" class="form-label">Thumbnail Image</label>
                        <input type="file" name="thumbnail_img" class="form-control" onchange="previewSingleImage(event, 'thumbnail-preview')">
                        <div id="thumbnail-preview" class="mt-2"></div>
                    </div>

                    {{-- Hover Image --}}
                    <div class="col-md-6 mb-3">
                        <label for="hover_img" class="form-label">Hover Image</label>
                        <input type="file" name="hover_img" class="form-control" onchange="previewSingleImage(event, 'hover-preview')">
                        <div id="hover-preview" class="mt-2"></div>
                    </div>

                    {{-- Video Image --}}
                    <div class="col-md-6 mb-3">
                        <label for="video_img" class="form-label">Video Image</label>
                        <input type="file" name="video_img" class="form-control" onchange="previewSingleImage(event, 'video-preview')">
                        <div id="video-preview" class="mt-2"></div>
                    </div>

                    {{-- Video Link --}}
                    <div class="col-md-12 mb-3">
                        <label for="video_link" class="form-label">Video Link (YouTube, etc.)</label>
                        <input type="text" name="video_link" class="form-control">
                    </div>

                    {{-- Short Description --}}
                    <div class="col-md-12 mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <textarea name="short_description" class="form-control" rows="2">{{ old('short_description') }}</textarea>
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Full Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    </div>

                    {{-- FAQ --}}
                    <div class="col-md-12 mb-3">
                        <label for="faq" class="form-label">FAQ</label>
                        <textarea name="faq" class="form-control" rows="3">{{ old('faq') }}</textarea>
                    </div>
                    {{-- Product Slug --}}
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (URL-friendly)</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                    </div>

                    {{-- Meta Title --}}
                    <div class="col-md-6 mb-3">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                    </div>

                    {{-- Meta Description --}}
                    <div class="col-md-6 mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description') }}</textarea>
                    </div>


                    {{-- Meta Image --}}
                    <div class="col-md-6 mb-3">
                        <label for="meta_img" class="form-label">Meta Image</label>
                        <input type="file" name="meta_img" class="form-control">
                    </div>

                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
<script>
    // Multiple photos preview
    function previewPhotos(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('photos-preview');
        previewContainer.innerHTML = '';

        Array.from(files).forEach(file => {
            const reader = new FileReader();

            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('me-2', 'mb-2');
                img.style.width = '70px';
                img.style.height = '70px';
                img.style.objectFit = 'cover';
                img.style.border = '1px solid #ccc';
                img.style.borderRadius = '5px';
                previewContainer.appendChild(img);
            };

            reader.readAsDataURL(file);
        });
    }

    // Single image preview
    function previewSingleImage(event, previewId) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById(previewId);
        previewContainer.innerHTML = '';

        if (file) {
            const reader = new FileReader();

            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '70px';
                img.style.height = '70px';
                img.style.objectFit = 'cover';
                img.style.border = '1px solid #ccc';
                img.style.borderRadius = '5px';
                previewContainer.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
