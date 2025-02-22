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
    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Key Features</h2>
            <div class="row gy-4">
                <!-- Feature 1 -->
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <img src="https://via.placeholder.com/80" alt="Document Management" class="mb-3">
                        <h5>Staff Documentation</h5>
                        <p>Keep all staff-related documents like work visas, permits, holiday requests, and appraisals safe and accessible.</p>
                        <a href="#" class="btn btn-sm btn-custom mt-2">More about document management</a>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <img src="https://via.placeholder.com/80" alt="Training Management" class="mb-3">
                        <h5>Development & Training</h5>
                        <p>Receive reminders for renewing training or scheduling appraisals to meet staff requirements efficiently.</p>
                        <a href="#" class="btn btn-sm btn-custom mt-2">More about training management</a>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <img src="https://via.placeholder.com/80" alt="Holiday Management" class="mb-3">
                        <h5>Holiday & Attendance</h5>
                        <p>Monitor attendance and absences to identify concerns and maintain optimal staffing levels.</p>
                        <a href="#" class="btn btn-sm btn-custom mt-2">More about holiday management</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <h1 class="faq-header text-center mb-5">Frequently Asked Questions</h1>

            <div id="accordion">
                <!-- FAQ 1 -->
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What is HR management software?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            HR management software is designed to automate and simplify the management and recording of employee records and activities.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Is this HR software system right for me?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Whether you're an SME business owner, HR professional, or office manager, HR software offers solutions to address your people management challenges.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="mb-4">Ready to streamline your staff management?</h2>
            <a href="#" class="btn btn-lg btn-custom">Get Started Now</a>
        </div>
    </section>

@endsection

@section('custom-script')
<script>
    // Custom scripts (if needed)
</script>
@endsection
