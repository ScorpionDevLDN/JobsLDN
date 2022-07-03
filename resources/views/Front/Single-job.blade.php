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
                                <a class="btn ayaTst p-2 px-2 mt-3" href="{{route('download',1)}}">
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
                                                        class="text-dark"><small>/{{$post->per->per}}</small></span>
                                            </div>
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
                    @if(auth()->guard('job_seekers')->check())
                        @if($created_at)
                            <h6 class="mb-4 mt-4 text-danger mt-md-0 text-center text-md-left">This job is no longer
                                available</h6>
                        @else
                            <h6 class="mb-4 mt-4 mt-md-0 text-center text-md-left">Apply Now</h6>
                            <form action="{{route('apply',$post->id)}}" method="POST">
                                @csrf
                                <select class="js-example-basic-single" name="ApplyForJobCV">
                                    <option selected="true" disabled="disabled">Select your CV</option>
                                    @foreach($cvs as $cv)
                                        <option value="{{$cv->id}}">{{$cv->cv_name}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary px-5 py-2 btn-block mt-3" type="submit">Apply now
                                </button>
                            </form>
                    @endif
                @endif
                <!-- single job actions-->
                    <h4 class="mt-5 text-center text-md-left">Interesting?</h4>
                    <div class="copy-link mt-3">

                        <input disabled class="form-control" type="text" value="{{request()->url()}}" id="myInput">
                        <a onclick="myFunctionCopy()"><img src="{{asset('assets/images/icons/copy.svg')}}"></a>
                    </div>
                    <div class="mt-3">
                        @if(session('msg'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <small>{{session('msg')}}</small>
                            </div>
                        @endif

                        @if($bookmarked)
                            <a class="mr-3 btn btn-icon ayaTst btn-circle btn-facebook"
                               href="{{route('bookmark',$post->id)}}">
                                <i class="far fa-star"></i>
                            </a>
                        @endif
                    </div>
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
                @foreach($similar as $post)
                    <div class="col-md-3">
                        <div class="featured-jobs__job">
                            <div class="featured-jobs__job-bookmark"></div>
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
                                                                                 src="{{asset('assets/images/home/wallet.svg')}}"><small><span
                                                class="from main-color">{{$post->salary}}</span><span
                                                class="to main-color"></span>
                                        <span class="period text-muted"><small>/{{$post->per->per}}</small></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="featured-jobs__job-action py-2 px-md-3 text-center text-md-left"><a
                                    class="btn btn-block btn-primary-ldn" href="{{route('job_details',$post->id)}}">More
                                Details</a></div>
                    </div>
                @endforeach
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

        function myFunctionCopy() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 100;
            toastr.info('text copied');
            console.log('copied')
        }
    </script>


@endsection