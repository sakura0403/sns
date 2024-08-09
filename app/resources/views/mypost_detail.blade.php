@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">

        <form style="display:inline" action="{{ route('posts.destroy', ['post'=>$post['id']]) }}" method="post">
            @method('DELETE')
            @csrf    
            <div class="text-right">
                <a href="{{ route('posts.edit', ['post'=>$post['id']]) }}">投稿編集</a>
                <button type="submit" class="btn btn-danger ml-3" onclick="return confirm('この投稿を削除しますか？')">削除</button>
            </div>

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
                        <textarea class="form-control" id="message"   placeholder="画像" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <!-- コメント -->
                    <h4>コメント欄</h4>
                    @foreach($comments as $comment)
                    <h5 class="post-comment">{{ $comment['comment'] }}</h5>
                    @endforeach
                </div>
            </div>
        </form>   
            <div class="text-center"><a href="{{ route('users.index') }}">マイページに戻る</a></div>
    </div>
</section>

@endsection