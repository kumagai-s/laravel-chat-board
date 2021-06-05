@extends('chat.base')

@section('content')
    <div class="chat-container row justify-content-center">
        <div class="chat-area">
            <div class="card">
                <div class="card-header">Comment</div>
                <div class="card-body chat-card" id="comment-box">
                    <div id="comment-data">
                        @foreach ($comments as $item)
                            @include('chat.components.comment', ['item' => $item])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
        <input class="form-control" id="comment" type="text" name="comment" placeholder="push massage (shift + Enter)"
                  aria-label="With textarea"
                  onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};">
            <button type="button" id="submit" class="btn btn-outline-primary comment-btn">Submit</button>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/chat/script.js') }}"></script>
@endsection
