@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            
            <div class="col-md-4 mt-5">
                <img id="img" class="rounded img-fluid" alt="avatar" src="{{ url(asset(Auth::user()->avatar_path)) }}">

                <input type="file" class="form-control-file" accept="image/*" id="file" name="avatar" onchange="loadFile(event)" style="display: none;">
                
                <label class="btn btn-primary btn-sm d-flex justify-content-center" for="file" style="cursor: pointer;">Tải lên ảnh đại diện</label>
            </div>
            
            <div class="col-md-8 mt-5">

                <div class="form-row">
                    <div class="form-group col-md-2 pt-2">
                        <label for="username">Tài khoản:</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input {{ Auth::user()->role=='Sinh viên' ? 'readonly' : 'autofocus' }} type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ Auth::user()->username }}">

                        @error('username')  
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2 pt-2">
                        <label for="name">{{ Auth::user()->role }}:</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input {{ Auth::user()->role=='Sinh viên' ? 'readonly' : '' }} type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2 pt-2">
                        <label for="email">Email:</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input {{ Auth::user()->role=='Sinh viên' ? 'autofocus' : '' }} type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2 pt-2">
                        <label for="phone">Số điện thoại:</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ Auth::user()->phone }}">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2 pt-2">
                        <label for="password">Mật khẩu mới:</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Để trống nếu không thay đổi">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="password-confirm">Nhập lại mật khẩu mới:</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Để trống nếu không thay đổi">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>

        </div>
    </form>
</div>
<script>
    function loadFile(event) {
        var image = document.getElementById('img');
        image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
