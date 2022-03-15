@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-6">
            <h3>Trò chơi câu đố</h3>
        </div>
        <div class="col-6 text-right pr-4">
            @if (Auth::user()->role == 'Giáo viên')
                <a href="{{ url(route('challenge.create')) }}" class="btn btn-primary btn-sm" 
                role="button">Thêm câu đố</a>
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
                @foreach ($challenges as $c)

                    <tr>

                        <th scope="row"><?= $count++; ?></th>
                        <td>{{ $c->title }}</td>
                        <td>{{ $c->created_at }}</td>

                        @if (Auth::user()->role == 'Sinh viên')
                            <td><a href="{{ url(route('challenge.show', ['challenge' => $c->id])) }}" 
                                class="btn btn-info btn-sm" style="white-space: nowrap">Chơi</a></td>
                        @endif

                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection