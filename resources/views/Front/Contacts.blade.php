@extends('FrontLayout.index')
@section('content')
    <!-- Page banner-->
    <section class="page-banner py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-2 order-md-1">
                    <h2 class="page-banner__title">Contacts</h2>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <div class="page-banner__image"><img src="{{asset('assets/images/contact/header.svg')}}"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-banner-end-->

    <!-- Contact info-->
    <section class="contact py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h6>Our Office</h6>
                    <small>425 Berry Street, CA 93584</small>
                </div>
                <div class="col-md-3">
                    <h6>Email</h6>
                    <small>info@domain.com</small>
                </div>
                <div class="col-md-3">
                    <h6>Phone</h6>
                    <small>(+00) - 00 0000000</small>
                </div>
                <div class="col-md-3">
                    <h6>Mobile</h6>
                    <small>(+00) - 00 0000000</small>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-end-->

    <!-- Contact form-->
    <section class="py-5">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-md-2">
                        <p class="font-weight-bold">We would love to hear from you!</p>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            {{--                            <label>Large Input</label>--}}
                            <input type="email" class="form-control form-control-lg" placeholder="Full Name">
                        </div>
                        <div class="form-group mb-4">
                            <input type="email" class="form-control form-control-lg" placeholder="Email">
                        </div>
                        <div class="form-group mb-4">
                            <input type="email" class="form-control form-control-lg" placeholder="Subject">
                        </div>
                        <div class="from-group mb-4">
                            <textarea class="form-control form-control-lg" rows="3"></textarea>
                        </div>

                        <div class="from-group mb-4">
                            <a class="btn btn-primary-ldn-outline" href="#"><small>Upload attachment</small>
                                <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="21.5" viewBox="0 0 17.5 21.5">
                                    <g id="ic-actions-add-file" transform="translate(0.75 0.75)">
                                        <line id="Line_1" data-name="Line 1" x1="8" transform="translate(4 11.13)"
                                              fill="none" stroke="#56bb37" stroke-linecap="round" stroke-linejoin="bevel"
                                              stroke-width="1.5"/>
                                        <line id="Line_2" data-name="Line 2" y1="8" transform="translate(8 7.13)"
                                              fill="none" stroke="#56bb37" stroke-linecap="round" stroke-linejoin="bevel"
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
                            {{--                    <div class="from-group mb-4">--}}
                            {{--                        <input class="btn btn-primary-ldn-outline" type="file" >--}}
                            {{--                    </div>--}}
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary-ldn btn-block" ><small>Send</small></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- contact-form-end-->
@endsection