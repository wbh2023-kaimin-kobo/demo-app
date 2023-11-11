<x-app-layout>
    @section('content')
        <audio src="{{ asset('/storage/audio/' . 'wakeup.mp3') }}" autoplay></audio>
        <h2>News <span class="badge bg-secondary">Fake</span></h2>
        <div class="card">
            <div class="card-body">
                {{ $news->content }}
            </div>
        </div>
        <h2>Comments</h2>
        <form action="{{ route('comment.create') }}" method="post">
            @csrf
            <input type="hidden" name="newsId" value="{{ $news->id }}">
            <input type="text" class="form-control" id="comment" name="comment">
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
        @foreach ($comments as $comment)
            <div class="card">
                <div class="card-body">
                    {{ $comment->content }}<br> by {{ $comment->user->name }}<br> at {{ $comment->created_at }}
                </div>
            </div>
        @endforeach
    @endsection
</x-app-layout>
