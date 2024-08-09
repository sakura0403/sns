@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">投稿編集</h2>
        </div>
        
        <form action="{{ route('posts.update', ['post'=>$post['id']]) }}" method="POST">
                    @method('PUT')
                    @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- エピソード -->
                         <h5>エピソード</h5>
                        <input class="form-control" name="episode" id="name" type="text" value="{{ $post['episode'] }}" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- 画像 -->
                        <h5>画像</h5>
                        <textarea class="form-control" id="message" placeholder="画像" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                </div>
            </div>           

            <div class="text-center">
                    <button type="submit" class="btn btn-primary ml-3" name='action' value='add'>投稿</button>
                 
                    <!-- <a href="{{ route('posts.update', ['post'=>0]) }}">投稿</a> -->
                    <a href="{{ route('myposts.show',['post'=>$post['id']]) }}">戻る</a>
            </div>

        </form>
    </div>
</section>

@endsection