@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">新規投稿</h2>
        </div>
        
        <form action="{{ route('posts.confilm') }}" method="POST">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- エピソード -->
                        <h4>エピソード</h4>
                        <textarea class="form-control" name="episode" id="message" placeholder="エピソード"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"> 
                        <!-- 画像 -->
                         <h4>画像</h4>
                        <input  name="image" id="name" type="file" placeholder="画像" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary ml-3" name='action' value='add'>確認画面へ</button>
                <a href="{{ route('users.index') }}">マイページに戻る</a>
            </div>

        </form>
    </div>
</section>

@endsection