@extends('layouts.app')

@section('content')
<div class="container">    
    <form method="POST" action="{{ url(route('classwork.store')) }}" enctype="multipart/form-data">
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
                <label for="#">Mô tả:</label>
            </div>
            <div class="form-group col-md-10">
                <textarea class="form-control" name="description" id="description" rows="10" required minlength="1"></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="#">File đính kèm:</label>
            </div>
            <div class="form-group col-md-10">
                <input type="file" class="form-control-file" name="attachment">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm bài tập</button>
    </form>
    <?php
    if (isset($status)) {
        echo '<br>';
        echo '<p style="text-align: center; font-size: 40px">' . $status . '</p>';
    }
    ?>
</div>
@endsection