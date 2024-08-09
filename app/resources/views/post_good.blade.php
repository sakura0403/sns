@extends('layouts.app')
@section('content')

<form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
    <div class="text-center"><h2>いいねした投稿一覧</h2></div>
    <div class="text-right"><a href="{{ route('users.index') }}">マイページへ戻る</a></div>


 </form>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- 線 -->
                    <hr class="my-4" />

                    <!-- Post preview-->
                    <div class="post-preview">
                            <h2 class="post-episode">エピソード</h2>
                            <h3 class="post-image">画像</h3>
                        <p class="post-meta">
                        <a href="{{ route('posts.show',['post'=>0]) }}">詳細へ</a>
                        </p>
                    </div>
                    <hr class="my-4" />

                    

                </div>
            </div>
        </div>

@endsection