@extends('layouts.app')
@section('content')

<!-- マイページ -->
    <div class="text-right"><a href="{{ route('users.index') }}">マイページ</a></div>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-11 col-xl-7">
            
            <!-- 検索 -->
                <!-- <form class="row">
                    <div class="col">
                        <input class="form-control form-control-lg" type="search" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
                    </div>
                    <input class="btn btn-primary btn-lg disabled" type="submit" value="検索" >
                </form> -->

                <form class="row" action="{{ route('posts.search') }}" method="POST">
                @csrf
                    <div class="col">
                        <input class="form-control form-control-lg" type="text" name="keyword" value="{{ $keyword }}" placeholder="キーワード" >
                    </div>
                    <div class="col">
                        <input class="form-control form-control-lg" type="text" name="account" value="{{ $account }}" placeholder="ユーザー名" >
                    </div>
                    <div class="col">
                        <input class="form-control form-control-lg" type="text"  placeholder="日付" >
                    </div>
                    <input class="btn btn-primary btn-lg disabled" type="submit" value="検索">
                </form>
            

            <!-- 線 -->
            <hr class="my-4" />

            @foreach($posts as $post)
            <!-- Post preview-->
            <div class="post-preview">
                    <h5 class="post-episode">{{ $post['episode'] }}</h5>
                    <h5 class="post-image">画像</h5>
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