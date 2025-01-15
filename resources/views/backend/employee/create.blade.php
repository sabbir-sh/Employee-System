@extends('Backend.layout.app')

@section('custom-style')
    <style>
        /* Add any custom styles for the add page if needed */
    </style>
@endsection

@section('main-content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add New Employee</h2>

        <!-- Form to Add Employee -->
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" name="position" id="position" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" name="salary" id="salary" class="form-control" step="0.01" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Add Employee</button>
                <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
