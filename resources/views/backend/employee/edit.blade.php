@extends('Backend.layout.app')

@section('custom-style')
    <style>
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
        .profile-picture {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
@endsection

@section('main-content')
    <div class="container mt-5">
        <h2 class="text-center form-heading mb-4">Edit Employee</h2>

        <!-- Edit Employee Form -->
        <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            @method('PUT')

            <!-- Employee Details Form -->
            <div class="row">
                <!-- Name Field -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $employee->name) }}" required>
                </div>

                <!-- Department Field -->
                <div class="col-md-6 mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" name="department" id="department" class="form-control" value="{{ old('department', $employee->department) }}" required>
                </div>

                <!-- Email Field -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $employee->email) }}" required>
                </div>
            </div>

            <div class="row">
                <!-- Position Field -->
                <div class="col-md-6 mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $employee->position) }}" required>
                </div>

                <!-- Profile Picture Field -->
                <div class="col-md-6 mb-3">
                    <label for="profile_picture" class="form-label">Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                    @if($employee->profile_picture)
                        <img src="{{ asset('images/' . $employee->profile_picture) }}" alt="Profile Picture" class="profile-picture">
                    @endif
                </div>

                <!-- Salary Field -->
                <div class="col-md-6 mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number" name="salary" id="salary" class="form-control" value="{{ old('salary', $employee->salary) }}" step="0.01" required>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update Employee</button>
                <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
