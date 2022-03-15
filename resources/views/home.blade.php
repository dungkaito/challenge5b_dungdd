@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mt-5">
            <img id="img" class="rounded img-fluid" alt="avatar" src="{{ URL::asset(Auth::user()->avatar_path) }}">
        </div>
        <div class="col-md-8 mt-5">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="#">Tài khoản:</label>
                </div>
                <div class="form-group col-md-6">
                    <input disabled type="text" class="form-control" value="{{ Auth::user()->username }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="#">{{ Auth::user()->role }}:</label>
                </div>
                <div class="form-group col-md-6">
                    <input disabled type="text" class="form-control" value="{{ Auth::user()->name }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="#">Email:</label>
                </div>
                <div class="form-group col-md-6">
                    <input disabled type="text" class="form-control" value="{{ Auth::user()->email }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="#">Số điện thoại:</label>
                </div>
                <div class="form-group col-md-6">
                    <input disabled type="text" class="form-control" value="{{ Auth::user()->phone }}">
                </div>
            </div>
            <a href="{{ route('edit') }}" class="btn btn-primary">Cập nhật thông tin</a>
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
