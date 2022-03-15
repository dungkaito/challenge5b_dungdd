@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-6">
            <h3>Danh sách bài tập</h3>
        </div>
        <div class="col-6 text-right pr-4">
            @if (Auth::user()->role == 'Giáo viên')
                
                <a href="{{ url(route('classwork.create')) }}" class="btn btn-primary btn-sm" role="button">Thêm bài tập</a>

            @endif
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Ngày đăng</th>
                    <th scope="col" style="width:1%;"></th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach ($classworks as $cw)
                    <tr>

                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $cw->title }}</td>
                        <td>{{ $cw->created_at }}</td>
                        <td><a href="{{ url(route('classwork.show', ['classwork' => $cw->id])) }}" class="btn btn-info btn-sm" style="white-space: nowrap">Xem chi tiết</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection