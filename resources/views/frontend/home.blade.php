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


    <!-- Hero Section -->
    <header class="hero text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Employee Management Software</h1>
            <p class="lead">Simplify staff management with an all-in-one solution for documentation, training, attendance, and more!</p>
            <a href="#features" class="btn btn-lg btn-custom mt-3">Explore Features</a>
        </div>
    </header>

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

    <section id="benefits" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Benefits & Features</h2>
            <div class="row gy-4">
                <!-- Benefit 1 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Easily Add & Remove Employees</h5>
                            <p class="card-text">Quickly update your database when you onboard a new starter or process a leaver.</p>
                        </div>
                    </div>
                </div>
                <!-- Benefit 2 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Employee Self-Service</h5>
                            <p class="card-text">Allow employees to access their own records, reducing admin time and effort.</p>
                        </div>
                    </div>
                </div>
                <!-- Benefit 3 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Full Audit Trail</h5>
                            <p class="card-text">Monitor and track all changes to your employee database for complete transparency.</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row gy-4 mt-3">
                <!-- Benefit 4 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Automatic Alerts</h5>
                            <p class="card-text">Receive notifications about training needs, service anniversaries, and more.</p>
                        </div>
                    </div>
                </div>
                <!-- Benefit 5 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Flexible File Notes</h5>
                            <p class="card-text">Easily update employee records with additional notes or relevant information.</p>
                        </div>
                    </div>
                </div>
                <!-- Benefit 6 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Secure HR Data</h5>
                            <p class="card-text">All data is securely stored and encrypted to ensure confidentiality and safety.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

{{-- // Faq --}}

<div class="container py-5">
    <h1 class="faq-header">Frequently Asked Questions</h1>

    <div id="accordion">
      <!-- FAQ 1 -->
      <div class="card faq-card">
        <div class="card-header faq-card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              What is HR management software?
            </button>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body faq-card-body">
            HR management software is designed to automate and simplify the management and recording of employee records and activities.
          </div>
        </div>
      </div>

      <!-- FAQ 2 -->
      <div class="container py-5">
        <!-- FAQ Title -->
        <h1 class="text-center mb-4">Frequently Asked Questions</h1>
    
        <!-- Accordion Container -->
        <div id="accordion">
          <!-- FAQ 1 -->
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  What are the main benefits of myhrtoolkit?
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                Myhrtoolkit is a simple-to-use, cloud HR software system that streamlines your essential HR tasks, saving you time, making staff management easier, and helping you to be more organized.
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
                Whatever your role, be it SME business owner, HR professional, office manager, or HR consultant, HR software provides a host of solutions to address your people management challenges.
              </div>
            </div>
          </div>
    
          <!-- FAQ 3 -->
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Am I locked into a contract?
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                It is a 30-day rolling contract, so it is in your control.
              </div>
            </div>
          </div>
    
          <!-- FAQ 4 -->
          <div class="card">
            <div class="card-header" id="headingFour">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  How easy is it to set up the software?
                </button>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
              <div class="card-body">
                The system is fairly simple to set up; the basic setup/going live can be achieved relatively quickly. A fully established myhrtoolkit account with all documents in the system will take longer depending on the availability of the documents online.
              </div>
            </div>
          </div>
        </div>
      </div>

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

</script>
@endsection
