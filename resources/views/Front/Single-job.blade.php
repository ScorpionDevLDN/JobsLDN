@extends('FrontLayout.index')
@section('content')
    <!-- Single job header-->
    <section class="single-job bg-light py-5 text-center text-md-left">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 mt-4 mt-md-0">
                    <div class="single-job__details text-center text-md-left">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="partners__item" style="margin-left: -88px">
                                    <div class="partners__item-image"><img
                                                src="{{asset('assets/images/Job_Details/header_img.svg')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted mb-0">{{$post->company->company_name}},{{$post->city->name}}</p>
                                <h4>{{$post->title}}</h4>
                                <a class="btn ayaTst p-2 px-2 mt-3" href="{{route('download',1)}}" >
                                    <span class="svg-icon svg-icon-2x">
                                    <svg id="ic-actions2-download" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24">
  <rect id="Rectangle_132" data-name="Rectangle 132" width="24" height="24" fill="none"/>
  <g id="ic-actions-download" transform="translate(2 -0.66)">
    <path id="Path_13" data-name="Path 13" d="M22,11.66v8a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2v-8"
          transform="translate(-2 0.66)" fill="none" stroke="#56bb37" stroke-linecap="round" stroke-linejoin="round"
          stroke-width="1.5"/>
    <line id="Line_25" data-name="Line 25" y2="11.499" transform="translate(10 3)" fill="none" stroke="#56bb37"
          stroke-linecap="round" stroke-linejoin="bevel" stroke-width="1.5"/>
    <path id="Path_14" data-name="Path 14" d="M7.22,14.09l4.11,4.1a1,1,0,0,0,1.41,0l4-4"
          transform="translate(-2 -3.981)" fill="none" stroke="#56bb37" stroke-linecap="round" stroke-linejoin="bevel"
          stroke-width="1.5"/>
  </g>
