@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">管理者ページ</h2>
        </div>
        
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">ユーザーリスト</button></div>
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">投稿リスト</button></div>
            

        </form>
    </div>
</section>


@endsection