@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">

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
        
        <form action="{{ route( 'comments.store',['post'=>$id] ) }}" method="POST">
            @csrf
        
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- 画像 -->
                        <h4>コメント</h4>
                        <textarea class="form-control" name="comment" id="message" placeholder="コメント内容入力" data-sb-validations="required"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                
                    <button type="submit" class="btn btn-primary btn-lg ml-3" name='action' value='add'>投稿</button>
                <a href="{{ route( 'posts.show',['post'=>$id] ) }}" class="btn-primary btn-lg ml-3">詳細へ戻る</a>
            </div>
        </form>
    </div>
</section>


@endsection