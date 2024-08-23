@extends('layouts.app')
@section('content')

<!-- Main Content-->
<div class="row justify-content-center">
    <div class="col-md-10 col-lg-11 col-xl-7">

        <div class="float-right">
            <div class="row justify-content">
                <a href="{{ route('posts.create') }}" class="btn-primary btn-lg ml-3">新規投稿</a>
                <a href="{{ route('likes.index') }}" class="btn-primary btn-lg ml-3">いいねした投稿</a>
                <a href="{{ route('users.edit', ['user'=>$user['id']]) }}" class="btn-primary btn-lg ml-3">アカウント編集</a>
                <div>
                    <form style="display:inline" action="{{ route('users.destroy', ['user'=>$user['id']]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg  ml-3" onclick="return confirm('このアカウントを削除しますか？')">アカウント削除</button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- アイコン -->
        @if(!empty($user['image']))
        <img src="{{ asset('img/' . $user['id'] . '/' . $user['image']) }}" hight=100 width=100 >
        @else
        <img src="img/user/free.png" hight=100 width=100>
        @endif
    
        <!-- ユーザー名 -->
        <h4>{{ $user['name'] }}</h4>


        <!-- 線 -->
        <hr class="my-4" />

        @foreach($posts as $post)
        <!-- Post preview-->
        <div class="post-preview">
                <h5 class="post-episode">{{ $post['episode'] }}</h5>
                @if(!empty($post['image']))
                <img src="{{ asset('img/' . $post['id'] . '/' . $post['image']) }}" hight=150 width=150>
                @endif
            <p class="post-meta">
                <a href="{{ route('myposts.show',['post'=>$post['id']]) }}">詳細へ</a>
            </p>
        </div>
        <hr class="my-4" />
        @endforeach
        
        
        

        

    </div>
</div>

@endsection