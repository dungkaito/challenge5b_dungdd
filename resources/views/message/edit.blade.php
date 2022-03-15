@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ url(route('message.update', ['message' => $message->id])) }}">
        @csrf
        @method('PUT')
        <div class="form-row mt-5">
            <div class="form-group col-md-2">
                <label for="content">Nội dung:</label>
            </div>
            <div class="form-group col-md-10">
                <input id="content" type="text" class="form-control" value="{{ $message->content }}" name="content" required minlength="1">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sửa tin nhắn</button>
    </form>
</div>
@endsection