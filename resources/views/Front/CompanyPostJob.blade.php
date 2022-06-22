@extends('FrontLayout.index')
@section('content')
    <!-- Page banner-->
    <section class="page-banner py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-2 order-md-1">
                    <h2 class="page-banner__title">Post a new job for
                        free now!</h2>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <div class="page-banner__image"><img src="{{asset('assets/images/contact/header.svg')}}"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-banner-end-->

    <!-- Post job form-->
    <section class="py-5">
        <div class="container">
            <div class="row pb-0 pb-md-5">
                <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                    <h6 class="mb-1">Summary</h6>
                    <small class="text-muted mb-4 mb-md-0">Write about the desired job, it is
                        recommended that this be brief</small>
                </div>

                <div class="col-md-9 pb-5">
                    <div class="row">
                        <div class="from-group mb-4 col-md-12 py-3">
                            <input class="form-control form-control-lg" type="text" placeholder="First Name *" required>
                        </div>
                        <div class="from-group mb-4 col-md-12 py-3">
                            <textarea class="form-control form-control-lg" name="summery" id="" cols="30"
                                      rows="8"></textarea>
                        </div>
                        <div class="col-md-7  from-group">
                            <a class="btn btn-primary-ldn-outline" href="#"><small>Upload attachment</small>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="21.5"
                                     viewBox="0 0 17.5 21.5">
                                    <g id="ic-actions-add-file" transform="translate(0.75 0.75)">
                                        <line id="Line_1" data-name="Line 1" x1="8" transform="translate(4 11.13)"
                                              fill="none" stroke="#56bb37" stroke-linecap="round"
                                              stroke-linejoin="bevel"
                                              stroke-width="1.5"/>
                                        <line id="Line_2" data-name="Line 2" y1="8" transform="translate(8 7.13)"
                                              fill="none" stroke="#56bb37" stroke-linecap="round"
                                              stroke-linejoin="bevel"
                                              stroke-width="1.5"/>
                                        <path id="Path_1" data-name="Path 1"
                                              d="M14.86,2H6A2,2,0,0,0,4,4V20a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2V8.92a.94.94,0,0,0-.18-.57L15.67,2.43A1,1,0,0,0,14.86,2Z"
                                              transform="translate(-4 -2)" fill="none" stroke="#56bb37"
                                              stroke-linecap="round" stroke-linejoin="bevel" stroke-width="1.5"
                                              fill-rule="evenodd"/>
                                    </g>
                                </svg>
                            </a>
                            <div class="row">
                                <div class="col-4 ml-3">
                                    <small class="text-muted" style="font-size: 65%">Only PDF allowed to upload it.
                                        Maximum file size: 10 MB
                                    </small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <hr class="mt-5">
                </div>

            </div>
            <div class="row pb-0 pb-md-5">
                <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                    <h6 class="mb-1">Summary</h6>
                    <small class="text-muted mb-4 mb-md-0">Write about the desired job, it is
                        recommended that this be brief</small>
                </div>

                <div class="col-md-9 pb-5">
                    <div class="row">
                        <div class="from-group mb-4 col-md-6 py-3">
                            <input class="form-control form-control-lg" type="text" placeholder="First Name *" required>
                        </div>

                        <div class="from-group mb-4 col-md-6 py-3">
                            <input class="form-control form-control-lg" type="text" placeholder="First Name *" required>
                        </div>

                        <div class="from-group mb-4 col-md-6 py-3">
                            <input class="form-control form-control-lg" type="text" placeholder="First Name *" required>
                        </div>

                        <div class="from-group mb-4 col-md-6 py-3">
                            <input class="form-control form-control-lg" type="text" placeholder="First Name *" required>
                        </div>

                        <div class="from-group mb-4 col-md-6 py-3">
                            <input class="form-control form-control-lg" type="text" placeholder="First Name *" required>
                        </div>

                        <div class="from-group mb-4 col-md-6 py-3">
                            <input class="form-control form-control-lg" type="text" placeholder="First Name *" required>
                        </div>

                        <div class="from-group mb-4 col-md-12 py-3">
                            <div class="row" style="background-color: #dcdcdc">
                                <div class="col-md-6 order-2 order-md-1">
                                    <h2 class="page-banner__title">Super Post</h2>
                                    <p class="">There is no need to keep your post lost among thousands
                                        of job posts. Now you can publish this ad to have priority on
                                        these pages for 5 days for £16.99 only - Excluding VAT.</p>
                                    <input class="" type="checkbox">Make this post as Super Post.
                                </div>
                                <div class="col-md-6 order-1 order-md-2">
                                    <div class="page-banner__image"><img
                                                src="{{asset('assets/images/contact/header.svg')}}"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <hr class="mt-5">
                </div>

            </div>
        </div>
    </section>
    <!-- post-job-form-end-->
@endsection