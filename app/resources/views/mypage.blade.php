@extends('layouts.app')
@section('content')

<!-- Main Content-->
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-11 col-xl-7">
                    <!-- アイコン -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/cabin.png" alt="..." />
                        </div>
                    </div>

                
                    <div class="text-center ">
                        <h5>フォロワー</h5>
                        <h5>フォロー</h5>
                    </div>
                    <div class="text-right"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">新規投稿</button></div>
                    <div class="text-right"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">アカウント編集</button></div>
                    <div class="text-right"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">いいねした投稿</button></div>
                
                    <h5>ユーザー名</h5>
                    <!-- プロフィール -->
                    <input class="form-control" id="name" type="text" placeholder="プロフィール" >

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