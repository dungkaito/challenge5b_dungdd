@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action="{{ url(route('challenge.store')) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row mt-5">
            <div class="form-group col-md-2">
                <label for="#">Tiêu đề:</label>
            </div>
            <div class="form-group col-md-10">
                <input type="text" class="form-control" name="title" required minlength="1">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="#">Gợi ý:</label>
            </div>
            <div class="form-group col-md-10">
                <input type="text" class="form-control" name="hint" required minlength="1">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="#">File chứa bài thơ, văn...:</label>
            </div>
            <div class="form-group col-md-10">
                <input type="file" class="form-control-file" name="attachment">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm câu đố</button>
    </form>
    <?php
    if (isset($error)) {
        echo '<br>';
        echo '<p style="text-align: center; font-size: 40px">' . $error . '</p>';
    }
    ?>
</div>
@endsection