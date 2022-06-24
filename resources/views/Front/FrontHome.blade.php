@extends('FrontLayout.index')
@section('content')
    <!-- Slider-->
    <div class="slider">
        <div class="owl-carousel owl-theme">
            @foreach($sliders as $slider)
                <div class="slider__item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex flex-column justify-content-center order-2 order-md-1">
                                <h6 class="slider__item-title">{{$slider->text}}</h6>
                                <div class="row">
                                    <div class="col-md-8">
                                        <small class="slider__item-content text-muted">{{$slider->description}}</small>
                                    </div>
                                </div>
                                <a class="mt-3 btn primary-button px-6 btn-py" target="_blank"
                                   href="{{$slider->link}}"><small>{{$slider->cta}}</small></a>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="slider__item-stats"><img
                                                    src="{{asset('assets/images/home/jobs-posted.svg')}}">
                                            <div class="slider__item-stats-figure">
                                                <h3><small>{{$posts_count}}K</small></h3><small><span
                                                            class="main-color">Jobs Posted</span></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="slider__item-stats"><img
                                                    src="{{asset('assets/images/home/companies.svg')}}">
                                            <div class="slider__item-stats-figure">
                                                <h3><small>{{$companies}}K</small></h3><small><span class="main-color">Companies</span></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="slider__item-stats"><img
                                                    src="{{asset('assets/images/home/jobs-posted.svg')}}">
                                            <div class="slider__item-stats-figure">
                                                <h3><small>{{$job_seekers}}K</small></h3><small><span
                                                            class="main-color">Job Seekers</span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 order-1 order-md-2">
                                <div class="slider__item-image"><img
                                            src="{{asset('assets/images/home/slider-image.svg')}}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- slider-end-->

    <!-- Discover now-->
    <section class="discover-now py-5 bg-light">
        <h2 class="section-title section-title--smaller section-title--half-margin">Discover now</h2>
        <div class="container">
            <form>
                <div class="row justify-content-center">
                    <div class="col-md-2 mb-5 mb-md-0">
                        <select class="js-example-basic-single" name="category">
                            <option class="tetas" value="all_categories">Category</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-5 mb-md-0">
                        <select class="js-example-basic-single" name="type">
                            <option value="all_categories">Type</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-5 mb-md-0">
                        <select class="js-example-basic-single" name="city">
                            <option value="all_categories">City</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-5 mb-md-0">
                        <div class="text-center text-md-left">
                            <button class="btn btn-primary px-5 py-2 py-md-3" type="submit">Go</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- discover-now-end-->

    <!-- Featured jobs-->
    <section class="featured-jobs py-5">
        <div class="container">
            <h2 class="section-title section-title--smaller section-title--half-margin">Featured jobs</h2>
            <div class="row">

                {{--start posts--}}
                @foreach($posts as $post)
                    <div class="col-md-3 mb-3">
                        <div class="featured-jobs__job">
                            @if($post->is_super_post)
                                <div class="featured-jobs__job-bookmark"><img
                                            src="{{asset('assets/images/icons/star-fill.svg')}}"></div>
                            @endif
                            <small class="featured-jobs__job-employer text-muted">{{$post->company->company_name}}
                                ,{{$post->city->name}}</small>
                            <h6 class="featured-jobs__job-title text-dark">{{$post->title}}</h6>
                            <div class="featured-jobs__job-info" style="margin-bottom: -40px;margin-top: -10px">
                                <div class="featured-jobs__job-info-description">
                                    <div><img class="icon"
                                              src="{{asset('assets/images/home/location.svg')}}"><small><span
                                                    class="main-color">{{$post->city->name}}</span></small></div>
                                    <div><img class="icon"
                                              src="{{asset('assets/images/home/full-time.svg')}}"><small><span
                                                    class="main-color">{{$post->type->name}}</span></small></div>
                                </div>
                                <div class="featured-jobs__job-info-salary"><img class="icon"
                                                                                 src="{{asset('assets/images/home/wallet.svg')}}"><small>
                                        <span class="from main-color">$2000 - </span>
                                        <span class="to main-color">$3000</span>
                                        <span class="period text-muted"><small>/{{$post->per->per}}</small></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="featured-jobs__job-action py-2 px-md-3 text-center text-md-left"><a
                                    class="btn btn-block btn-primary-ldn" href="#">More Details</a></div>
                    </div>
                @endforeach
            </div>
            <div class="text-center py-3 py-md-4"><a class="all-jobs btn px-5" href="{{asset('front/jobs')}}">All Jobs</a></div>
        </div>
    </section>
    <!-- featured-jobs-end-->

    <!-- Partners-->
    <section class="partners py-5">
        <div class="container">
            <h2 class="section-title section-title--smaller section-title--no-margin">Partners</h2>
            <div class="owl-carousel">
                <div class="partners__item">
                    <div class="partners__item-image"><img
                                src="https://logos-world.net/wp-content/uploads/2020/04/Samsung-Logo.png"></div>
                </div>
                <div class="partners__item">
                    <div class="partners__item-image"><img
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1200px-Amazon_logo.svg.png">
                    </div>
                </div>
                <div class="partners__item">
                    <div class="partners__item-image"><img
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/2560px-Google_2015_logo.svg.png">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- partners-end-->

    <!-- Best business-->
    <section class="general-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="general-section__image"><img src="{{asset('assets/images/home/best-businesses.svg')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="general-section__content">
                        <h2>The best businesses deserve the best people</h2><a class="btn btn-primary-ldn px-4"
                                                                               href="#">Advertise now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- best-business-end-->
@endsection