@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mt-5">
            <img id="img" class="rounded img-fluid" alt="avatar" src="{{ url(asset($user->avatar_path)) }}">
        </div>
        <div class="col-md-8 mt-5">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="#">Tài khoản:</label>
                </div>
                <div class="form-group col-md-6">
                    <input disabled type="text" class="form-control" value="{{ $user->username }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="#">{{ $user->role }}:</label>
                </div>
                <div class="form-group col-md-6">
                    <input disabled type="text" class="form-control" value="{{ $user->name }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="#">Email:</label>
                </div>
                <div class="form-group col-md-6">
                    <input disabled type="email" class="form-control" value="{{ $user->email }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="#">Số điện thoại:</label>
                </div>
                <div class="form-group col-md-6">
                    <input disabled type="text" class="form-control" value="{{ $user->phone }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
