@php
    $menu = 'jobs';
@endphp
@extends('frontend.app.layout')
@push('styles')
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.min.css')}}">
@endpush

@push('scripts')
    <script defer src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
    <!-- Jquery UI Touch Punch -->
    <script defer src="{{asset('frontend/js/jquery.ui.touch-punch.min.js')}}"></script>
@endpush
@section('content')
    <section class="page-banner" id="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h1 class="text-center text-lg-start py-5 py-lg-0">A lot of small businesses
                        turn their ideas into reality.
                    </h1>
                </div>
                <div class="col-12 col-lg-6 text-end">
                    <img src="{{asset('frontend/images/page-banners/jobs_banner.svg')}}" alt="Girl" class="jobs-banner">
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Banner Section -->
    <!-- Start Jobs Section -->
    @if($posts->count()>0)
        <section class="jobs pt-0 position-static" id="jobs">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xxl-3">
                        <div class="search-filter" id="search-filter">
                            <!-- Back Button -->
                            <div class="back-filter d-flex d-xxl-none align-items-center gap-1" id="back-filter">
                                <ion-icon name="chevron-back-outline"></ion-icon>
                                <p>Back</p>
                            </div>
                            <div class="section-heading">
                                <h5>Search Filter</h5>
                            </div>
                            <form action="{{route('posts.index')}}" method="get">
                                <div class="row">
                                    <div class="col-12 wow animate animate__fadeInDown animation-delay-1">
                                        <select class="select-2-select filter-input" name="category">
                                            <option selected="true" disabled>Category</option>
                                            @foreach($categories as $category)
                                                <option {{\request()->category==$category->id ? 'selected' : ""}} value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 wow animate animate__fadeInDown animation-delay-2">
                                        <select class="select-2-select filter-input" name="city">
                                            <option selected="true" disabled>City</option>
                                            @foreach($cities as $city)
                                                <option {{\request()->city==$city->id ? 'selected' : ""}} value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 wow animate animate__fadeInDown animation-delay-3">
                                        <select class="select-2-select filter-input" name="type">
                                            <option selected="true" disabled>Type</option>
                                            @foreach($types as $type)
                                                <option {{\request()->type==$type->id ? 'selected' : ""}} value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 wow animate animate__fadeInDown animation-delay-4">
                                        <input type="text" name="keywords" placeholder="Keywords: Consultant"
                                               class="form-control filter_keywords" id="filter_keywords">
                                    </div>
                                    <div class="col-12 wow animate animate__fadeInDown animation-delay-6 salary-range-slider">
                                        <label for="amount">Salary:</label>
                                        <input type="text" id="amount" readonly disabled>
                                        <div id="salary-slider-range"></div>
                                    </div>
                                    <div class="col-12 wow animate animate__fadeInDown animation-delay-7">
                                        @if(request()->has('category')  || request()->has('city') || request()->has('type') || request()->has('keywords') || request()->has('salary'))
                                            <a href="{{route('posts.index')}}" class="button filter_on px-4">Reset</a>
                                        @else
                                            <button type="submit" class="button">Apply</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-xxl-9">
                        @include('frontend.partial.flash')
                        <div class="jobs-top row">
                            <div class="col-12  col-xxl-8">
                                <div class="section-heading">
                                    <h2>Jobs</h2>
                                </div>
                            </div>
                            <div class="col-6 col-xxl-4">
                                <form action="{{route('posts.index')}}" method="get">
                                    <div class="sort-box d-flex justify-content-end">
                                        <select class="select-2-select sort-input" name="sort_field"
                                                onchange="this.form.submit()">
                                            <option selected disabled>Sort By</option>
                                            <option {{\request()->sort_field == 'title' ? 'selected' : ''}} value="title">
                                                Title
                                            </option>
                                            <option {{\request()->sort_field == 'type_id' ? 'selected' : ''}} value="type">
                                                Type
                                            </option>
                                            <option {{\request()->sort_field == 'salary' ? 'selected' : ''}} value="salary">
                                                Salary
                                            </option>
                                            <option {{\request()->sort_field == 'created_at' ? 'selected' : ''}} value="created_at">
                                                Newest
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 d-block d-xxl-none text-end mb-5">
                                <button class="button filter-button" type="button" id="filter-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         version="1.1" width="256" height="256" viewBox="0 0 256 256"
                                         xml:space="preserve">
                              <defs>
                              </defs>
                                        <g transform="translate(128 128) scale(0.72 0.72)">
                                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                               transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)">
                                                <path d="M 85.813 59.576 H 55.575 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 30.237 c 1.657 0 3 1.343 3 3 S 87.47 59.576 85.813 59.576 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 48.302 66.849 c -5.664 0 -10.272 -4.608 -10.272 -10.272 c 0 -5.665 4.608 -10.273 10.272 -10.273 c 5.665 0 10.273 4.608 10.273 10.273 C 58.575 62.24 53.967 66.849 48.302 66.849 z M 48.302 52.303 c -2.356 0 -4.272 1.917 -4.272 4.273 c 0 2.355 1.917 4.272 4.272 4.272 c 2.356 0 4.273 -1.917 4.273 -4.272 C 52.575 54.22 50.658 52.303 48.302 52.303 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 41.029 59.576 H 4.188 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 36.842 c 1.657 0 3 1.343 3 3 S 42.686 59.576 41.029 59.576 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 85.813 36.424 h -57.79 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 57.79 c 1.657 0 3 1.343 3 3 S 87.47 36.424 85.813 36.424 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 20.75 43.697 c -5.665 0 -10.273 -4.608 -10.273 -10.273 s 4.608 -10.273 10.273 -10.273 s 10.273 4.608 10.273 10.273 S 26.414 43.697 20.75 43.697 z M 20.75 29.151 c -2.356 0 -4.273 1.917 -4.273 4.273 s 1.917 4.273 4.273 4.273 s 4.273 -1.917 4.273 -4.273 S 23.105 29.151 20.75 29.151 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 13.477 36.424 H 4.188 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 9.289 c 1.657 0 3 1.343 3 3 S 15.133 36.424 13.477 36.424 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 57.637 13.273 H 4.188 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 53.449 c 1.657 0 3 1.343 3 3 S 59.294 13.273 57.637 13.273 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 64.909 20.546 c -5.664 0 -10.272 -4.608 -10.272 -10.273 S 59.245 0 64.909 0 c 5.665 0 10.273 4.608 10.273 10.273 S 70.574 20.546 64.909 20.546 z M 64.909 6 c -2.355 0 -4.272 1.917 -4.272 4.273 s 1.917 4.273 4.272 4.273 c 2.356 0 4.273 -1.917 4.273 -4.273 S 67.266 6 64.909 6 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 85.813 13.273 h -13.63 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 13.63 c 1.657 0 3 1.343 3 3 S 87.47 13.273 85.813 13.273 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10;  fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 85.813 82.728 h -57.79 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 57.79 c 1.657 0 3 1.343 3 3 S 87.47 82.728 85.813 82.728 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10;  fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 20.75 90 c -5.665 0 -10.273 -4.608 -10.273 -10.272 c 0 -5.665 4.608 -10.273 10.273 -10.273 s 10.273 4.608 10.273 10.273 C 31.022 85.392 26.414 90 20.75 90 z M 20.75 75.454 c -2.356 0 -4.273 1.917 -4.273 4.273 c 0 2.355 1.917 4.272 4.273 4.272 s 4.273 -1.917 4.273 -4.272 C 25.022 77.371 23.105 75.454 20.75 75.454 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                                <path d="M 13.477 82.728 H 4.188 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 9.289 c 1.657 0 3 1.343 3 3 S 15.133 82.728 13.477 82.728 z"
                                                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;"
                                                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                                            </g>
                                        </g>
                              </svg>
                                </button>
                            </div>
                        </div>
                        <div class="row jobs-boxes">
                            @foreach($posts as $post)
                                <div class="col-12">
                                    <!-- Start Job Box -->
                                    <div class="job-box wow animate animate__fadeInDown animation-delay-1">
                                        <a href="{{route('job_details',[$post->id,\Str::slug($post->title)])}}">
                                            <div class="job-provider">
                                                <img src="{{$post->company->photo}}" alt="avatar">
                                            </div>
                                        </a>
                                        <div class="job-info">
                                            <h6 class="job-place">{{$post->company->company_name}}</h6>
                                            <a href="{{route('job_details',[$post->id,\Str::slug($post->title)])}}">
                                                <h3 class="position">
                                                    {{$post->title}}
                                                </h3>
                                            </a>
                                            <div class="icons">
                                                <div class="icon-box">
                                                    <div class="icon location">
                                                        <img src="{{asset('frontend/images/icons/ic-contact-map-pin.svg')}}"
                                                             alt="Location">
                                                    </div>
                                                    <span class="content">{{$post->city->name}}</span>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon salary">
                                                        <img src="{{asset('frontend/images/icons/ic-shopping-wallet.svg')}}"
                                                             alt="Salary">
                                                    </div>
                                                    <span class="content">{{$post->currency->symbol}}{{$post->salary}} <span>/ {{$post->per->per}}</span></span>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon time">
                                                        <img src="{{asset('frontend/images/icons/ic-furniture-light.svg')}}"
                                                             alt="Time">
                                                    </div>
                                                    <span class="content">{{$post->type->name}}</span>
                                                </div>
                                                <div class="icon-box">
                                                    <div class="icon published-time">
                                                        <img src="{{asset('frontend/images/icons/time.svg')}}"
                                                             alt="Time">
                                                    </div>
                                                    <span class="content">{{$post->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-actions">
                                            {{-- {{route('job_details',[$post->id,\Str::slug($post->title)])}} --}}
                                            <a href="{{route('job_details',[$post->id,\Str::slug($post->title)])}}" class="button">
                                                {{auth('job_seekers')->check() ? 'Apply now' : 'View this Job' }}
                                            </a>
                                            @if(auth('job_seekers')->check())
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
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Job Box -->
                                </div>
                            @endforeach
                        </div>
                        <!-- Start Jobs Pagination -->
                        {{ $posts->links('vendor.pagination.custom') }}
                        <!-- End Jobs Pagination -->
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="jobs pt-0 position-static" id="jobs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center text-danger">There are no posts to display yet</h3>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@foreach($posts as $post)
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
@endforeach
