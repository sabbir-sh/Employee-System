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
        <h2 class="text-center mb-4" style="font-size: 2.5rem; font-weight: bold; color: #030303; letter-spacing: 1px; text-transform: uppercase;">Shop By Category</h2>

        <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel" style="position: relative;">
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                @foreach ($categories->chunk(4) as $chunkIndex => $chunk)
                    <button type="button" data-bs-target="#categoryCarousel" data-bs-slide-to="{{ $chunkIndex }}"
                            class="{{ $chunkIndex == 0 ? 'active' : '' }}"
                            aria-current="{{ $chunkIndex == 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $chunkIndex + 1 }}"
                            style="background-color: #007bff; border-radius: 50%; width: 15px; height: 15px; margin: 0 5px;">
                    </button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach ($categories->chunk(4) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row row-cols-1 row-cols-md-4 g-4 px-4 py-3" style="transition: transform 0.5s ease;">
                            @foreach ($chunk as $category)
                                <div class="col">
                                    <div class="card h-100" style="border: none; border-radius: 20px; overflow: hidden; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15); transition: transform 0.3s ease-in-out; background: #f8f9fa;">
                                        <div class="text-center p-4" style="background-color: #ffffff; border-radius: 15px; transition: transform 0.3s;">
                                            @if ($category->icon)
                                                <img src="{{ asset('storage/'.$category->icon) }}" alt="{{ $category->title }} Icon"
                                                     style="width: 100%; max-height: 220px; object-fit: contain; transition: transform 0.3s ease;">
                                            @else
                                                <div style="height: 220px; background-color: #e9ecef; display: flex; justify-content: center; align-items: center; border: 1px dashed #ccc; border-radius: 10px;">
                                                    <span style="color: #888; font-size: 18px;">No Icon</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-body text-center" style="padding-bottom: 1.5rem;">
                                            <h5 style="font-size: 1.2rem; font-weight: 600; color: #333; letter-spacing: 0.5px; text-transform: capitalize;">{{ $category->title }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Navigation Buttons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev"
                    style="position: absolute; top: 50%; left: -35px; width: 60px; height: 60px; background-color: #007bff; border-radius: 50%; box-shadow: 0 4px 12px rgba(0,0,0,0.15); border: none; z-index: 5; display: flex; align-items: center; justify-content: center;">
                <span class="carousel-control-prev-icon" style="filter: invert(1); width: 25px; height: 25px;"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next"
                    style="position: absolute; top: 50%; right: -35px; width: 60px; height: 60px; background-color: #007bff; border-radius: 50%; box-shadow: 0 4px 12px rgba(0,0,0,0.15); border: none; z-index: 5; display: flex; align-items: center; justify-content: center;">
                <span class="carousel-control-next-icon" style="filter: invert(1); width: 25px; height: 25px;"></span>
            </button>
        </div>
    </div>





    <!-- Task Section -->

    <div class="container mt-5">
        <h2 class="text-center mb-4" style="font-size: 2.5rem; font-weight: bold; color: #030303;">
            All Tasks Pending
        </h2>

        <!-- Categories Row -->
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($tasks as $task)
            <div class="col">
                <div class="card shadow-sm border-0 h-100" style="transition: transform 0.3s ease-in-out;">
                    <div class="category-icon text-center p-4"
                         style="border-radius: 10px; overflow: hidden;">

                        @if ($task->title)
                            <h4 class="text-primary">{{ $task->title }}</h4>
                        @else
                            <div class="no-icon-placeholder rounded-circle d-flex justify-content-center align-items-center"
                                 style="width: 300px; height: 300px; background-color: #f0f0f0;
                                        border-radius: 10px; border: 1px dashed #ccc;">
                                <span class="text-muted" style="font-size: 18px;">No Icon</span>
                            </div>
                        @endif
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title" style="font-size: 1.25rem; font-weight: 600; color: #333;">
                            {{ $task->title ?: 'Untitled Task' }}
                        </h5>
                        <p class="card-text">{{ $task->description }}</p>
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
