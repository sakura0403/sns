@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        
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
                
                    <button type="submit" class="btn btn-primary ml-3" name='action' value='add'>投稿</button>
                <a href="{{ route( 'posts.show',['post'=>$id] ) }}">詳細へ戻る</a>
            </div>
        </form>
    </div>
</section>


@endsection