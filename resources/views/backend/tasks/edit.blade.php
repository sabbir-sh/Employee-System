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
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="text-center">Edit Task</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Task Title -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="title" class="form-label">Task Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" placeholder="Enter task title" required>
                        </div>
                    </div>

                    <!-- Task Description -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Task Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Provide a detailed description">{{ $task->description }}</textarea>
                        </div>
                    </div>

                    <!-- Task Status -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <!-- Assign To -->
                        <div class="col-md-6 mb-3">
                            <label for="assigned_to" class="form-label">Assign To</label>
                            <select class="form-select" id="assigned_to" name="assigned_to">
                                <option value="">Unassigned</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update Task</button>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
