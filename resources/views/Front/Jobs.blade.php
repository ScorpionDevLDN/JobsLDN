@extends('FrontLayout.index')
@section('content')
    <!-- Page banner-->
    <section class="page-banner py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-2 order-md-1">
                    <h2 class="page-banner__title">A lot of small businesses turn their ideas into reality</h2>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <div class="page-banner__image"><img src="{{asset('assets/images/jobs/jobs-header.svg')}}"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-banner-end-->

    <!-- Jobs list-->
    <section class="jobs py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mt-4 mt-md-0 order-2 order-md-1">
                    <div class="jobs__col-title text-center text-md-left">
                        <p class="font-weight-light text-muted" style="margin-bottom: 60px">Search Filter</p>
                    </div>
                    <div class="jobs__search-filters">
                        <form action="#" method="GET">
                            <div class="row">
                                <div class="col-12 mb-5">
                                    <select class="js-example-basic-single" name="category">
                                        <option value="category">Category</option>
                                        <option value="category1">Category 1</option>
                                        <option value="category2">Category 2</option>
                                        <option value="category3">Category 3</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-5">
                                    <select class="js-example-basic-single" name="city">
                                        <option value="city">City</option>
                                        <option value="city1">City 1</option>
                                        <option value="city2">City 2</option>
                                        <option value="city3">City 3</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-5">
                                    <select class="js-example-basic-single" name="type">
                                        <option value="category">Type</option>
                                        <option value="type1">Type 1</option>
                                        <option value="type2">Type 2</option>
                                        <option value="type3">Type 3</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-5">
                                    <select class="js-example-basic-single" name="keywords">
                                        <option value="keywords">Keywords</option>
                                        <option value="keyword1">Keyword 1</option>
                                        <option value="keyword2">Keyword 2</option>
                                        <option value="keyword3">Keyword 3</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-5">
                                    <select class="js-example-basic-single" name="salaryRange">
                                        <option value="salary_range">Salary Range</option>
                                        <option value="range1">Range 1</option>
                                        <option value="range2">Range 2</option>
                                        <option value="range3">Range 3</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="jobs__salary-range">
                            <p>Salary<span class="ml-3">$3000 -&nbsp;</span><span>$8500</span></p>
                            <div class="my-5"><input type="range"></div>
                            <div class="text-center text-md-left">
                                <button class="btn btn-primary px-4" type="submit">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 order-1 order-md-2">
                    <div class="jobs__col-title d-flex justify-content-between align-items-center">
                        <h4>Jobs</h4>
                        <div class="sort-jobs text-muted"><span>Sort by</span>
                            <form action="#">
                                <select class="sort-filter">
                                    <option value="newest">Newest</option>
                                    <option value="value1">Value 1</option>
                                    <option value="value2">Value 2</option>
                                    <option value="value3">Value 3</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="jobs__item">
                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                        <div class="jobs__item-details" style="margin-left: 20px"><small>Park Plaza London Riverbanl</small>
                            <h6>Senior Frontend Developer</h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/location.svg')}}"><span class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/full-time.svg')}}"><span class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img src="{{asset('assets/images/home/wallet.svg')}}"><span class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a class="btn all-jobs" href="#">Apply now</a></div>
                                <div class="jobs__item-details-meta-item">
                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                        <div class="jobs__item-details" style="margin-left: 20px"><small>Park Plaza London Riverbanl</small>
                            <h6>Senior Frontend Developer</h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/location.svg')}}"><span class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/full-time.svg')}}"><span class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img src="{{asset('assets/images/home/wallet.svg')}}"><span class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a class="btn all-jobs" href="#">Apply now</a></div>
                                <div class="jobs__item-details-meta-item">
                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                        <div class="jobs__item-details" style="margin-left: 20px"><small>Park Plaza London Riverbanl</small>
                            <h6>Senior Frontend Developer</h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/location.svg')}}"><span class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/full-time.svg')}}"><span class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img src="{{asset('assets/images/home/wallet.svg')}}"><span class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a class="btn all-jobs" href="#">Apply now</a></div>
                                <div class="jobs__item-details-meta-item">
                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                        <div class="jobs__item-details" style="margin-left: 20px"><small>Park Plaza London Riverbanl</small>
                            <h6>Senior Frontend Developer</h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/location.svg')}}"><span class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/full-time.svg')}}"><span class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img src="{{asset('assets/images/home/wallet.svg')}}"><span class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a class="btn all-jobs" href="#">Apply now</a></div>
                                <div class="jobs__item-details-meta-item">
                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                        <div class="jobs__item-details" style="margin-left: 20px"><small>Park Plaza London Riverbanl</small>
                            <h6>Senior Frontend Developer</h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/location.svg')}}"><span class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/full-time.svg')}}"><span class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img src="{{asset('assets/images/home/wallet.svg')}}"><span class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a class="btn all-jobs" href="#">Apply now</a></div>
                                <div class="jobs__item-details-meta-item">
                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                        <div class="jobs__item-details" style="margin-left: 20px"><small>Park Plaza London Riverbanl</small>
                            <h6>Senior Frontend Developer</h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/location.svg')}}"><span class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/full-time.svg')}}"><span class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img src="{{asset('assets/images/home/wallet.svg')}}"><span class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a class="btn all-jobs" href="#">Apply now</a></div>
                                <div class="jobs__item-details-meta-item">
                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                        <div class="jobs__item-details" style="margin-left: 20px"><small>Park Plaza London Riverbanl</small>
                            <h6>Senior Frontend Developer</h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/location.svg')}}"><span class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/full-time.svg')}}"><span class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img src="{{asset('assets/images/home/wallet.svg')}}"><span class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a class="btn all-jobs" href="#">Apply now</a></div>
                                <div class="jobs__item-details-meta-item">
                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                        <div class="jobs__item-details" style="margin-left: 20px"><small>Park Plaza London Riverbanl</small>
                            <h6>Senior Frontend Developer</h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/location.svg')}}"><span class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/full-time.svg')}}"><span class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img src="{{asset('assets/images/home/wallet.svg')}}"><span class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a class="btn all-jobs" href="#">Apply now</a></div>
                                <div class="jobs__item-details-meta-item">
                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                        <div class="jobs__item-details" style="margin-left: 20px"><small>Park Plaza London Riverbanl</small>
                            <h6>Senior Frontend Developer</h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/location.svg')}}"><span class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/full-time.svg')}}"><span class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img src="{{asset('assets/images/home/wallet.svg')}}"><span class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a class="btn all-jobs" href="#">Apply now</a></div>
                                <div class="jobs__item-details-meta-item">
                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jobs__item">
                        <div class="jobs__item-employer"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                        <div class="jobs__item-details" style="margin-left: 20px"><small>Park Plaza London Riverbanl</small>
                            <h6>Senior Frontend Developer</h6>
                            <div class="jobs__item-details-meta">
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/location.svg')}}"><span class="main-color-sm">London</span></div>
                                <div class="jobs__item-details-meta-item"><img src="{{asset('assets/images/home/full-time.svg')}}"><span class="main-color-sm">Full-Time</span></div>
                                <div class="jobs__item-details-meta-item salary"><img src="{{asset('assets/images/home/wallet.svg')}}"><span class="main-color-sm">$3000</span><span class="period">/Monthly</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;"><img src="{{asset('assets/images/home/time.svg')}}"><span class="main-color-sm">2 days ago.</span></div>
                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a class="btn all-jobs" href="#">Apply now</a></div>
                                <div class="jobs__item-details-meta-item">
                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pagination-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- jobs-list-end-->
@endsection