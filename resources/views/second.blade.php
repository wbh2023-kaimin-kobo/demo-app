<x-app-layout>
    @section('content')
        <audio id='audio' autoplay></audio>
        <script type="text/javascript">
            'use strict';
            var playlist = ['/storage/audio/wakeup.mp3', '/storage/audio/second.mp3']
            var audio = document.createElement('audio');
            document.body.appendChild(audio);
            audio.volume = 0.5;
            audio.src = playlist[0];
            audio.play();
            // イベントendedは下記コメント参照
            var index = 0;
            audio.addEventListener('ended', function() {
                index++;
                if (index < playlist.length) {
                    audio.src = playlist[index];
                    audio.play();

                } else {
                    audio.src = playlist[0];
                    audio.play();
                    index = 0;
                }

            });
        </script>
        <h2>News <span class="badge bg-secondary">Fake</span></h2>
        <div class="card">
            <div class="card-body">
                【速報】自動車業界に衝撃、ワンタッチで変形可能な新型車登場
                著名自動車メーカー「Fusion Motors」が、ワンタッチで2つの異なる形状に変形可能な画期的な新型車「Transform
                One」を発表。一般のセダン形状からスポーツカー形状に一瞬で変身可能で、業界内外から注目が集まっています。航空宇宙技術を活用し、2023年に発売予定です。
            </div>
        </div>
        <h2>Comments</h2>
        <form action="{{ route('comment.create') }}" method="post">
            @csrf
            <input type="text" class="form-control" id="comment" name="comment">
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
        <div class="card">
            <div class="card-body">
                comment<br> by username<br> at created_at
            </div>
        </div>
    @endsection
</x-app-layout>
