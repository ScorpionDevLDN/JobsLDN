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
    @if(auth()->guard('companies')->check() && $posts_company->count()>0 || $posts->count()>0)
        <section class="jobs py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 mt-4 mt-md-0 order-2 order-md-1">
                        <div class="jobs__col-title text-center text-md-left">
                            <p class="font-weight-light text-muted" style="margin-bottom: 60px">Search Filter</p>
                        </div>
                        <div class="jobs__search-filters">
                            <form action="{{route('jobs.index')}}" method="get">
                                <div class="row">
                                    <div class="col-12 mb-5">
                                        <select class="js-example-basic-single" name="category">
                                            <option value="">Category</option>
                                            @foreach($categories as $category)
                                                <option {{\request()->category==$category->id ? 'selected' : ""}} value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <select class="js-example-basic-single" name="city">
                                            <option value="">City</option>
                                            @foreach($cities as $city)
                                                <option {{\request()->city==$city->id ? 'selected' : ""}} value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 mb-5">
                                        <select class="js-example-basic-single" name="type">
                                            <option value="">Type</option>
                                            @foreach($types as $type)
                                                <option {{\request()->type==$type->id ? 'selected' : ""}} value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg mb-3" type="text" id="keywords"
                                                   name="keywords" placeholder="keywords">
                                        </div>
                                    </div>

                                    <div class="col-12 mb-5">
                                        <div class="form-group">
                                            <label><small class="text-muted">Salary</small><small>:{{$min_salary}}
                                                    - {{$max_salary}}</small></label>
                                            {{--                                        <small>Salary <small>£1,500 - £8,400</small></small>--}}
                                            <div id="valBox"></div>
                                            <input onchange="showVal(this.value)" name="salary" type="range"
                                                   class="custom-range" min="{{$min_salary}}" max="{{$max_salary}}"
                                                   id="customRange2">
                                        </div>
                                    </div>
                                </div>

                                <div class="jobs__salary-range">
                                    <div class="text-center text-md-left">
                                        @if(request()->has('category')  || request()->has('city') || request()->has('type') || request()->has('keywords') || request()->has('salary'))
                                            <a href="{{route('jobs.index')}}" class="btn btn-primary-ldn px-4">Reset</a>
                                        @else
                                            <button class="btn btn-primary-ldn px-4" type="submit">Apply</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-9 order-1 order-md-2">
                        <div class="jobs__col-title d-flex justify-content-between align-items-center">
                            <h4>Jobs</h4>
                            <div class="sort-jobs text-muted"><span></span>
                                <form action="{{route('jobs.index')}}" method="get">
                                    <select name="filter" class="sort-filter" onchange="this.form.submit()">
                                        {{--                                    <option >Sort By</option>--}}

                                        <option value="">Sort By</option>
                                        <option value="newest" selected>Newest</option>
                                        <option value="salary">Salary</option>
                                    </select>
                                </form>
                            </div>
                        </div>

                        @if(auth()->guard('companies')->check())
                            @if($posts_company->count()>0)
                                @foreach($posts_company as $post)
                                    <div class="rounded jobs__item">
                                        <div class="jobs__item-employer">
                                            <a href="">
                                                <img src="{{\App\Models\Setting::query()->first()->logo}}">
                                            </a>
                                        </div>
                                        <div class="jobs__item-details" style="margin-left: 20px">
                                            <small>{{$post->company->company_name}},{{$post->city->name}}</small>
                                            <a class="text-dark" href="{{route('job_details',$post->id)}}">
                                                <h6>{{$post->title}}</h6>
                                            </a>
                                            <div class="jobs__item-details-meta">
                                                <div class="jobs__item-details-meta-item"><img
                                                            src="{{asset('assets/images/home/location.svg')}}"><span
                                                            class="main-color-sm">{{$post->city->name}}</span></div>
                                                <div class="jobs__item-details-meta-item"><img
                                                            src="{{asset('assets/images/home/full-time.svg')}}"><span
                                                            class="main-color-sm">{{$post->type->name}}</span></div>
                                                <div class="jobs__item-details-meta-item salary"><img
                                                            src="{{asset('assets/images/home/wallet.svg')}}"><span
                                                            class="main-color-sm">{{$post->currency->symbol}}{{$post->salary}}</span><span
                                                            class="period">/{{$post->per->per}}</span>
                                                </div>
                                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;">
                                                    <img
                                                            src="{{asset('assets/images/home/time.svg')}}"><span
                                                            class="main-color-sm">{{$post->created_at->diffForHumans()}}</span>
                                                </div>
                                                <div class="jobs__item-details-meta-item" style="margin-left: 90px;"><a
                                                            class="btn all-jobs" href="#">Apply now</a></div>
                                                <div class="jobs__item-details-meta-item">
                                                    <div class="btn btn-outline-primary font-weight-bold btn-icon"><i
                                                                class="svg-icon svg-icon-2x far fa-star"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{ $posts_company->links() }}


                            @else
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="text-center alert alert-danger">No Posts to display yet</h6>
                                    </div>
                                </div>
                            @endif
                        @else
                            @if($posts->count()>0)
                                @foreach($posts as $post)
                                    <div class="jobs__item rounded">
                                        <div class="jobs__item-employer"><img
                                                    src="{{\App\Models\Setting::query()->first()->logo}}">
                                        </div>
                                        <div class="jobs__item-details" style="margin-left: 20px;margin-right: 50px">
                                            <small>{{$post->company->company_name}}
                                                ,{{$post->city->name}}</small>
                                            <h6>{{$post->title}}</h6>
                                            <div class="jobs__item-details-meta justify-content-end">
                                                <div class="jobs__item-details-meta-item"><img
                                                            src="{{asset('assets/images/home/location.svg')}}"><span
                                                            class="main-color-sm">{{$post->city->name}}</span></div>
                                                <div class="jobs__item-details-meta-item"><img
                                                            src="{{asset('assets/images/home/full-time.svg')}}"><span
                                                            class="main-color-sm">{{$post->type->name}}</span></div>
                                                <div class="jobs__item-details-meta-item salary"><img
                                                            src="{{asset('assets/images/home/wallet.svg')}}"><span
                                                            class="main-color-sm">{{$post->currency->symbol}}{{$post->salary}}</span><span
                                                            class="period">/{{$post->per->per}}</span>
                                                </div>
                                                <div class="jobs__item-details-meta-item" style="margin-left: -60px;">
                                                    <img
                                                            src="{{asset('assets/images/home/time.svg')}}"><span
                                                            class="main-color-sm">{{$post->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="jobs__item-details-meta-item"
                                             style="margin-top: 34px;margin-left: 89px"><a
                                                    class="btn all-jobs applyNow" href="#">Apply now</a></div>

                                        <div class="d-flex align-items-center jobs__item-details-meta-item">
                                            <div class="btn btn-outline-primary font-weight-bold btn-icon"><i
                                                        class="svg-icon svg-icon-2x far fa-star"></i></div>
                                        </div>

                                    </div>
                                @endforeach
                                @if ($posts->hasPages())
                                    <div class="pagination-wrapper">
                                        {{ $posts->links() }}
                                    </div>
                                @endif
                            @else
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="text-center alert alert-danger">No Posts to display yet</h6>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @else
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center alert alert-danger">No Posts to display yet</h6>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

    @endif
    <!-- jobs-list-end-->
@endsection

@section('js')
    <script>
        function showVal(newVal) {
            document.getElementById("valBox").innerHTML = newVal;
        }
    </script>
@endsection