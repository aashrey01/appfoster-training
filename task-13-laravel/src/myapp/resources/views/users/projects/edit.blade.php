@extends('layouts.app')

@section('content')
<div class="card" style="background-color:rgba(255, 255, 255, 0.95)">
    <div class="card-header" style="color: black; background-color: #a0a6a6;">Edit Project</div>
    <div class="card-body" style="margin-top: 20px;">
        
        <form action="{{ route('users.projects.update', ['userId' => $user->id, 'projectId' => $project->id]) }}" method="POST">
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
            

            <div class="modal-footer" style="background-color:#a0a6a6;">
                <div class="mb-3 d-inline-block" style="text-align: center">
                    <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-secondary" href="{{ route('users.projects.index', $user->id) }}">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection

