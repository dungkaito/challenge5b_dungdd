@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-row mt-5">
        <div class="form-group col-md-2">
            <label for="#">Sinh viên:</label>
        </div>
        <div class="form-group col-md-10">
            <input value="{{ $assignment->student_name }}" readonly type="text" class="form-control" 
            name="title" required minlength="1">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="#">Mô tả:</label>
        </div>
        <div class="form-group col-md-10">
            <textarea readonly class="form-control" name="description" id="description" rows="10" 
            required minlength="1">{{ $assignment->description }}</textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="#">File đính kèm:</label>
        </div>
        <div class="form-group col-md-10">
            @if ($assignment->attachment_path != '')
                <a href="{{ url(route('assignment.download', ['assignment' => $assignment])) }}">Tải xuống</a>
            @else
                <span>Không có</span>
            @endif
        </div>
    </div>

</div>
@endsection