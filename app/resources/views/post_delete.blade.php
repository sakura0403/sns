@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">投稿削除</h2>
            <h5 class="section-heading text-uppercase">本当に投稿を削除してもよろしいでしょうか？</h5>
            
        </div>
        
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
           

            <!-- Submit Button-->
            <div class="text-center">
            <form style="display:inline" action="{{ route('posts.destroy', ['post'=>1]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">
                        {{ __('削除') }}
                    </button>
                </form>
                <!-- <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">削除</button> -->
                <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">編集画面に戻る</button>
        </div>
        </form>
    </div>
</section>

@endsection