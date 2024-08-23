@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2>アカウント編集</h2>
        </div>

        <form action="{{ route('users.update',['user'=>$user['id']]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- ユーザー名 -->
                            <h5>ユーザー名</h5>
                            <input class="form-control" name="name" id="name" type="text" value="{{ $user['name'] }}" >
                        </div>
                        <div class="form-group">
                            <!-- メールアドレス -->
                            <h5>メールアドレス</h5>
                            <input class="form-control" name="email" id="name" type="text" value="{{ $user['email'] }}" >
                        </div>
                        
                        <div class="form-group">
                            <!-- アイコン -->
                            <h5>アイコン</h5>
                            <input name="image" type="file">
                        </div>

                    </div>
                </div>
            
                <div class="text-center">
               
                    <button type="submit" class="btn btn-primary btn-lg ml-3" name='action' value='add'>登録</button>
                    <!-- <a href="{{ route('users.update',['user'=>0]) }}">登録</a>  -->
                
                    <a href="{{ route('users.index') }}" class="btn-primary btn-lg ml-3">マイページへ戻る</a>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection