@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h3>Giáo viên</h3>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col" style="width:1%;"></th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1 @endphp
                @foreach ($users as $user)
                    @if ($user->role == 'Giáo viên')

                        <tr>
                            <th scope="row">{{ $count++ }}</th>
                            <td>{{ $user->name }}</td>

                            @if ($user->id != Auth::id())
                                <td><a href="{{ url(route('user.show', ['user' => $user])) }}" class="btn btn-info btn-sm" style="white-space: nowrap">Xem thông tin</a></td>
                            @endif

                        </tr>
                        
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <br>
    <div class="row">
        <div class="col-6">
            <h3>Sinh viên</h3>
        </div>
        <div class="col-6 text-right pr-4">
            @if (Auth::user()->role == 'Giáo viên')
                
                <a href="{{ url(route('user.create')) }}" class="btn btn-primary btn-sm" role="button">Thêm sinh viên</a>
                
            @endif
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col" style="width:1%;"></th>

                    @if (Auth::user()->role == 'Giáo viên')
                        <th scope="col" style="width:1%;"></th>
                        <th scope="col" style="width:1%;"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php $count = 1 @endphp
                @foreach ($users as $user)
                    @if ($user->role == 'Sinh viên')

                        <tr>
                            <th scope="row">{{ $count++ }}</th>
                            <td>{{ $user->name }}</td>

                            @if ($user->id != Auth::id())
                                <td><a href="{{ url(route('user.show', ['user' => $user])) }}" class="btn btn-info btn-sm" style="white-space: nowrap">Xem thông tin</a></td>

                                @if (Auth::user()->role == 'Giáo viên')
                                    <td><a href="{{ url(route('user.edit', ['user' => $user])) }}" class="btn btn-warning btn-sm" style="white-space: nowrap">Sửa thông tin</a></td>
                                    <td>
                                        <form method="POST" action="{{ url(route('user.destroy', ['user' => $user])) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark btn-sm" style="white-space: nowrap">Xoá sinh viên</button>
                                        </form>
                                    </td>
                                @endif

                            @endif

                        </tr>
                        
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
