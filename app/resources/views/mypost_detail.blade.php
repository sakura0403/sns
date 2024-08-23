@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">

        <form style="display:inline" action="{{ route('posts.destroy', ['post'=>$post['id']]) }}" method="post" enctype="multipart/form-data">
            @method('DELETE')
            @csrf    
            <div class="text-right">
                <a href="{{ route('posts.edit', ['post'=>$post['id']]) }}" class="btn-primary btn-lg">投稿編集</a>
                <button type="submit" class="btn btn-danger ml-3 " onclick="return confirm('この投稿を削除しますか？')">削除</button>
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
                        @if(!empty($post['image']))
                        <img src="{{ asset('img/' . $post['id'] . '/' . $post['image']) }}" hight=200 width=200>
                        @endif
                    </div>
                </div>

            </div>
            
            <!-- 線 -->
            <hr class="my-4" />
            
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
            <div class="text-center"><a href="{{ route('users.index') }}" class="btn-primary btn-lg">マイページに戻る</a></div>
    </div>
</section>

@endsection