<x-app-layout>
    @section('content')
        <form action="{{ route('wakeup.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="wakeup-time" class="form-label">起床予定</label>
                <input type="time" class="form-control" id="wakeup-time">
            </div>
            <div class="mb-3">
                <label for="keyword" class="form-label">キーワード</label>
                <input type="text" class="form-control" id="keyword" name="keyword">
            </div>
            <button type="submit" class="btn btn-primary w-100">おやすみなさい <i class="bi bi-moon-fill"></i></button>
        </form>
        <br>
        <a href={{ route('demo.first') }} class="btn btn-primary">Demo1</a>
        <a href={{ route('demo.second') }} class="btn btn-primary">Demo2</a>
    @endsection
</x-app-layout>
