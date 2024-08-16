@extends('layouts.app')
@section('content')

<!-- Main Content-->
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-11 col-xl-7">


                    <!-- アイコン -->
                    @if(!empty($user['image']))
                    <img src="{{ asset('img/' . $user['id'] . '/' . $user['image']) }}" hight=100 width=100>
                    @else
                    <img src="img/user/free.png" hight=100 width=100>
                    @endif

                    <div class="text-right"><a href="{{ route('posts.create') }}">新規投稿</a></div>
                    <div class="text-right"><a href="{{ route('likes.index') }}">いいねした投稿</a></div>
                    <div class="text-right"><a href="{{ route('users.edit', ['user'=>$user['id']]) }}">アカウント編集</a></div>
                    <div class="text-right">
                        <form style="display:inline" action="{{ route('users.destroy', ['user'=>$user['id']]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger ml-3" onclick="return confirm('このアカウントを削除しますか？')">アカウント削除</button>
                        </form>
                    </div>

                    <!-- ユーザー名 -->
                    <h4>{{ $user['name'] }}</h4>


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
                            <a href="{{ route('myposts.show',['post'=>$post['id']]) }}">詳細へ</a>
                        </p>
                    </div>
                    <hr class="my-4" />
                    @endforeach
                    
                    
                   

                   

                </div>
            </div>
        </div>

@endsection