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

        .btn-success, .btn-secondary {
            border-radius: 8px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
@endsection

@section('main-content')
    <div class="container mt-5">
        <h2 class="text-center form-heading mb-4">Create New Task</h2>

        <!-- Create Task Form -->
        <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf

            <!-- Task Details Form -->
            <div class="row">
                <!-- Task Title Field -->
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Task Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter task title" required>
                </div>

                <!-- Task Status Field -->
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <!-- Task Description Field -->
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label">Task Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Provide a detailed description"></textarea>
                </div>

                <!-- Assign To Field -->
                <div class="col-md-6 mb-3">
                    <label for="assigned_to" class="form-label">Assign To</label>
                    <select name="assigned_to" id="assigned_to" class="form-select">
                        <option value="">Unassigned</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Save Task</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
