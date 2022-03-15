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
            <form method="POST" action="{{ url(route('message.store')) }}">
                @csrf
                <div class="form-group pt-4 mb-2">
                    <input type="hidden" name='sender_id' id="sender_id" value='{{ Auth::id() }}'>
                    <input type="hidden" name='receiver_id' id="receiver_id" value='{{ $user->id }}'>
                    <input type="text" class="form-control" name='content' id="content" placeholder="Nhập tin nhắn" required minlength="1">
                </div>
                <button type="submit" class="btn btn-primary">Trò chuyện</button>
            </form>
        </div>
    </div>
</div>
@endsection
