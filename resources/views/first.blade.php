<x-app-layout>
    @section('content')
        <audio id='audio' autoplay></audio>
        <script type="text/javascript">
            'use strict';
            var playlist = ['/storage/audio/wakeup.mp3', '/storage/audio/first.mp3']
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
            <img src="{{ asset('/storage/image/IMG_8924.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                【驚愕】人気アイドルグループ「アイヅ」、NASAとのコラボレーション決定！宇宙ステーションでのライブを計画
                世界中を虜にする圧倒的なパフォーマンスと、その魅力溢れる個性が話題のアイドルグループ「アイヅ」が、今度は新たなフィールドを目指すことが明らかとなりました。それはなんと、宇宙です。今回、「アイヅ」はNASAとのコラボレーションを発表し、国際宇宙ステーション（ISS）でのライブを計画していることを公表しました。
                一般的にアイドルの活動と言えば、音楽番組やライブ会場、テレビ出演など地上での活動が主です。しかし、「アイヅ」はこれまでも常に新しい挑戦を続けてきた彼ららしく、今回、地球を超えて宇宙を舞台にその活動を広げることを決意したのです。
                具体的な計画としては、NASAの協力のもと、特別訓練を受けたメンバーがISSに滞在し、そこでライブを開催するというもの。さらに、その模様を地上のファンに向けてライブストリーミングする予定だとか。地球から約400キロメートルもの距離を超えて、彼らの歌声が届くと思うと、ただただ感動するばかりです。
                このニュースは、ファンをはじめ、業界からも大きな驚きと共に、期待の声が上がっています。「アイヅ」の新たな挑戦を、私たちはただ見守ることしかできません。しかし、彼らが宇宙で輝く姿を想像するだけで胸が高鳴ります。果たして、「アイヅ」は地球を越えて、宇宙でどのようなパフォーマンスを見せてくれるのでしょうか。その日を心待ちにしています。
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
