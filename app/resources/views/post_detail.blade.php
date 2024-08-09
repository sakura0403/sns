@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
    <!-- Portfolio Item 1-->
    <div class="col-md-6 col-lg-4 mb-5">
        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
            </div>
            <img class="img-fluid" src="assets/img/portfolio/cabin.png" alt="..." />
        </div>
        <h5>{{ $user['name'] }}</h5>
    </div>
        
    <div class="text-right"><a href="{{ route('violations.create',[ 'post' => $post['id']]) }}">違反報告</a></div>

        
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
                        <h4>画像</h4>
                        <textarea class="form-control" id="message" placeholder="画像" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
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
                <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">いいね</button>
                <a href="{{ route('comments.create',[ 'post' => $post['id']]) }}">コメント</a>
                <a href="{{ route('posts.index') }}">戻る</a>
            </div>
        </form>
        
    </div>
</section>

@endsection