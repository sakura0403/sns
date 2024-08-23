@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">

    <div class="float-right"><a href="{{ route('violations.create',[ 'post' => $post['id']]) }}" class="btn-primary btn-lg ml-3">違反報告</a></div>

    <!-- アイコン -->
    @if(!empty($user['image']))
    <img src="{{ asset('img/' . $user['id'] . '/' . $user['image']) }}" hight=80 width=80>
    @else
    <img src="img/user/free.png" hight=100 width=100>
    @endif
    <!-- ユーザー名 -->
    <h5>{{ $user['name'] }}</h5>
        

        
    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
        <div class="row align-items-stretch mb-5">
            <div class="col-md-6">
                <div class="form-group">
                    <!-- エピソード -->
                    <h4>エピソード</h4>
                    <h5 class="post-episode">{{ $post['episode'] }}</h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group form-group-textarea mb-md-0">
                    <!-- 画像 -->
                    @if(!empty($post['image']))
                    <h4>画像</h4>
                    <img src="{{ asset('img/' . $post['id'] . '/' . $post['image']) }}" hight=200 width=200>
                    @endif
                </div>
            </div>

            <div class="container">
                <!-- 線 -->
                <hr class="my-4" />
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <!-- コメント -->
                    <h4>コメント欄</h4>
                    @foreach($comments as $comment)  <!-- 複数コメントを表示 -->
                    <h5 class="post-comment">{{ $comment['comment'] }}</h5>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center">

        <!-- いいね機能 -->
            @if($like_model->like_exist(Auth::user()->id,$post->id))
            <p class="favorite-marke">
                <a class="js-like-toggle loved" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart"></i></a>
                <span class="likesCount">{{$post->likes_count}}</span>
            </p>
            @else
            <p class="favorite-marke">
                <a class="js-like-toggle" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart"></i></a>
                <span class="likesCount">{{$post->likes_count}}</span>
            </p>
            @endif

            <a href="{{ route('comments.create',[ 'post' => $post['id']]) }}" class="btn-primary btn-lg ml-3">コメント</a>
            <a href="{{ route('posts.index') }}" class="btn-primary btn-lg ml-3">戻る</a>
        </div>
    </form>
    
    </div>
</section>

@endsection