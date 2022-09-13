@php
    $menu = 'jobs';
@endphp
@extends('frontend.jobsldn.app.layout')
@push('styles')
@endpush
@section('content')
    <!-- Start Page Banner Section -->
    <section class="page-banner job" id="page-banner">
        <div class="container">
            <div class="row position-relative">
                <div class="col-12 col-xl-8">
                    <a href="{{route('posts.index')}}"
                       class="back-button wow animate animate__fadeInRight animation-delay-1">
                        <img src="{{asset('jobsldn/images/icons/ic-arrows-left.svg')}}" alt="Arrow Left">
                    </a>
                    <!-- Start Job Box -->
                    <div class="job-box">
                        <div class="job-provider wow animate animate__fadeInLeft animation-delay-2">
                            <img src="{{$post->company->photo}}" alt="avatar">
                        </div>
                        <div class="job-info">
                            <h6 class="job-place wow animate animate__fadeInDown animation-delay-3">{{$post->company->company_name}}
                                ,{{$post->city->name}}</h6>
                            <h1 class="position wow animate animate__fadeInDown animation-delay-4">{{$post->title}}</h1>

                            <div class="job-details-btn wow animate animate__fadeInDown animation-delay-5">
                                @if(filled($post->pdf_details))
                                    <a href="{{route('download',$post->id)}}"
                                       class="button outline  d-inline-flex gap-3 align-items-center">
                                        <img src="{{asset('jobsldn/images/icons/ic-actions-download.svg')}}"
                                             alt="Donwload Icon">
                                        Donwload Job Details
                                    </a>
                                @endif
                            </div>
                            <div class="icons">
                                <div class="icon-box wow animate animate__fadeInDown animation-delay-6">
                                    <div class="icon location">
                                        <img src="{{asset('jobsldn/images/icons/ic-contact-map-pin.svg')}}"
                                             alt="Location">
                                    </div>
                                    <div>
                                        <p>Location</p>
                                        <span class="content">{{$post->city->name}}</span>
                                    </div>
                                </div>
                                <div class="icon-box wow animate animate__fadeInDown animation-delay-7">
                                    <div class="icon time">
                                        <img src="{{asset('jobsldn/images/icons/ic-furniture-light.svg')}}" alt="Time">
                                    </div>
                                    <div>
                                        <p>Type</p>
                                        <span class="content">{{$post->type->name}}</span>
                                    </div>
                                </div>
                                <div class="icon-box wow animate animate__fadeInDown animation-delay-8">
                                    <div class="icon salary">
                                        <img src="{{asset('jobsldn/images/icons/ic-shopping-wallet.svg')}}"
                                             alt="Salary">
                                    </div>
                                    <div>
                                        <p>Salary</p>
                                        <span class="content">{{$post->currency->symbol}}{{$post->salary}}<span>/{{$post->per->per}}</span></span>
                                    </div>
                                </div>
                                <div class="icon-box wow animate animate__fadeInDown animation-delay-9">
                                    <div class="icon published-time">
                                        <img src="{{asset('jobsldn/images/icons/time.svg')}}" alt="Time">
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
                    <img src="{{asset('jobsldn/images/page-banners/job_banner.svg')}}" alt="People" class="job-banner">
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
                    <div class="section-heading">
                        <h2>Job Description</h2>
                    </div>
                    <div class="job-desc-content">
                        {{$post->summery}}
                    </div>
                    <p></p>
                </div>
                <div class="col-12 col-xl-3">
                    @if($created_at)
                        <h6 class="mb-4 mt-4 text-danger mt-md-0 text-center text-md-left">This job is no longer
                            available</h6>
                    @else
                        @if(auth()->guard('job_seekers')->check())
                            <div class="section-heading">
                                <h2>Apply now</h2>
                            </div>
                            <form action="{{route('apply',$post->id)}}" method="POST">
                                @csrf
                                <select class="select-2-select cv-input w-100" name="category">
                                    <option selected="true" disabled="disabled">Select your CV</option>
                                    @foreach($cvs as $cv)
                                        <option value="{{$cv->id}}">{{$cv->cv_name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="button w-100 mt-4">Apply now</button>
                            </form>
                        @endif
                    @endif
                    <div class="job-link-box">
                        <div class="section-heading">
                            <h2>Interested?</h2>
                            <div class="link-box d-flex justify-content-between align-items-center">
                                <p id="job-link">{{request()->url()}}</p>
                                <img src="{{asset('jobsldn/images/icons/copy.svg')}}" alt="Copy Icon">
                            </div>
                            <p class="text-center mt-3" id="link-copied">Link Copied!</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="favorite-box">
                            <svg id="ic-actions-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24">
                                <rect id="Rectangle_160" data-name="Rectangle 160" width="24" height="24"
                                      fill="none"/>
                                <g id="ic-actions-star-2" data-name="ic-actions-star"
                                   transform="translate(-0.005 -0.015)">
                                    <path id="Path_38" data-name="Path 38"
                                          d="M11,3.19a1.08,1.08,0,0,1,2.06,0l1.86,5.72h6a1.09,1.09,0,0,1,.64,2l-4.87,3.53,1.86,5.73a1.08,1.08,0,0,1-1.67,1.21L12,17.81,7.13,21.35a1.08,1.08,0,0,1-1.67-1.21l1.86-5.73L2.45,10.88a1.09,1.09,0,0,1,.64-2h6Z"
                                          fill="none" stroke="#2923ff" stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.5"
                                          fill-rule="evenodd"/>
                                </g>
                            </svg>
                        </div>
                        <div class="share-box">
                            {!! $shareComponent !!}
                        </div>
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
                        <a href="{{route('job_details',$post->id)}}">
                            <div class="job-box wow animate animate__fadeInDown animation-delay-1">
                                <h6 class="job-place">{{$post->company->company_name}}
                                    ,{{$post->city->name}}</h6>
                                <h3 class="position">{{$post->title}}</h3>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="icon-box">
                                            <div class="icon location">
                                                <img src="{{asset('jobsldn/images/icons/ic-contact-map-pin.svg')}}"
                                                     alt="Location">
                                            </div>
                                            <span class="content">{{$post->city->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="icon-box">
                                            <div class="icon location">
                                                <img src="{{asset('jobsldn/images/icons/ic-furniture-light.svg')}}"
                                                     alt="Time">
                                            </div>
                                            <span class="content">{{$post->type->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="icon-box">
                                            <div class="icon location">
                                                <img src="{{asset('jobsldn/images/icons/ic-shopping-wallet.svg')}}"
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
@endsection