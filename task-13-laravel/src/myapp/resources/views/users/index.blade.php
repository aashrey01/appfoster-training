@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center" style="font-weight: bold !important;">Users</div>
    <div class="card-body">

        <div class="mb-3">
            <button class="btn btn-success" onclick="createUserModal()">Create New User</button>
        
            <div id="createUserModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
                
            </div>
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
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="display: flex; gap: 5px;">
                            
                            <button class="btn btn-info" onclick="showUserModal({{ $user->id }})">Show</button>

                            <button class="btn btn-primary" onclick="editUserModal({{ $user->id }})">Edit</button>
                        
                            
                            <a class="btn btn-success" href="{{ route('users.projects.index', $user->id) }}">Projects</a>
                        
                            
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        
                            
                            <div id="showUserModal_{{ $user->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="showUserModalLabel" aria-hidden="true">
                                
                            </div>

                            <div id="editUserModal_{{ $user->id }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                
                            </div>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script>
    function showUserModal(userId) {
        $('#showUserModal_' + userId).load('{{ route("users.show", ":id") }}'.replace(':id', userId)).modal('show');
    }

</script>

<script>
    function editUserModal(userId) {
        $('#editUserModal_' + userId).load('{{ route("users.edit", ":id") }}'.replace(':id', userId)).modal('show');
    }
</script>

<script>
    function createUserModal() {
        $('#createUserModal').load('{{ route("users.create") }}').modal('show');
    }
</script>

@endsection

