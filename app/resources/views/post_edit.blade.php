@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">投稿編集</h2>
        </div>

        <!-- バリデーション -->
        <div class='panel-body'>
            @if($errors->any())
            <div class='alert alert-danger'>
                <ul>
                    @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        
        <form action="{{ route('posts.update', ['post'=>$post['id']]) }}" method="POST" enctype="multipart/form-data">
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
                        <div class="form-group"><input type="file" name="image"></div>
                        @if(!empty($post['image']))
                        <img src="{{ asset('img/' . $post['id'] . '/' . $post['image']) }}" hight=200 width=200>
                        @endif
                    </div>
                </div>
            </div>           

            <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg ml-3" name='action' value='add'>投稿</button>
                 
                    <!-- <a href="{{ route('posts.update', ['post'=>0]) }}">投稿</a> -->
                    <a href="{{ route('myposts.show',['post'=>$post['id']]) }}" class="btn-primary btn-lg ml-3">戻る</a>
            </div>

        </form>
    </div>
</section>

@endsection