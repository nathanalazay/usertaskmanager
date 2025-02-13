@extends("layouts.default")

@section('content')
<div class="d-flex align-items-center">
    <div class="container card shadow-sm" style="max-width:500px;margin-top:100px;">
        <div class="fs-3 fw-bold text-center mt-3">Edit task</div>
        <form action="{{ url('task/update/' . $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3">
                <label for="name">Task Name</label>
                <input type="text" class="form-control" id="name" name="title" value="{{ old('title', $task->title) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="completed">Status</label>
                <select class="form-control" id="completed" name="completed">
                    <option value="1" {{ old('status', $task->status) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('status', $task->status) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Update Task</button>
            </div>
            
        </form>
    </div>     
</div>

</div> 
@endsection
