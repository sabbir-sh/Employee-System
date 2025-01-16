@extends('Backend.layout.app')

@section('custom-style')
    <style>
        /* Custom styling can be added here */
    </style>
@endsection

@section('main-content')
    <div class="container mt-2">
        <h1 class="text-center">Employee List</h1>
        <a href="{{ route('employee.create') }}" class="btn btn-primary mb-4">Add New Employee</a>

        <!-- Check if employees exist -->
        @if ($employees->isEmpty())
            <div class="alert alert-warning">No employees found.</div>
        @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile Picture</th> <!-- Added Profile Picture Column -->
                        <th>Position</th>
                        <th>Department</th> <!-- Added Department Column -->
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td class="text-center">{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>

                            <!-- Display the Profile Picture -->
                            <td class="text-center">
                                @if ($employee->profile_picture)
                                    <img src="{{ asset('images/' . $employee->profile_picture) }}" alt="Profile Picture" width="50" height="50">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>

                            <td>{{ $employee->position }}</td>
                            <td>{{ $employee->department }}</td> <!-- Display the Department -->
                            <td>৳ {{ number_format($employee->salary, 2) }}</td>

                            <td class="text-center">
                                <!-- Edit Button -->
                                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>

                                <!-- View Button (Optional) -->
                                {{-- <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-info btn-sm text-white" title="View">
                                    <i class="fa-regular fa-eye"></i>
                                </a> --}}

                                <!-- Delete Button -->
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this employee?')"
                                        title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif
    </div>
@endsection
