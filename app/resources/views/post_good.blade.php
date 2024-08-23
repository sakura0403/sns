@extends('layouts.app')
@section('content')

<form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
    <div class="text-center"><h2>いいねした投稿一覧</h2></div>
    <div class="text-right"><a href="{{ route('users.index') }}" class="btn-primary btn-lg ml-3">マイページへ戻る</a></div>
</form>


    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- 線 -->
            <hr class="my-4" />

            @foreach($posts as $post)
                <!-- Post preview-->
                <div class="post-preview">
                    
                    <h5 class="post-episode">{{ $post['post']['episode'] }}</h5>
                    @if(!empty($post['post']['image']))
                    <img src="{{ asset('img/' . $post['post']['id'] . '/' . $post['post']['image']) }}" hight=200 width=200>
                    @endif
                    <p class="post-meta">
                        <a href="{{ route('posts.show',['post'=>$post['post']['id']]) }}">詳細へ</a>
                    </p>
                </div>
                <hr class="my-4" />
            @endforeach

            

        </div>
    </div>

@endsection