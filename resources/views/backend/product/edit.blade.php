@extends('Backend.layout.app')

@section('main-content')
<div class="container-fluid mt-4">
    <h2 class="mb-4">Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                <h4>Update Product</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    {{-- Product Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Product Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                    </div>

                    {{-- Tagline --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tagline</label>
                        <input type="text" name="tagline" class="form-control" value="{{ old('tagline', $product->tagline) }}">
                    </div>

                    {{-- Category --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" value="{{ old('category', $product->category) }}">
                    </div>

                    {{-- Price --}}
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Price ($)</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                    </div>

                    {{-- Quantity --}}
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}">
                    </div>

                    {{-- Discount --}}
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Discount (%)</label>
                        <input type="number" name="discount" class="form-control" value="{{ old('discount', $product->discount) }}">
                    </div>

                    {{-- Photos --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Photos</label>
                        <input type="file" name="photos[]" class="form-control" multiple onchange="previewPhotos(event)">
                        <div class="d-flex flex-wrap gap-2 mt-2" id="photos-preview">
                            @foreach (json_decode($product->photos, true) ?? [] as $photo)
                                <img src="{{ asset('storage/' . $photo) }}" width="70" height="70" style="object-fit:cover; border-radius:5px;" />
                            @endforeach
                        </div>
                    </div>

                    {{-- Thumbnail --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Thumbnail Image</label>
                        <input type="file" name="thumbnail_img" class="form-control" onchange="previewSingleImage(event, 'thumbnail-preview')">
                        <div id="thumbnail-preview" class="mt-2">
                            @if ($product->thumbnail_img)
                                <img src="{{ asset('storage/' . $product->thumbnail_img) }}" width="70" height="70" style="object-fit:cover; border-radius:5px;">
                            @endif
                        </div>
                    </div>

                    {{-- Hover Image --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hover Image</label>
                        <input type="file" name="hover_img" class="form-control" onchange="previewSingleImage(event, 'hover-preview')">
                        <div id="hover-preview" class="mt-2">
                            @if ($product->hover_img)
                                <img src="{{ asset('storage/' . $product->hover_img) }}" width="70" height="70" style="object-fit:cover; border-radius:5px;">
                            @endif
                        </div>
                    </div>

                    {{-- Video Image --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Video Image</label>
                        <input type="file" name="video_img" class="form-control" onchange="previewSingleImage(event, 'video-preview')">
                        <div id="video-preview" class="mt-2">
                            @if ($product->video_img)
                                <img src="{{ asset('storage/' . $product->video_img) }}" width="70" height="70" style="object-fit:cover; border-radius:5px;">
                            @endif
                        </div>
                    </div>

                    {{-- Video Link --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Video Link</label>
                        <input type="text" name="video_link" class="form-control" value="{{ old('video_link', $product->video_link) }}">
                    </div>

                    {{-- Short Description --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Short Description</label>
                        <textarea name="short_description" class="form-control" rows="2">{{ old('short_description', $product->short_description) }}</textarea>
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Full Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                    </div>

                    {{-- FAQ --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">FAQ</label>
                        <textarea name="faq" class="form-control" rows="3">{{ old('faq', $product->faq) }}</textarea>
                    </div>

                    {{-- Product Slug --}}
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (URL-friendly)</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $product->slug) }}">
                    </div>

                    {{-- Meta Title --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $product->meta_title) }}">
                    </div>

                    {{-- Meta Description --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $product->meta_description) }}</textarea>
                    </div>

                    {{-- Meta Image --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Meta Image</label>
                        <input type="file" name="meta_img" class="form-control">
                        @if ($product->meta_img)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $product->meta_img) }}" width="70" height="70" style="object-fit:cover; border-radius:5px;">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-success">Update Product</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- JS Image Preview --}}
<script>
    function previewPhotos(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('photos-preview');
        previewContainer.innerHTML = '';

        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '70px';
                img.style.height = '70px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '5px';
                img.classList.add('me-2', 'mb-2');
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }

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
                img.style.borderRadius = '5px';
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
