@extends('layouts.app')

@section('content')
<div class="card" style="background-color: rgba(255, 255, 255, 0.95);">
    <div class="card-header" style="color: black; background-color:#a0a6a6;">User Details</div>
    <div class="card-body" style="padding:15px;">
        <div class="form-group">
            <label for="name" style="color: black">Name: {{ $user->name }}</label>
        </div>
        <div class="form-group">
            <label for="email" style="color: black">Email: {{ $user->email }}</label>
        </div>
    </div>
    <div class="modal-footer" style="background-color:#a0a6a6;">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    </div>
</div>
@endsection
