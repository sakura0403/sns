@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">アカウント削除</h2>
            <h5 class="section-heading text-uppercase">本当にアカウントを削除してもよろしいでしょうか？</h5>
            
        </div>
        
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
           

            <!-- Submit Button-->
            <div class="text-center">
                <a href="{{ route('users.destroy', ['user'=>0]) }}">削除</a>
                <a href="{{ route('users.edit', ['user'=>0]) }}">編集画面に戻る</a>
            </div>
        </form>
    </div>
</section>

@endsection