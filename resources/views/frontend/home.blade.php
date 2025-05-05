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
                        <img src="{{ Storage::url($banner->photo) }}" alt="Banner Image" style="height: 100vh; width: 100%; class="d-block w-100 banner-img">
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
        <h2 class="text-center mb-4"
            style="font-size: 2.5rem; font-weight: bold; color: #212529; letter-spacing: 1px; text-transform: uppercase;">
            Shop By Category
        </h2>

        <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel" style="position: relative;">
            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach ($categories->chunk(4) as $chunkIndex => $chunk)
                    <button type="button" data-bs-target="#categoryCarousel" data-bs-slide-to="{{ $chunkIndex }}"
                            class="{{ $chunkIndex == 0 ? 'active' : '' }}"
                            aria-current="{{ $chunkIndex == 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $chunkIndex + 1 }}"
                            style="background-color: #333; border-radius: 50%; width: 12px; height: 12px; margin: 0 5px;">
                    </button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach ($categories->chunk(4) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row row-cols-1 row-cols-md-4 g-4 px-4 py-3">
                            @foreach ($chunk as $category)
                                <div class="col">
                                    <div class="card h-100"
                                         style="border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                                        <div class="text-center p-4"
                                             style="background-color: #fff; border-bottom: 1px solid #eee;">
                                            @if ($category->icon)
                                                <img src="{{ asset('storage/'.$category->icon) }}"
                                                     alt="{{ $category->title }} Icon"
                                                     style="width: 100%; max-height: 200px; object-fit: contain; transition: transform 0.3s;">
                                            @else
                                                <div style="height: 200px; background-color: #f1f1f1; display: flex; justify-content: center; align-items: center; border-radius: 10px;">
                                                    <span style="color: #aaa; font-size: 16px;">No Icon</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 style="font-size: 1.1rem; font-weight: 600; color: #333; margin: 0;">
                                                {{ $category->title }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev"
                    style="position: absolute; top: 45%; left: -25px; width: 45px; height: 45px; background-color: #d4c1c1; border-radius: 50%; box-shadow: 0 4px 8px rgba(0,0,0,0.15); border: none; z-index: 5;">
                <span class="carousel-control-prev-icon" style="filter: invert(1); width: 20px; height: 20px;"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next"
                    style="position: absolute; top: 45%; right: -25px; width: 45px; height: 45px; background-color: #d4c1c1; border-radius: 50%; box-shadow: 0 4px 8px rgba(0,0,0,0.15); border: none; z-index: 5;">
                <span class="carousel-control-next-icon" style="filter: invert(1); width: 20px; height: 20px;"></span>
            </button>
        </div>
    </div>



    <!-- Product Section -->
    <section class="py-5" style="background-color: #f9f9f9;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('assets/ee.jpg') }}" alt="E-System" class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-md-6">
                    <h2 class="mb-3" style="font-weight: bold; color: #0056b3;">About E-System</h2>
                    <p style="font-size: 1.1rem; color: #555;">
                        Welcome to <strong>E-System</strong>, your ultimate destination for an efficient, secure, and enjoyable online shopping experience. Our platform connects customers with a wide variety of high-quality products across various categories including electronics, fashion, home decor, and much more.
                    </p>
                    <p style="font-size: 1rem; color: #666;">
                        At E-System, we prioritize user experience and customer satisfaction. With a simple and intuitive interface, fast search functionality, and detailed product descriptions, we aim to make shopping easier than ever before. Whether you're browsing for the latest tech gadgets or seeking stylish fashion accessories, you'll find everything you need with just a few clicks.
                    </p>
                    <p style="font-size: 1rem; color: #666;">
                        Our mission is to offer not only a platform for shopping but a seamless, enjoyable experience that you can trust. With secure payment methods, fast and reliable shipping, and dedicated customer support, E-System is here to help you get the best deals with peace of mind.
                    </p>
                    <p style="font-size: 1rem; color: #666;">
                        We continuously strive to innovate and stay ahead of trends to ensure we bring the best products to our customers. Join us today and discover how E-System is transforming online shopping!
                    </p>
                    <a href="{{ route('product.index') }}" class="btn btn-primary mt-3 px-4">Start Shopping Now</a>
                </div>
            </div>
        </div>
    </section>





@endsection

@section('custom-script')
<script>
    // Custom scripts (if needed)
</script>
@endsection
