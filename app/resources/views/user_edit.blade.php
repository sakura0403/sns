@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">アカウント編集</h2>
        </div>
        
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- ユーザー名 -->
                        <h5>ユーザー名</h5>
                        <textarea class="form-control" id="message" placeholder="ユーザー名変更" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    <div class="form-group">
                        <!-- メールアドレス -->
                        <h5>メールアドレス</h5>
                        <textarea class="form-control" id="message" placeholder="メールアドレス変更" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    <div class="form-group">
                        <!-- パスワード -->
                        <h5>パスワード</h5>
                        <textarea class="form-control" id="message" placeholder="パスワード変更" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    <div class="form-group">
                        <!-- アイコン -->
                        <h5>アイコン</h5>
                        <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">写真を選択</button>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    <div class="form-group">
                        <!-- プロフィール -->
                        <h5>プロフィール</h5>
                        <textarea class="form-control" id="message" placeholder="プロフィール変更" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                </div>
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    To activate this form, sign up at
                    <br />
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
            <!-- Submit Button-->
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">登録</button>
                <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">削除</button>
            </div>

        </form>
    </div>
</section>

@endsection