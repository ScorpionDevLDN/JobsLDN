@extends('JobsLdn.Layout.index')
@section('content')

    <!-- Start Header -->
    @include('JobsLdn.Layout.nav')
    <!-- End Header -->

    <!-- Start Hero Section -->
    <section class="hero" id="hero">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide text-center text-sm-start">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="slide-content">
                                        <div>
                                            <h1 class="wow animate animate__fadeInDown">{{$slider->text}}</h1>
                                            <p class="wow animate animate__fadeInDown">
                                                {{$slider->description}}
                                            </p>
                                            <a href="{{$slider->link}}"
                                               class="button wow animate animate__fadeInUp">{{$slider->cta}}</a>
                                        </div>
                                        <div class="slide-icons d-none d-md-block">
                                            <div class="row">
                                                <div class="col-6 col-sm-4">
                                                    <div class="icon-box wow animate animate__fadeInUp">
                                                        <div class="icon">
                                                            <img src="{{asset('jobs/images/icons/ic-actions-emultiple-edit.svg')}}"
                                                                 alt="Icon">
                                                        </div>
                                                        <div class="content">
                                                            <h6>{{$posts_count}}</h6>
                                                            <span>Jobs Posted</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-4">
                                                    <div class="icon-box wow animate animate__fadeInUp">
                                                        <div class="icon">
                                                            <img src="{{asset('jobs/images/icons/ic-actions-bag.svg')}}"
                                                                 alt="Icon">
                                                        </div>
                                                        <div class="content">
                                                            <h6>{{$companies}}</h6>
                                                            <span>Companies</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-4">
                                                    <div class="icon-box wow animate animate__fadeInUp">
                                                        <div class="icon">
                                                            <img src="{{asset('jobs/images/icons/ic-folder-user.svg')}}"
                                                                 alt="Icon">
                                                        </div>
                                                        <div class="content">
                                                            <h6>{{$job_seekers}}</h6>
                                                            <span>Job Seekers</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 d-none d-xl-block">
                                    <img src="{{$slider->image}}" alt="Person"
                                         class="wow animate animate__fadeInRight">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="swiper-pagination"></div>

    </section>
    <!-- End Hero Section -->

    <!-- Start Discover Section -->
    <section class="discover" id="discover">
        <div class="container">
            <div class="section-heading text-center wow animate animate__fadeInDown">
                <h2>Discover now</h2>
            </div>
            <form action="{{route('posts.index')}}" method="get" class="discover-form">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-lg-3 wow animate animate__fadeInLeft">
                        <select class="select-2-select discover-input" name="category">
                            <option selected="true" disabled="disabled">Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-3 wow animate animate__fadeInLeft">
                        <select class="select-2-select discover-input" name="type">
                            <option selected="true" disabled="disabled">Type</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-3 wow animate animate__fadeInLeft">
                        <select class="select-2-select discover-input" name="city">
                            <option selected="true" disabled="disabled">City</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-3 col-button wow animate animate__zoomIn">
                        <div class="text-center text-md-left">
                            <button class="button" type="submit">Go</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
    <!-- End Discover Section -->

    <!-- Start Featured Jobs -->
    <section class="featured-jobs" id="featured-jobs">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Featured Jobs</h2>
            </div>
            <div class="row jobs-boxes">
                @foreach($posts as $post)
                    @if($post->is_super_post)
                        <div class="col-12 col-md-6 col-xl-4">
                            <!-- Start Featured Job Box -->
                            <div class="job-box featured wow animate animate__fadeInDown">
                                <div class="featured-icon">
                                    <img src="{{asset('jobs/images/icons/featured-job.svg')}}" alt="Featured Icon">
                                </div>
                                <h6 class="job-place">{{$post->company->company_name}}
                                    ,{{$post->city->name}}</h6>
                                <h3 class="position">{{$post->title}}</h3>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="icon-box">
                                            <div class="icon location">
                                                <img src="{{asset('jobs/images/icons/ic-contact-map-pin.svg')}}"
                                                     alt="Location">
                                            </div>
                                            <span class="content">{{$post->city->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="icon-box">
                                            <div class="icon salary">
                                                <img src="{{asset('jobs/images/icons/ic-shopping-wallet.svg')}}"
                                                     alt="Salary">
                                            </div>
                                            <span class="content">{{$post->salary}}{{$post->currency->symbol}} / <span>{{$post->per->per}}</span></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="icon-box">
                                            <div class="icon time">
                                                <img src="{{asset('jobs/images/icons/ic-furniture-light.svg')}}"
                                                     alt="Time">
                                            </div>
                                            <span class="content">{{$post->type->name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('job_details',$post->id)}}" class="button w-100 text-center more-details">More Details</a>
                            </div>
                            <!-- End Featured Job Box -->
                        </div>
                    @else
                        <div class="col-12 col-md-6 col-xl-4">
                            <!-- Start Featured Job Box -->
                            <div class="job-box wow animate animate__fadeInDown">
                                <h6 class="job-place">{{$post->company->company_name}}
                                    ,{{$post->city->name}}</h6>
                                <h3 class="position">{{$post->title}}</h3>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="icon-box">
                                            <div class="icon location">
                                                <img src="{{asset('jobs/images/icons/ic-contact-map-pin.svg')}}"
                                                     alt="Location">
                                            </div>
                                            <span class="content">{{$post->city->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="icon-box">
                                            <div class="icon salary">
                                                <img src="{{asset('jobs/images/icons/ic-shopping-wallet.svg')}}"
                                                     alt="Salary">
                                            </div>
                                            <span class="content">{{$post->salary}}{{$post->currency->symbol}} / <span>{{$post->per->per}}</span></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="icon-box">
                                            <div class="icon time">
                                                <img src="{{asset('jobs/images/icons/ic-furniture-light.svg')}}"
                                                     alt="Time">
                                            </div>
                                            <span class="content">{{$post->type->name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('job_details',$post->id)}}" class="button w-100 text-center more-details">More Details</a>
                            </div>
                            <!-- End Featured Job Box -->
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="all-jobs text-center">
                <a href="{{asset('posts')}}" class="button gray all-jobs-button" type="submit">All Jobs</a>
            </div>
        </div>
    </section>
    <!-- End Featured Jobs -->

    <!-- Start Our Partners Section -->
    <section class="our-partners" id="our-partners">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Partners</h2>
            </div>
            <div class="swiper partnersSwiper wow animate animate__fadeInUp">
                <div class="swiper-wrapper">
                    @foreach($partners as $partner)
                    <div class="swiper-slide">
                        <img src="{{$partner->image}}" alt="Partner">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Partners Section -->

    <!-- Start Call to Action Section -->
    <section class="call-to-action" id="call-to-action">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 d-none d-lg-block">
                    <img src="{{$advertise->image}}" alt="Girl"
                         class="wow animate animate__fadeIn">
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="wow animate animate__fadeInUp">{{$advertise->text}}</h2>
                    <a target="_blank" href="{{$advertise->url}}" class="button wow animate animate__fadeInDown">{{$advertise->cta}}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call to Action Section -->

@endsection