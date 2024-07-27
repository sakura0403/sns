@extends('layouts.app')
@section('content')

<section class="page-section" id="contact">
    <div class="container">
    <!-- Portfolio Item 1-->
    <div class="col-md-6 col-lg-4 mb-5">
        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
            </div>
            <img class="img-fluid" src="assets/img/portfolio/cabin.png" alt="..." />
        </div>
        <h5>ユーザー名</h5>
    </div>
        
    <div class="text-right"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">違反報告</button></div>

        
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- エピソード -->
                        <input class="form-control" id="name" type="text" placeholder="エピソード" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- 画像 -->
                        <textarea class="form-control" id="message" placeholder="画像" data-sb-validations="required"></textarea>
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
                <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">いいね</button>
                <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">コメント</button>
                <button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">マイページに戻る</button>
            </div>
        </form>
    </div>
</section>

@endsection