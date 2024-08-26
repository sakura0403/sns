@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">新規投稿</h2>
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
        
        <!-- enctyp = HTTPリクエストのパラメータが変化し、画像やファイルなど添付してデータを取得することができる -->
        <!-- <input type=”file”>タグを使用する場合は、必ずformタグに「enctype=”multipart/form-data」を付け足す -->
        <form action="{{ route('posts.confilm') }}" method="POST" enctype="multipart/form-data"> 
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
                        <input type="file" name="image" >
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg ml-3" name='action' value='add'>確認画面へ</button>
                <a href="{{ route('users.index') }}" class="btn-primary btn-lg ml-3">マイページに戻る</a>
            </div>

        </form>
    </div>
</section>

@endsection