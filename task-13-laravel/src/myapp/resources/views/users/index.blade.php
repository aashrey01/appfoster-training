@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center" style="font-weight: bold !important;">Users</div>
    <div class="card-body">
        <div class="mb-3">
            <a class="btn btn-success" href="{{ route('users.create') }}">Create New User</a>
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
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                <a class="btn btn-info" href="{{ route('users.projects.index', $user->id) }}">Projects</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

