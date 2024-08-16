@extends('layouts.app')
@section('content')

<!-- マイページ -->
    <div class="text-right"><a href="{{ route('users.index') }}">マイページ</a></div>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-11 col-xl-7">
            
            <!-- 検索 -->
            <form class="row" action="{{ route('posts.search') }}" method="POST">
            @csrf
                <!-- エピソード検索 -->
                <div class="col">
                    <input class="form-control form-control-lg" type="text" name="keyword" value="{{ $keyword }}" placeholder="キーワード" >
                </div>
                <!-- ユーザー検索 -->
                <div class="col">
                    <input class="form-control form-control-lg" type="text" name="account" value="{{ $account }}" placeholder="ユーザー名" >
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
            <!-- Post preview-->
            <div class="post-preview">
                    <h5 class="post-episode">{{ $post['episode'] }}</h5>
                    @if(!empty($post['image']))
                    <img src="{{ asset('img/' . $post['id'] . '/' . $post['image']) }}" hight=200 width=200>
                    @endif
                <p class="post-meta">
                    <a href="{{ route('posts.show',['post'=>$post['id']]) }}">詳細へ</a>
                </p>
            </div>
            <hr class="my-4" />
            @endforeach
            

        </div>
    </div>
 </div>

@endsection