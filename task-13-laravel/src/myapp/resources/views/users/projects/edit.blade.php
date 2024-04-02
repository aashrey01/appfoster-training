@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Project</div>
    <div class="card-body">
        <form action="{{ route('users.projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $project->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-secondary" href="{{ route('projects.index') }}">Cancel</a>
        </form>
    </div>
</div>
@endsection
