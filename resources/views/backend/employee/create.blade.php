@extends('Backend.layout.app')

@section('custom-style')
    <style>
        /* Custom styling for the form */
        .form-container {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .form-heading {
            color: #007bff;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-primary, .btn-secondary {
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
@endsection

@section('main-content')
    <div class="container mt-5">
        <h2 class="text-center form-heading mb-4">Add New Employee</h2>

        <!-- Form to Add Employee -->
        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf

            <!-- Employee Details Form -->
            <div class="row">
                <!-- Name Field -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <!-- Department Field -->
                <div class="col-md-6 mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" name="department" id="department" class="form-control" required>
                </div>

                <!-- Email Field -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <!-- Position Field -->
                <div class="col-md-6 mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" name="position" id="position" class="form-control" required>
                </div>

                <!-- Profile Picture Field -->
                <div class="col-md-6 mb-3">
                    <label for="profile_picture" class="form-label">Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                </div>

                <!-- Salary Field -->
                <div class="col-md-6 mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number" name="salary" id="salary" class="form-control" step="0.01" required>
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Add Employee</button>
                <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
