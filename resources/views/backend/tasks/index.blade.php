@extends('Backend.layout.app')

@section('custom-style')
    <style>
        /* Custom styling can be added here */
    </style>
@endsection
@section('main-content')
<div class="container mt-2">
    <h1 class="text-center">Task List</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-4">Add New Task</a>

    <!-- Check if success message exists -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Check if tasks exist -->
    @if($tasks->isEmpty())
        <div class="alert alert-warning">No tasks found.</div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Assigned To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td class="text-center">{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td class="text-center">{{ ucfirst($task->status) }}</td>
                        <td class="text-center">{{ $task->user->name ?? 'Unassigned' }}</td>
                        <td class="text-center">
                            <!-- Edit Button -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this task?')" title="Delete">
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
