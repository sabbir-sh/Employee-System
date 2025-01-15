@extends('Backend.layout.app')

@section('custom-style')
    <style>
        /* Custom styling can be added here */
    </style>
@endsection
@section('main-content')
<div class="container">
    <h1>Task List</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add New Task</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
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
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ ucfirst($task->status) }}</td>
                    <td>{{ $task->user->name ?? 'Unassigned' }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No tasks found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
