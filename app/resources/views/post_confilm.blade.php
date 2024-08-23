@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">新規投稿確認</h2>
        </div>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- エピソード -->
                        <h4>エピソード</h4>
                        <input class="form-control" name="episode" id="name" value="{{ $request['episode'] }}" type="hidden"> <!-- DBに挿入するために、hiddenでインプット内容を保持 -->
                        <h5 class="post-episode">{{ $request['episode'] }}</h5>  <!-- 入力した値を表示 -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- 画像 -->
                        <h4>画像</h4>
                        @if($image)
                        <input type="hidden" name="image" value="{{ $newImageName }}">
                        <img src="{{ $image }}" height=200 width=200>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <!-- 投稿ボタン -->
                <input type="submit" value="投稿" class="btn btn-primary btn-lg ml-3">
                <a href="{{ route('posts.create') }}" class="btn-primary btn-lg ml-3">戻る</a>
            </div>
        </form>
    </div>
</section>

@endsection