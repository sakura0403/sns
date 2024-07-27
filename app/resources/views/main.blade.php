@extends('layouts.app')
@section('content')
<form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
@csrf
    <!-- マイページ -->
        <div class="text-right"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">マイページ</button></div>
 </form>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-11 col-xl-7">
                    <!-- 検索 -->
                    <div class="row">
                        <div class="col">
                            <input class="form-control form-control-lg" id="emailAddress" type="search" placeholder="検索内容入力" data-sb-validations="required,email" />
                        </div>
                        <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">検索</button></div>
                    </div>

                    <!-- 線 -->
                    <hr class="my-4" />

                    <!-- Post preview-->
                    <div class="post-preview">
                            <h2 class="post-episode">エピソード</h2>
                            <h3 class="post-image">画像</h3>
                        <p class="post-meta">
                            <a href="#!">詳細へ</a>
                        </p>
                    </div>
                    <hr class="my-4" />

                    <!-- Post preview-->
                    <div class="post-preview">
                            <h2 class="post-episode">エピソード</h2>
                            <h3 class="post-image">画像</h3>
                        <p class="post-meta">
                            <a href="#!">詳細へ</a>
                        </p>
                    </div>
                    <hr class="my-4" />

                    <!-- Post preview-->
                    <div class="post-preview">
                            <h2 class="post-episode">エピソード</h2>
                            <h3 class="post-image">画像</h3>
                        <p class="post-meta">
                            <a href="#!">詳細へ</a>
                        </p>
                    </div>
                    <hr class="my-4" />

                    <!-- Post preview-->
                    <div class="post-preview">
                            <h2 class="post-episode">エピソード</h2>
                            <h3 class="post-image">画像</h3>
                        <p class="post-meta">
                            <a href="#!">詳細へ</a>
                        </p>
                    </div>
                    <hr class="my-4" />

                </div>
            </div>
        </div>

@endsection