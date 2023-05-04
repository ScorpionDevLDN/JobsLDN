@extends('AdminDashboard.index')
@section('breadcrumb')
    <a href="{{route('admin.settings.index')}}" class="btn">AWS Web Service</a>
@endsection
@section('title' ,'AWS Web Service')

@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">

            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div id="accordion">

                        {{-- branches --}}
                        <div class="card card-custom card-collapse gutter-b example example-compact">
                            <div class="card-header" id="s3_content">
                                <button class="btn collapsed" data-toggle="collapse" data-target="#s3_content"
                                        aria-expanded="false" aria-controls="s3_content">
                                    <h3 class="card-title">How to create S3 bucket account</h3>
                                </button>
                                <div class="card-toolbar">
                                    <div class="example-tools justify-content-center">
                <span class="collapse-icon" data-toggle="tooltip" title="{{trans('app.collapse')}}"><i
                            class="fas fa-chevron-down"></i></span>

                                    </div>
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div id="s3_content" class="collapse show" aria-labelledby="s3_content"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <h5>First you need to create bucket and user so let's follow bellow step:</h5>
                                    <ol>
                                        <li class="m-5">
                                            <h6>Go to <a target="_blank"
                                                                           href="https://signin.aws.amazon.com/signin?redirect_uri=https%3A%2F%2Fconsole.aws.amazon.com%2Fconsole%2Fhome%3FhashArgs%3D%2523%26isauthcode%3Dtrue%26nc2%3Dh_ct%26src%3Dheader-signin%26state%3DhashArgsFromTB_ap-northeast-1_450ae891126ef8ea&client_id=arn%3Aaws%3Asignin%3A%3A%3Aconsole%2Fcanvas&forceMobileApp=0&code_challenge=uf-leNdk6jNzJeaJPbxnbb754fE53_ZN0eQnU-3E7ss&code_challenge_method=SHA-256">Amazon
                                                    Web Service Console</a> and Login.</h6>
                                        </li>
                                        <li class="m-5">
                                            <h6>Click on S3 from Service Lists</h6>
                                        </li>
                                        <li class="m-5">
                                            <h6>
                                                Click on "Create Bucket" button and you will found bellow forms. you can enter your bucket name there
                                            </h6>
                                        </li>
                                        <img src="{{asset('s3/laravel-s3-bucket-1.webp')}}" alt="">
                                        <li class="m-5">
                                            <h6>
                                                Create Create IAM User. Click here to create
                                                <a target="_blank"
                                                   href="https://us-east-1.console.aws.amazon.com/iam/home">
                                                    IAM User.</a>.
                                            </h6>
                                        </li>
                                        <li class="m-5">
                                            <h6>
                                                Click on "Create User" button as bellow show you.
                                            </h6>
                                        </li>
                                        <img src="{{asset('s3/laravel-s3-bucket-2.webp')}}" alt="">
                                        <li class="m-5">
                                            <h6>
                                                Next Add User Name and select "Programmatic access" from access type. then click on next
                                            </h6>
                                        </li>
                                        <img src="{{asset('s3/laravel-s3-bucket-3.webp')}}" alt="">
                                        <li class="m-5">
                                            <h6>
                                                Next Select “Attach Existing Policy Directly” and choose "AmazonS3FullAccess" from permission link.
                                            </h6>
                                        </li>
                                        <img src="{{asset('s3/laravel-s3-bucket-4.webp')}}" alt="">
                                        <li class="m-5">
                                            <h6>
                                                It's optional so you can skip and click to next.
                                            </h6>
                                        </li>
                                        <img src="{{asset('s3/laravel-s3-bucket-5.webp')}}" alt="">
                                        <li class="m-5">
                                            <h6>
                                                You can view user details and then click on "Create User" button.
                                            </h6>
                                        </li>
                                        <img src="{{asset('s3/laravel-s3-bucket-6.webp')}}" alt="">
                                        <li class="m-5">
                                            <h6>
                                                Now you will see created user in link. there is a "Access Key ID" and "Secret Access Key" that we need.
                                            </h6>
                                        </li>
                                        <img src="{{asset('s3/laravel-s3-bucket-7.webp')}}" alt="">
                                        <li class="m-5">
                                            <h6>
                                                Now Copy S3 Bucket Name and Region
                                            </h6>
                                        </li>
                                        <img style="width: 69%" src="{{asset('s3/2022-10-09_13-55-31.png')}}" alt="">
                                    </ol>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>

@endsection


