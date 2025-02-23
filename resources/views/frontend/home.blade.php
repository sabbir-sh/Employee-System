@extends('frontend.layout.app')

@section('custom-style')
    <style>
        .hero {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            padding: 60px 0;
        }

        .feature-box {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 8px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }
    </style>
@endsection

@section('main-content')

    <!-- Banner Section -->
    <div id="bannerSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner">
            @forelse ($banners as $banner)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <!-- Image Display Only -->
                    @if ($banner->photo)
                        <img src="{{ Storage::url($banner->photo) }}" alt="Banner Image" class="d-block w-100 banner-img">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" alt="No Image" class="d-block w-100 banner-img">
                    @endif
                </div>
            @empty
                <div class="carousel-item active">
                    <img src="{{ asset('images/no-image.png') }}" alt="No Image" class="d-block w-100 banner-img">
                </div>
            @endforelse
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <!-- Features Section -->
    <div class="container mt-5">
        <!-- Shop by Category Section Header -->
        <h2 class="text-center mb-4" style="font-size: 2.5rem; font-weight: bold; color: #030303;">Shop By Category</h2>

        <!-- Categories Row -->
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($categories as $category)
                <div class="col">
                    <div class="card shadow-sm border-0 h-100" style="transition: transform 0.3s ease-in-out;">
                        <div class="category-icon text-center p-4" style="border-radius: 10px; overflow: hidden;">
                            @if ($category->icon)
                                <!-- Inline styling for 300x300 icon size -->
                                <img src="{{ asset('storage/'.$category->icon) }}" alt="{{ $category->title }} Icon" style="width: 300px; height: 300px; object-fit: contain; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                            @else
                                <div class="no-icon-placeholder rounded-circle d-flex justify-content-center align-items-center" style="width: 300px; height: 300px; background-color: #f0f0f0; border-radius: 10px; border: 1px dashed #ccc;">
                                    <span class="text-muted" style="font-size: 18px;">No Icon</span>
                                </div>
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size: 1.25rem; font-weight: 600; color: #333;">{{ $category->title }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection

@section('custom-script')
<script>
    // Custom scripts (if needed)
</script>
@endsection
