@extends('Backend.layout.app')

@section('custom-style')
    <style>

    </style>
@endsection
@section('main-content')
    <div class="container mt-5">
        <h1 class="text-center">Employee List</h1>
        <a href="{{ route('employee.create') }}" class="btn btn-primary mb-3">Add New Employee</a>

        <!-- Check if employees exist -->
        @if ($employees->isEmpty())
            <div class="alert alert-warning">No employees found.</div>
        @else
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Salary</th> <!-- New Salary Column -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>৳ {{ number_format($employee->salary, 2) }}</td>

                            <td>
                                {{-- <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-info btn-sm">View</a> --}}
                                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>


@endsection
