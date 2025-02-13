@extends("layouts.default")

@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h4 class="border-bottom pb-2 mb-0">List of Tasks</h4>
        <h2>Task Details</h2>

        <p><strong>title:</strong> {{ $task->title }}</p>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Status:</strong> {{ $task->status ? 'Yes' : 'No' }}</p>

        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit Task</a>
    </div>
    
@endsection