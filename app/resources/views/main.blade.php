@extends('layouts.app')
@section('content')

<!-- マイページ -->
    <div class="text-right"><a href="{{ route('users.index') }}" class="btn-primary btn-lg disabled">マイページ</a></div>

<!-- Main Content-->
<div class="row justify-content-center">
    <div class="col-md-10 col-lg-11 col-xl-7">

    <!-- 検索 -->
        <form class="row" action="{{ route('posts.search') }}" method="POST">
        @csrf
            <!-- エピソード ユーザー検索 -->
            <div class="col">
                <input class="form-control form-control-lg" type="text" name="keyword" value="{{ $keyword }}" placeholder="キーワード / ユーザー" >
            </div>
            <!-- 投稿日検索 -->
            <div class="col">
                <input class="form-control form-control-lg" type="date" name="date" value="{{ $date }}" >
            </div>
            <!-- 検索ボタン -->
            <input class="btn btn-primary btn-lg disabled" type="submit" value="検索">
        </form>
        

        <!-- 線 -->
        <hr class="my-4" />

        @foreach($posts as $post)
        <!-- 投稿 -->
        <div class="post-preview">
            <!-- アカウント 日付 -->
            <div class="row">
                <h6>{{ $post['user']['name'] }}</h6>
                <h6>　/　</h6>
                <h6>{{ $post['created_at'] }}</h6>
            </div>   
            <!-- エピソード -->
            <h5 class="post-episode">{{ $post['episode'] }}</h5>
            <!-- 画像 -->
            @if(!empty($post['image']))
            <img src="{{ asset('img/' . $post['id'] . '/' . $post['image']) }}" hight=150 width=150>
            @endif
            <p class="post-meta">
                <a href="{{ route('posts.show',['post'=>$post['id']]) }}">詳細へ</a>
            </p>
        </div>
        <hr class="my-4" />
        @endforeach
        

    </div>
</div>

@endsection