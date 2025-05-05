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
@include('frontend.layout.header')
<div class="container">
    <h2 class="mb-4 text-center">All Products</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100 shadow-lg border-0 rounded-3 overflow-hidden">
                    <a href="{{ route('product.index', $product->slug) }}" class="text-decoration-none">
                        <div class="ratio ratio-1x1">
                            <img src="{{ asset('storage/' . $product->thumbnail_img) }}"
                                 class="card-img-top object-fit-cover rounded-3"
                                 alt="{{ $product->name }}">
                        </div>
                    </a>
                    <div class="card-body px-3 py-10 d-flex flex-column justify-content-between">
                        <h5 class="card-title text-truncate mb-2">{{ $product->name }}</h5>

                        @php
                            $originalPrice = $product->price;
                            $discount = $product->discount ?? 0;
                            $discountedPrice = $originalPrice - ($originalPrice * $discount / 100);
                        @endphp

                        <div class="product-price fw-bold mb-2">
                            @if($discount > 0)
                                <span class="text-danger">৳ {{ number_format($discountedPrice, 0) }}</span>
                                <del class="text-muted ms-2">৳ {{ number_format($originalPrice, 0) }}</del>
                                <span class="badge bg-success ms-2">{{ $discount }}% OFF</span>
                            @else
                                <span class="text-success">৳ {{ number_format($originalPrice, 0) }}</span>
                            @endif
                        </div>

                        <div class="product-rating mb-3">
                            <span style="color: #FFD700;"> {{-- Gold color --}}
                                @for($i = 1; $i <= 5; $i++)
                                    @if($product->rating >= $i)
                                        <i class="fa-solid fa-star"></i>
                                    @else
                                        <i class="fa-regular fa-star"></i>
                                    @endif
                                @endfor
                            </span>
                        </div>

                        <a href="#" class="btn btn-primary w-100 mt-auto">Add to Cart</a>
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
