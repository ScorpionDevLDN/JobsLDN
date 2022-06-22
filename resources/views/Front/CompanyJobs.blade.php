@extends('FrontLayout.index')
@section('content')
    <!-- Profile page banner-->
    <section class="profile-page-banner">
        <div class="container">
            <div class="profile-page-banner__navbar">
                <ul>
                    <li><a href="profile-company.html">Profile</a></li>
                    <li class="active"><a href="profile-company-jobs.html">Jobs</a></li>
                    <li><a href="profile-company-notifications.html">Notifications</a></li>
                    <li><a href="" data-toggle="modal" data-target="#modalLogout">Logout</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- profile-page-banner-end-->

    <!-- Profile company jobs-->
    <div class="container" style="max-width: 1269px">
        <section class="profile py-5">
            <div class="profile__title-with-action">
                <h1 class="mb-4 text-center text-md-left">Jobs</h1>
                <div class="text-center text-md-right"><a class="btn btn-primary px-5" href="" data-toggle="modal"
                                                          data-target="#modalCreateJob">Post a job</a></div>
            </div>
            <div class="row">
                <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                    <h5 class="mb-1"><span>24</span> Jobs Created</h5>
                    <p class="text-muted mb-4 mb-md-0">The number of jobs you have created.</p>
                </div>
                <div class="col-md-9">
                    <div class="jobs__item">
                        {{--                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>--}}
                        <div class="jobs__item-details" style="margin-left: 20px"><small></small>
                            <h6>Senior Frontend Developer <span class="text-muted">(147 views)</span></h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/location.svg')}}"><span
                                            class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/full-time.svg')}}"><span
                                            class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img
                                            src="{{asset('assets/images/home/wallet.svg')}}"><span
                                            class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img
                                            src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span>
                                </div>
                                <div class="jobs__item-details-actions">
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        {{--                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>--}}
                        <div class="jobs__item-details" style="margin-left: 20px"><small></small>
                            <h6>Senior Frontend Developer <span class="text-muted">(147 views)</span></h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/location.svg')}}"><span
                                            class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/full-time.svg')}}"><span
                                            class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img
                                            src="{{asset('assets/images/home/wallet.svg')}}"><span
                                            class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img
                                            src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span>
                                </div>
                                <div class="jobs__item-details-actions">
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        {{--                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>--}}
                        <div class="jobs__item-details" style="margin-left: 20px"><small></small>
                            <h6>Senior Frontend Developer <span class="text-muted">(147 views)</span></h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/location.svg')}}"><span
                                            class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/full-time.svg')}}"><span
                                            class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img
                                            src="{{asset('assets/images/home/wallet.svg')}}"><span
                                            class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img
                                            src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span>
                                </div>
                                <div class="jobs__item-details-actions">
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        {{--                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>--}}
                        <div class="jobs__item-details" style="margin-left: 20px"><small></small>
                            <h6>Senior Frontend Developer <span class="text-muted">(147 views)</span></h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/location.svg')}}"><span
                                            class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/full-time.svg')}}"><span
                                            class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img
                                            src="{{asset('assets/images/home/wallet.svg')}}"><span
                                            class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img
                                            src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span>
                                </div>
                                <div class="jobs__item-details-actions">
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        {{--                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>--}}
                        <div class="jobs__item-details" style="margin-left: 20px"><small></small>
                            <h6>Senior Frontend Developer <span class="text-muted">(147 views)</span></h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/location.svg')}}"><span
                                            class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/full-time.svg')}}"><span
                                            class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img
                                            src="{{asset('assets/images/home/wallet.svg')}}"><span
                                            class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img
                                            src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span>
                                </div>
                                <div class="jobs__item-details-actions">
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        {{--                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>--}}
                        <div class="jobs__item-details" style="margin-left: 20px"><small></small>
                            <h6>Senior Frontend Developer <span class="text-muted">(147 views)</span></h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/location.svg')}}"><span
                                            class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/full-time.svg')}}"><span
                                            class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img
                                            src="{{asset('assets/images/home/wallet.svg')}}"><span
                                            class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img
                                            src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span>
                                </div>
                                <div class="jobs__item-details-actions">
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        {{--                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>--}}
                        <div class="jobs__item-details" style="margin-left: 20px"><small></small>
                            <h6>Senior Frontend Developer <span class="text-muted">(147 views)</span></h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/location.svg')}}"><span
                                            class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/full-time.svg')}}"><span
                                            class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img
                                            src="{{asset('assets/images/home/wallet.svg')}}"><span
                                            class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img
                                            src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span>
                                </div>
                                <div class="jobs__item-details-actions">
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        {{--                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>--}}
                        <div class="jobs__item-details" style="margin-left: 20px"><small></small>
                            <h6>Senior Frontend Developer <span class="text-muted">(147 views)</span></h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/location.svg')}}"><span
                                            class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img
                                            src="{{asset('assets/images/home/full-time.svg')}}"><span
                                            class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img
                                            src="{{asset('assets/images/home/wallet.svg')}}"><span
                                            class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img
                                            src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span>
                                </div>
                                <div class="jobs__item-details-actions">
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div><a class="btn btn-outline-primary" href="#">Apply now</a></div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="jobs__item-details-meta-item">
                                        <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                            <i class="svg-icon svg-icon-2x far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pagination-->
                    <!-- pagination-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

    </div>
    <!-- profile-end-->
@endsection