</svg>

                                    </span>
                                    <span>Download Job Details</span></a>
                                <!-- job details info-->
                                <div class="single-job__details-info mt-5">
                                    <div class="row">
                                        <div class="col-md-3 single-job__details-info-item">
                                            <div class="single-job__details-info-item-icon"><img
                                                        src="{{asset('assets/images/home/location.svg')}}"></div>
                                            <div class="single-job__details-info-item-text"><span
                                                        class="text-muted"><small>Location</small></span><small
                                                        class="main-color">{{$post->city->name}}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3 single-job__details-info-item">
                                            <div class="single-job__details-info-item-icon"><img
                                                        src="{{asset('assets/images/home/full-time.svg')}}"></div>
                                            <div class="single-job__details-info-item-text"><span
                                                        class="text-muted"><small>Type</small></span><small
                                                        class="main-color">{{$post->type->name}}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3 single-job__details-info-item">
                                            <div class="single-job__details-info-item-icon"><img
                                                        src="{{asset('assets/images/home/wallet.svg')}}"></div>
                                            <div class="single-job__details-info-item-text"><span
                                                        class="text-muted"><small>Salary</small></span><small
                                                        class="main-color">{{$post->salary}}</small><span
                                                        class="text-dark"><small>/{{$post->per->per}}</small></span></div>
                                        </div>
                                        <div class="col-md-3 single-job__details-info-item">
                                            <div class="single-job__details-info-item-icon"><img
                                                        src="{{asset('assets/images/home/time.svg')}}"></div>
                                            <div class="single-job__details-info-item-text"><span
                                                        class="text-muted"><small>Date Posted</small></span><small
                                                        class="main-color">{{$post->created_at->diffForHumans()}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 order-1 order-md-2">
                    <div class="single-job__image"><img src="{{asset('assets/images/Job_Details/header_img.svg')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- single-job-header-end-->

    <!-- Single job description-->
    <section class="py-5 single-job__description">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="mb-3 text-center text-md-left">Job Description</h4>
                    <p>
                        {{$post->summery}}
                    </p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <h6 class="mb-4 mt-4 mt-md-0 text-center text-md-left">Apply Now</h6>
                    <form action="#" method="POST">
                        <select class="js-example-basic-single" name="ApplyForJobCV">
                            <option>Select your CV</option>
                            <option>CV 1</option>
                            <option>CV 2</option>
                            <option>CV 3</option>
                        </select>
                        <button class="btn btn-primary px-5 py-2 btn-block mt-3" type="submit">Apply now</button>
                    </form>
                    <!-- single job actions-->
                    <h4 class="mt-5 text-center text-md-left">Interesting?</h4>
                    <div class="copy-link mt-3">
                        <input class="form-control" type="text"
                               value="https://jobs.ldn.io/jobs/super-project-manager"><a href="#"><img
                                    src="{{asset('assets/images/icons/copy.svg')}}"></a>
                    </div>
                    <div class="share-link mt-5">
                        <a class="mr-3" href="#"><img src="{{asset('assets/images/icons/star.svg')}}"></a>
                        <a href="#"><img src="{{asset('assets/images/icons/share.svg')}}"></a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- single-job-description-end-->

    <!-- Similar jobs-->
    <section class="py-5">
        <div class="container">
            <h4 class="text-center text-md-left">Similar Jobs</h4>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="featured-jobs__job">
                        <div class="featured-jobs__job-bookmark"></div><small class="featured-jobs__job-employer text-muted">The Waldorf Hilton, London</small>
                        <h6 class="featured-jobs__job-title text-dark">Co-Founder Roles</h6>
                        <div class="featured-jobs__job-info" style="margin-bottom: -40px;margin-top: -10px">
                            <div class="featured-jobs__job-info-description">
                                <div><img class="icon" src="{{asset('assets/images/home/location.svg')}}"><small><span class="main-color">London</span></small></div>
                                <div><img class="icon" src="{{asset('assets/images/home/full-time.svg')}}"><small><span class="main-color">Full-Time</span></small></div>
                            </div>
                            <div class="featured-jobs__job-info-salary"><img class="icon" src="{{asset('assets/images/home/wallet.svg')}}"><small><span class="from main-color">$2000 - </span><span class="to main-color">$3000</span>
                                    <span class="period text-muted"><small>/Monthly</small></span></small></div>
                        </div>
                    </div>
                    <div class="featured-jobs__job-action py-2 px-md-3 text-center text-md-left"><a class="btn btn-block btn-primary-ldn" href="#">More Details</a></div>
                </div>
                <div class="col-md-3">
                    <div class="featured-jobs__job">
                        <div class="featured-jobs__job-bookmark"></div><small class="featured-jobs__job-employer text-muted">The Waldorf Hilton, London</small>
                        <h6 class="featured-jobs__job-title text-dark">Co-Founder Roles</h6>
                        <div class="featured-jobs__job-info" style="margin-bottom: -40px;margin-top: -10px">
                            <div class="featured-jobs__job-info-description">
                                <div><img class="icon" src="{{asset('assets/images/home/location.svg')}}"><small><span class="main-color">London</span></small></div>
                                <div><img class="icon" src="{{asset('assets/images/home/full-time.svg')}}"><small><span class="main-color">Full-Time</span></small></div>
                            </div>
                            <div class="featured-jobs__job-info-salary"><img class="icon" src="{{asset('assets/images/home/wallet.svg')}}"><small><span class="from main-color">$2000 - </span><span class="to main-color">$3000</span>
                                    <span class="period text-muted"><small>/Monthly</small></span></small></div>
                        </div>
                    </div>
                    <div class="featured-jobs__job-action py-2 px-md-3 text-center text-md-left"><a class="btn btn-block btn-primary-ldn" href="#">More Details</a></div>
                </div>
                <div class="col-md-3">
                    <div class="featured-jobs__job">
                        <div class="featured-jobs__job-bookmark"></div><small class="featured-jobs__job-employer text-muted">The Waldorf Hilton, London</small>
                        <h6 class="featured-jobs__job-title text-dark">Co-Founder Roles</h6>
                        <div class="featured-jobs__job-info" style="margin-bottom: -40px;margin-top: -10px">
                            <div class="featured-jobs__job-info-description">
                                <div><img class="icon" src="{{asset('assets/images/home/location.svg')}}"><small><span class="main-color">London</span></small></div>
                                <div><img class="icon" src="{{asset('assets/images/home/full-time.svg')}}"><small><span class="main-color">Full-Time</span></small></div>
                            </div>
                            <div class="featured-jobs__job-info-salary"><img class="icon" src="{{asset('assets/images/home/wallet.svg')}}"><small><span class="from main-color">$2000 - </span><span class="to main-color">$3000</span>
                                    <span class="period text-muted"><small>/Monthly</small></span></small></div>
                        </div>
                    </div>
                    <div class="featured-jobs__job-action py-2 px-md-3 text-center text-md-left"><a class="btn btn-block btn-primary-ldn" href="#">More Details</a></div>
                </div>
                <div class="col-md-3">
                    <div class="featured-jobs__job">
                        <div class="featured-jobs__job-bookmark"></div><small class="featured-jobs__job-employer text-muted">The Waldorf Hilton, London</small>
                        <h6 class="featured-jobs__job-title text-dark">Co-Founder Roles</h6>
                        <div class="featured-jobs__job-info" style="margin-bottom: -40px;margin-top: -10px">
                            <div class="featured-jobs__job-info-description">
                                <div><img class="icon" src="{{asset('assets/images/home/location.svg')}}"><small><span class="main-color">London</span></small></div>
                                <div><img class="icon" src="{{asset('assets/images/home/full-time.svg')}}"><small><span class="main-color">Full-Time</span></small></div>
                            </div>
                            <div class="featured-jobs__job-info-salary"><img class="icon" src="{{asset('assets/images/home/wallet.svg')}}"><small><span class="from main-color">$2000 - </span><span class="to main-color">$3000</span>
                                    <span class="period text-muted"><small>/Monthly</small></span></small></div>
                        </div>
                    </div>
                    <div class="featured-jobs__job-action py-2 px-md-3 text-center text-md-left"><a class="btn btn-block btn-primary-ldn" href="#">More Details</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- similar-jobs-end-->
@endsection

@section('js')
    <script>
        function showVal(newVal) {
            document.getElementById("valBox").innerHTML = newVal;
        }
    </script>
@endsection