@foreach ($messages as $m)
    @if ($m->sender_id == Auth::id())

        <div class="border border-primary" style="width: fit-content; margin-left: auto;">
            <p class="mb-0">{{ $m->created_at }}</p>
            <div class="d-flex" style="width: fit-content; margin-left: auto;">

                <a href="{{ url(route('message.edit', ['message' => $m->id ])) }}" class="pr-1">Sửa</a>

                <form id="deleteForm{{ $m->id }}" method="POST" action="{{ url(route('message.destroy', ['message' => $m->id ])) }}">
                    @csrf
                    @method('DELETE')
                    <a href="javascript:$('#deleteForm{{ $m->id }}').submit();">Xoá</a>
                </form>

            </div>
            <b>{{ $m->content }}</b>
        </div>
        
    @else

        <div class="border border-primary" style="width: fit-content;">
            <p class="mb-0">{{ $m->created_at }}</p>
            <b>{{ $m->content }}</b>
        </div>

    @endif    
@endforeach

@php
    foreach ($messages as $m) {
        if ($m->sender_id == Auth::id()) {
            $receiver_id = $m->receiver_id;
            break;
        }
    }
@endphp

<form method="POST" action="{{ url(route('message.store')) }}">
    @csrf
    <div class="form-group pt-4 mb-2">
        <input type="hidden" name='sender_id' id="sender_id" value='{{ Auth::id() }}'>
        <input type="hidden" name='receiver_id' id="receiver_id" value='{{ $receiver_id }}'>
        <input type="text" class="form-control" name='content' id="content" placeholder="Nhập tin nhắn" required minlength="1">
    </div>
    <button type="submit" class="btn btn-primary">Gửi</button>
</form>
