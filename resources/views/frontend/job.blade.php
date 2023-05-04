@php
    $menu = 'jobs';
@endphp
@extends('frontend.app.layout')
@push('styles')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>--}}
    <style>
        div#social-links {
            margin: 0 auto;
            max-width: 500px;
        }

        div#social-links ul li {
            display: inline-block;
        }

        div#social-links ul li a {
            padding: 5px;
            margin: 1px;
        }
    </style>
@endpush
@section('content')
    <!-- Start Page Banner Section -->
    <section class="page-banner job" id="page-banner">
        <div class="container">
            <div class="row position-relative">
                <div class="col-12 col-xl-8">
                    <a href="{{route('posts.index')}}"
                       class="back-button wow animate animate__fadeInRight animation-delay-1">
                        <img src="{{asset('frontend/images/icons/ic-arrows-left.svg')}}" alt="Arrow Left">
                    </a>
                    <!-- Start Job Box -->
                    <div class="job-box">
                        <div class="job-provider wow animate animate__fadeInLeft animation-delay-2">
                            <img src="{{$post->company->photo}}" alt="avatar">
                        </div>
                        <div class="job-info">
                            <h6 class="job-place wow animate animate__fadeInDown animation-delay-3">{{$post->company->company_name}}
                                {{$post->city->name}}</h6>
                            <h1 class="position wow animate animate__fadeInDown animation-delay-4">{{$post->title}}</h1>

                            <div class="job-details-btn wow animate animate__fadeInDown animation-delay-5">
                                @if(filled($post->pdf_details))
                                    <a href="{{route('download',$post->id)}}"
                                       class="button outline  d-inline-flex gap-3 align-items-center">
                                        <img src="{{asset('frontend/images/icons/ic-actions-download.svg')}}"
                                             alt="Donwload Icon">
                                        Donwload Job Details
                                    </a>
                                @endif
                            </div>
                            <div class="icons">
                                <div class="icon-box wow animate animate__fadeInDown animation-delay-6">
                                    <div class="icon location">
                                        <img src="{{asset('frontend/images/icons/ic-contact-map-pin.svg')}}"
                                             alt="Location">
                                    </div>
                                    <div>
                                        <p>Location</p>
                                        <span class="content">{{$post->city->name}}</span>
                                    </div>
                                </div>
                                <div class="icon-box wow animate animate__fadeInDown animation-delay-7">
                                    <div class="icon time">
                                        <img src="{{asset('frontend/images/icons/ic-furniture-light.svg')}}" alt="Time">
                                    </div>
                                    <div>
                                        <p>Type</p>
                                        <span class="content">{{$post->type->name}}</span>
                                    </div>
                                </div>
                                <div class="icon-box wow animate animate__fadeInDown animation-delay-8">
                                    <div class="icon salary">
                                        <img src="{{asset('frontend/images/icons/ic-shopping-wallet.svg')}}"
                                             alt="Salary">
                                    </div>
                                    <div>
                                        <p>Salary</p>
                                        <span class="content">{{$post->currency->symbol}}{{$post->salary}}<span>/{{$post->per->per}}</span></span>
                                    </div>
                                </div>
                                <div class="icon-box wow animate animate__fadeInDown animation-delay-9">
                                    <div class="icon published-time">
                                        <img src="{{asset('frontend/images/icons/time.svg')}}" alt="Time">
                                    </div>
                                    <div>
                                        <p>Date Posted</p>
                                        <span class="content">{{$post->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Job Box -->
                </div>
                <div class="col-12 col-xl-4 d-none d-xl-block text-end">
                    <img src="{{asset('frontend/images/page-banners/job_banner.svg')}}" alt="People" class="job-banner">
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Banner Section -->

    <!-- Start Job Description  -->
    <section class="job-desc pt-0" id="job-desc">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-xl-8">
                    @include('frontend.partial.flash')
                    <div class="section-heading">
                        <h2>Job Description</h2>
                    </div>
                    <style>
                        .job-desc-content li {
                            list-style: square;
                        }
                    </style>
                    <div class="job-desc-content">
                        {!! $post->summery !!}
                    </div>
                    <p></p>
                </div>
                <div class="col-12 col-xl-3">
                    @if(auth('job_seekers')->check())
                        @if($dont_applied && $created_at)
                            <div class="section-heading">
                                <h2>Apply now</h2>
                            </div>

                            @if($cvs->count() > 0)
                                <form action="{{route('apply',$post->id)}}" method="POST">
                                    @csrf
                                    @error('job_seeker_cv_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <select class="select-2-select cv-input w-100" name="job_seeker_cv_id">
                                        <option selected="true" disabled="disabled">Select your CV</option>
                                        @foreach($cvs as $cv)
                                            <option value="{{$cv->id}}">{{$cv->cv_name}}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="button w-100 mt-4">Apply now</button>
                                </form>
                            @else
                                <section style="margin-top: -100px" class="profile-content jobseeker"
                                         id="profile-content">
                                    <form action="{{route('uploadApply',$post->id)}}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @error('pdf')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="container">
                                            <div class="row gap-30">
                                                <div class="col-12">
                                                    <div class="pdf-upload-btn custom-upload file">
                                                        <label
                                                                class="custom-upload__button button outline d-inline-flex gap-3 align-items-center w-auto"
                                                                for="client_form_file_cv_file"
                                                                data-element="custom-upload-button">
                                                            Upload New CV
                                                            <img src="{{asset('frontend/images/icons/ic-actions-add-file.svg')}}"
                                                                 alt="Upload Icon">
                                                        </label>
                                                        <input class="custom-upload__input" name="pdf"
                                                               accept=".pdf"
                                                               id="client_form_file_cv_file" type="file"
                                                               data-behaviour="custom-upload-input">
                                                        <p class="note">You can only upload PDF files.
                                                            <br> Maximum file size: 10 MB
                                                        </p>
                                                        <button type="submit" class="button w-100 mt-4">Apply now
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                                {{--<button style="margin-top: -100px" data-bs-toggle="modal" data-bs-target="#upload_cv" class="button w-100 mt-4">
                                    Apply Now
                                </button>--}}
                            @endif
                        @elseif(!$created_at)
                            <div class="section-heading">
                                <p class="danger">This job is no longer available</p>
                            </div>
                        @elseif(!$dont_applied)
                            <div class="section-heading">
                                <p class="text-success">You have already applied to this job.</p>
                            </div>
                        @endif
                    @elseif(auth('companies')->check())
                    @else
                        <button data-bs-toggle="modal" data-bs-target="#login-register" class="button w-100 mt-4">Apply
                            now
                        </button>
                    @endif
                    <div class="job-link-box">
                        <div class="section-heading">
                            <h2>Interested?</h2>
                            <div class="link-box d-flex justify-content-between align-items-center">
                                <p id="job-link"><small>{{request()->url()}}</small></p>
                                <img src="{{asset('frontend/images/icons/copy.svg')}}" alt="Copy Icon">
                            </div>
                            <p class="text-center mt-3" id="link-copied">Link Copied!</p>
                        </div>
                    </div>
                    <div  class="d-flex gap-3">
                        {{--@if(auth('job_seekers')->check())
                            @if(auth('job_seekers')->user()->postbookmarked($post->id))
                                <div class="favorite-box">
                                    <a href="#" data-bs-toggle="modal"
                                       data-bs-target="#bookmark{{$post->id}}">
                                        <svg id="ic-actions-star" xmlns="http://www.w3.org/2000/svg"
                                             width="24"
                                             height="24"
                                             viewBox="0 0 24 24">
                                            <rect id="Rectangle_160" data-name="Rectangle 160"
                                                  width="24"
                                                  height="24"
                                                  fill="none"/>
                                            <g id="ic-actions-star-2" data-name="ic-actions-star"
                                               transform="translate(-0.005 -0.015)">
                                                <path id="Path_38" data-name="Path 38"
                                                      d="M11,3.19a1.08,1.08,0,0,1,2.06,0l1.86,5.72h6a1.09,1.09,0,0,1,.64,2l-4.87,3.53,1.86,5.73a1.08,1.08,0,0,1-1.67,1.21L12,17.81,7.13,21.35a1.08,1.08,0,0,1-1.67-1.21l1.86-5.73L2.45,10.88a1.09,1.09,0,0,1,.64-2h6Z"
                                                      fill="none" stroke="#2923ff"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="1.5" fill-rule="evenodd"/>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            @else
                                <div class="favorite-box active">
                                    <a href="#" data-bs-toggle="modal"
                                       data-bs-target="#unbookmark{{$post->id}}">
                                        <svg id="ic-actions-star" xmlns="http://www.w3.org/2000/svg"
                                             width="24"
                                             height="24"
                                             viewBox="0 0 24 24">
                                            <rect id="Rectangle_160" data-name="Rectangle 160"
                                                  width="24"
                                                  height="24"
                                                  fill="none"/>
                                            <g id="ic-actions-star-2" data-name="ic-actions-star"
                                               transform="translate(-0.005 -0.015)">
                                                <path id="Path_38" data-name="Path 38"
                                                      d="M11,3.19a1.08,1.08,0,0,1,2.06,0l1.86,5.72h6a1.09,1.09,0,0,1,.64,2l-4.87,3.53,1.86,5.73a1.08,1.08,0,0,1-1.67,1.21L12,17.81,7.13,21.35a1.08,1.08,0,0,1-1.67-1.21l1.86-5.73L2.45,10.88a1.09,1.09,0,0,1,.64-2h6Z"
                                                      fill="none" stroke="#2923ff"
                                                      stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="1.5" fill-rule="evenodd"/>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        @else

                        @endif--}}


                        <style>
                            .social-share {
                                width: 50px;
                                padding: 5px;
                            }
                            .aya{
                                font-size: 30px;
                                padding: 5px;
                                color: black;
                            }
                            .aya:hover{
                                color: #2923ff;
                            }
                        </style>
                    </div>
                    <div class="">
                        <h4>Share</h4>
                        <ul class="d-flex">
                            <li>
                                <a target="_blank" href="https://mail.google.com/mail/?view=cm&to={email_address}&su={{$post->title}}&body={{request()->url()}}&bcc={email_address}&cc={email_address}
">
                                    <ion-icon name="mail-open-outline" role="img" class="md hydrated aya" aria-label="Share this post on Gmail"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a title="Share this post on Linkedin" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{request()->url()}}">
                                    <ion-icon name="logo-linkedin" role="img" class="md hydrated aya" aria-label="Share this post via Linkedin"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a title="Share this post via Facebook" target="_blank" href="https://www.facebook.com/sharer.php?u={{request()->url()}}">
                                    <ion-icon name="logo-facebook" role="img" class="md hydrated aya" aria-label="Share this post on Facebook"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a title="Share this post on Twitter" target="_blank" href="https://twitter.com/intent/tweet?url={{request()->url()}}&text={{$post->title}}">
                                    <ion-icon name="logo-twitter" role="img" class="md hydrated aya" aria-label="Share this post on Twitter"></ion-icon>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Job Description  -->

    <!-- Start Similar Jobs -->
    <section class="similar-jobs" id="similar-jobs">
        <div class="container">
            <div class="section-heading">
                <h2>Similar Jobs</h2>
            </div>
            <div class="row jobs-boxes">
                @foreach($similar as $post)
                    <div class="col-12 col-lg-6 col-xl-3">
                        <!-- Start Job Box -->
                        <a href="{{route('job_details',[$post->id,\Str::slug($post->title)])}}">
                            <div class="job-box wow animate animate__fadeInDown animation-delay-1">
                                <h6 class="job-place">{{$post->company->company_name}}
                                    ,{{$post->city->name}}</h6>
                                <h3 class="position">{{$post->title}}</h3>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="icon-box">
                                            <div class="icon location">
                                                <img src="{{asset('frontend/images/icons/ic-contact-map-pin.svg')}}"
                                                     alt="Location">
                                            </div>
                                            <span class="content">{{$post->city->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="icon-box">
                                            <div class="icon location">
                                                <img src="{{asset('frontend/images/icons/ic-furniture-light.svg')}}"
                                                     alt="Time">
                                            </div>
                                            <span class="content">{{$post->type->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="icon-box">
                                            <div class="icon location">
                                                <img src="{{asset('frontend/images/icons/ic-shopping-wallet.svg')}}"
                                                     alt="Salary">
                                            </div>
                                            <span class="content">{{$post->currency->symbol}}{{$post->salary}}<span>/{{$post->per->per}}</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- End Job Box -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Similar Jobs -->

    <div class="modal fade" id="bookmark{{$post->id}}" tabindex="-1" aria-labelledby="retractLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="retractLabel">Bookmark</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center"> Add {{$post->title}} to Bookmark?</h5>
                </div>
                <div class="modal-footer">
                    @if(isset($post))
                        <a href="{{route('bookmark',$post->id)}}" class="button mx-auto" type="button">Yes</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="unbookmark{{$post->id}}" tabindex="-1" aria-labelledby="retractLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="retractLabel">Remove from Bookmark</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center"> Remove {{$post->title}} from Bookmark?</h5>
                </div>
                <div class="modal-footer">
                    @if(isset($post))
                        <a href="{{route('un_bookmark',$post->id)}}" class="button mx-auto" type="button">Yes</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(auth('job_seekers')->check())
        <div class="modal fade" id="upload_cv_and_apply" tabindex="-1" aria-labelledby="testLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="testLabel">Upload Cv and Apply</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <ion-icon name="close-outline"></ion-icon>
                        </button>
                    </div>
                    <form action="#" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-lg-9">
                                    <form enctype="multipart/form-data" action="{{route('uploadCv')}}" method="post">
                                        @csrf
                                        <div class="row gap-20">
                                            @if(auth('job_seekers')->user()->cvs->count() < 10)
                                                <form enctype="multipart/form-data" method="post"
                                                      action="{{route('uploadCv')}}">
                                                    @csrf

                                                    <div class="col-12">
                                                        <div class="pdf-upload-btn custom-upload file">
                                                            <label
                                                                    class="custom-upload__button button outline d-inline-flex gap-3 align-items-center w-auto"
                                                                    for="client_form_file_cv"
                                                                    data-element="custom-upload-button">
                                                                Upload New CV
                                                                <img src="{{asset('frontend/images/icons/ic-actions-add-file.svg')}}"
                                                                     alt="Upload Icon">
                                                            </label>
                                                            <input onchange="form.submit()" class="custom-upload__input"
                                                                   name="pdf"
                                                                   accept=".pdf"
                                                                   id="client_form_file_cv" type="file"
                                                                   data-behaviour="custom-upload-input">
                                                            <p class="note">You can only upload PDF files.
                                                                <br> Maximum file size: 10 MB
                                                            </p>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                            @if(auth('job_seekers')->user()->cvs->count() > 0)
                                                @foreach(auth('job_seekers')->user()->cvs as $cv)
                                                    <div class="col-12">
                                                        <div class="uploaded-file">
                                                            <div class="content">
                                                                <div class="icon">
                                                                    <img src="{{asset('frontend/images/icons/ic-folder-simple.svg')}}"
                                                                         alt="Icon">
                                                                </div>
                                                                <p>{{$cv->cv_name}}</p>
                                                                <span>3MB</span>
                                                            </div>
                                                            <div class="actions">
                                                                <a href="{{route('downloadCv',$cv->id)}}">
                                                                    <img src="{{asset('frontend/images/icons/ic-actions-download.svg')}}"
                                                                         alt="Download"
                                                                         class="action-download">
                                                                </a>
                                                                <a href="#" data-bs-toggle="modal"
                                                                   data-bs-target="#delete-cv{{$cv->id}}">
                                                                    <img src="{{asset('frontend/images/icons/ic-actions-trash.svg')}}"
                                                                         alt="Trash"
                                                                         class="action-trash">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="button mx-auto" type="submit">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

