@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">違反報告</h2>
        </div>

        <form action="{{ route( 'violations.store',['post'=>$id] ) }}" method="POST">
                    @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        
                        <!-- 画像 -->
                        <h5>違反理由</h5>
                        <textarea class="form-control" name="comment" id="message" placeholder="違反理由入力" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
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