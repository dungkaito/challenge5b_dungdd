@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-row mt-5">
        <div class="form-group col-md-2">
            <label for="#">Tiêu đề:</label>
        </div>
        <div class="form-group col-md-10">
            <input value="{{ $classwork->title }}" readonly type="text" class="form-control" name="title" required minlength="1">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="#">Mô tả:</label>
        </div>
        <div class="form-group col-md-10">
            <textarea readonly class="form-control" name="description" id="description" rows="10" required minlength="1">{{ $classwork->description }}</textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="#">File đính kèm:</label>
        </div>

        <div class="form-group col-md-10">
            @if ($classwork->attachment_path != '')
                <a href="{{ url(route('classwork.download', ['classwork' => $classwork])) }}">Tải xuống</a>
            @else
                <span>Không có</span>
            @endif
        </div>

    </div>

    @if (Auth::user()->role == 'Sinh viên')
        <h2>Nộp bài</h2>
        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="classwork_id" value="{{ $classwork->id }}">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="#">Mô tả:</label>
                </div>
                <div class="form-group col-md-10">
                    <textarea class="form-control" name="description" id="description" rows="3" required minlength="1"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="#">File đính kèm:</label>
                </div>
                <div class="form-group col-md-10">
                    <input type="file" class="form-control-file" name="file">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Nộp bài tập</button>
        </form>
    @endif

    @if (isset($error))
        <br>
        <p style="text-align: center; font-size: 40px">{{ $error }}</p>
    @endif

    @if (Auth::user()->role == 'Giáo viên')
        <div class="row">
            <div class="col-6">
                <h3>Danh sách bài nộp</h3>
            </div>
            <div class="col-6 text-right pr-4">

            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sinh viên</th>
                        <th scope="col">Ngày nộp</th>
                        <th scope="col" style="width:1%;"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($assignments as $a)

                        <tr>

                            <th scope="row">{{ $count++ }}</th>
                            <td>{{ $a->student_name }}</td>
                            <td>{{ $a->date }}</td>
                            <td><a href="#" class="btn btn-info btn-sm" style="white-space: nowrap">Xem chi tiết</a></td>

                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection