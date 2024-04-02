@extends('layouts.app')

@section('content')
<div class="card">

    <div class="card-header">User Details</div>
    <div class="card-body" style="padding:15px;">
        
        <div class="form-group">
            <label for="name">Name: {{ $user->name }}</label>
           
        </div>
        <div class="form-group">
            <label for="email">Email: {{ $user->email }}</label>

        </div>
    </div>
    <div class="mb-3 d-inline-block" style="text-align: center">
        <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
    </div>
</div>
@endsection
