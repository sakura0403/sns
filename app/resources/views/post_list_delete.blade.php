@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h5 class="section-heading text-uppercase">投稿を表示停止してもよろしいでしょうか？</h5>
            
        </div>
        
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
           

            <!-- Submit Button-->
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">表示停止</button>
                <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">投稿リストに戻る</button>
        </div>
        </form>
    </div>
</section>

@endsection