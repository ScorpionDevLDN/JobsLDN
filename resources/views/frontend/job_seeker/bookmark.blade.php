@php
$menu = 'myBookmarks';
@endphp
@extends('frontend.app.parts.layout')
@section('content')
    <!-- Start Horizontal bar -->
    @include('frontend.app.parts.job_seeker_horizental')

    <section class="profile-content bookmarks" id="bookmarks">
        <div class="container">
            <div class="section-heading">
                @include('frontend.partial.flash')
                <h1>Bookmarks</h1>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-xxl-3">
                    <div class="account-col mb-5 mb-xxl-0">
                        <h3>You have {{ $posts->count() }} saved jobs</h3>
                    </div>
                </div>
                <div class="col-12 col-xxl-9">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <div class="row jobs-boxes">
                                <div class="col-12 mb-4">
                                    <!-- Start Job Box -->
                                    <div class="job-box animation-delay-1 wow animate animate__fadeInDown">
                                        <div class="job-provider">
                                            <img src="{{ $post->job->company->photo }}" alt="avatar">
                                        </div>
                                        <div class="job-info">
                                            <h6 class="job-place">{{ $post->job->company->company_name }}
                                                ,{{ $post->job->city->name }}</h6>
                                            <h3 class="position">{{ $post->job->title }}</h3>
                                            <div class="icons">
                                                <div class="icon-box">
                                                    <div class="icon location">
                                                        <img src="{{ asset('frontend/images/icons/ic-contact-map-pin.svg') }}"
                                                            alt="Location">
                                                    </div>
                                                    <span class="content">{{ $post->job->city->name }}</span>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon salary">
                                                        <img src="{{ asset('frontend/images/icons/ic-shopping-wallet.svg') }}"
                                                            alt="Salary">
                                                    </div>
                                                    <span
                                                        class="content">{{ $post->job->currency->symbol }}{{ $post->job->salary }}
                                                        <span>/{{ $post->job->per->per }}</span></span>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon time">
                                                        <img src="{{ asset('frontend/images/icons/ic-furniture-light.svg') }}"
                                                            alt="Time">
                                                    </div>
                                                    <span class="content">{{ $post->job->type->name }}</span>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon published-time">
                                                        <img src="{{ asset('frontend/images/icons/time.svg') }}"
                                                            alt="Time">
                                                    </div>
                                                    <span class="content">{{ $post->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-actions">
                                            @if (auth('job_seekers')->user()->myjob($post->job->id))
                                                <a class="button" data-bs-toggle="modal"
                                                    data-bs-target="#retract">Retract</a>
                                            @else
                                                <a href="{{ route('job_details', [$post->id, \Str::slug($post->title)]) }}"
                                                    class="button">Apply</a>
                                            @endif
                                            <div class="favorite-box active">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#unbookmark{{ $post->job->id }}">
                                                    <svg id="ic-actions-star" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24">
                                                        <rect id="Rectangle_160" data-name="Rectangle 160" width="24"
                                                            height="24" fill="none" />
                                                        <g id="ic-actions-star-2" data-name="ic-actions-star"
                                                            transform="translate(-0.005 -0.015)">
                                                            <path id="Path_38" data-name="Path 38"
                                                                d="M11,3.19a1.08,1.08,0,0,1,2.06,0l1.86,5.72h6a1.09,1.09,0,0,1,.64,2l-4.87,3.53,1.86,5.73a1.08,1.08,0,0,1-1.67,1.21L12,17.81,7.13,21.35a1.08,1.08,0,0,1-1.67-1.21l1.86-5.73L2.45,10.88a1.09,1.09,0,0,1,.64-2h6Z"
                                                                fill="none" stroke="#2923ff" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="1.5"
                                                                fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Job Box -->
                                </div>
                            </div>
                        @endforeach
                        @if ($posts->hasPages())
                            <div class="pagination-wrapper">
                                {{ $posts->links('vendor.pagination.custom') }}
                            </div>
                        @endif
                    @endif
                </div>

            </div>
        </div>
    </section>
    <div class="modal fade" id="retract" tabindex="-1" aria-labelledby="retractLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="retractLabel">Notification</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center"> Are you sure you want to retract your application? </h5>
                </div>
                <div class="modal-footer">
                    @if (isset($post))
                        <a href="{{ route('retract', $post->id) }}" class="button mx-auto" type="button">Yes</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Retract Success -->
    <div class="modal fade" id="retract-success" tabindex="-1" aria-labelledby="retractSuccessLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="retractSuccessLabel">Notification</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>
                <div class="modal-body">
                    <ion-icon name="checkmark-outline"></ion-icon>
                    <h5 class="text-center">Your job application was retracted</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Retract Faild -->
    <div class="modal fade" id="retract-faild" tabindex="-1" aria-labelledby="retractFaildLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="retractFaildLabel">Notification</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>
                <div class="modal-body">
                    <ion-icon name="close-outline"></ion-icon>
                    <h5 class="text-center">We can’t complete this action at this time</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modales -->
@endsection

@foreach ($posts as $post)
    <div class="modal fade" id="unbookmark{{ $post->job->id }}" tabindex="-1" aria-labelledby="retractLabel"
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
                    <h5 class="text-center"> Remove {{ $post->job->title }} from Bookmark?</h5>
                </div>
                <div class="modal-footer">
                    @if (isset($post))
                        <a href="{{ route('un_bookmark', $post->job->id) }}" class="button mx-auto"
                            type="button">Yes</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
