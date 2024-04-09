@extends('layouts.app')

@section('content')
<div class="card" style="background-color:rgba(255, 255, 255, 0.95)">
    <div class="card-header" style="color: black; background-color: #a0a6a6;">Create New User</div>
    <div class="card-body" style="margin-top: 20px;">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-1 col-form-label" style="font-size: 20px">Name:</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="form-group row" style="margin-bottom: 20px">
                <label for="email" class="col-sm-1 col-form-label" style="font-size: 20px">Email:</label>
                <div class="col-sm-11">
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="form-group row" style="margin-bottom: 20px">
                <label for="password" class="col-sm-1 col-form-label" style="font-size: 20px">Password:</label>
                <div class="col-sm-11">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="modal-footer" style="background-color:#a0a6a6;">
                <div class="mb-3 d-inline-block" style="text-align: center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

