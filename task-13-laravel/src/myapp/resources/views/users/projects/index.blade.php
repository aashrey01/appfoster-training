@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center" style="font-weight: bold !important;">Projects</div>
    <div class="card-body">

        <div class="mb-3 d-inline-block">
            <button class="btn btn-success ml-2" onclick="createProjectModal()">Create New Project</button>
            <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
        </div>
        

        <div id="createProjectModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="createProjectModalLabel" aria-hidden="true">
            
        </div>
        
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td style="display: flex; gap: 5px;">
                                                      
                            <button class="btn btn-primary" onclick="editProjectModal({{ $project->id }})">Edit</button>


                            <form action="{{ route('users.projects.delete', ['userId' => $user->id, 'projectId' => $project->id]) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                            </form>

                            <div id="editProjectModal_{{ $project->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel" aria-hidden="true">
                               
                            </div>
                            
                            
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function editProjectModal(projectId) {
        $('#editProjectModal_' + projectId).load('{{ route("users.projects.edit", ["userId" => $user->id, "projectId" => ":id"]) }}'.replace(':id', projectId)).modal('show');
    }
</script>

<script>
    function createProjectModal() {
        $('#createProjectModal').load('{{ route("users.projects.create", ["userId" => $user->id]) }}').modal('show');
    }
</script>



@endsection
