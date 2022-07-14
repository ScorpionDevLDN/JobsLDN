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
                        <h1>Jobs</h1>
                        <br>
                        <h6>24 Jobs Created</h6>
                        <small class="text-muted">The number of jobs you have
                            created.</small>
                    </div>
                    <div class="col-md-9 order-1 order-md-2">
                        <div class="jobs__col-title d-flex justify-content-end align-items-end">
                            <div class="sort-jobs text-muted"><span></span>
                                <a class="px-5 btn btn-primary d-block">Post a job</a>
                            </div>
                        </div>

                        @if(session('msgBookmarked'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <small>{{session('msgBookmarked')}}</small>
                            </div>
                        @endif

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
                                                <div class="jobs__item-details-meta-item">
                                                    <img
                                                            src="{{asset('assets/images/home/time.svg')}}"><span
                                                            class="main-color-sm">{{$post->created_at->diffForHumans()}}</span>
                                                </div>
                                                <div class="jobs__item-details-meta-item"><a
                                                            class="btn all-jobs">{{$post->seekerjobs->count()}}
                                                        Applicant Sent</a></div>
                                                <div class="jobs__item-details-meta-item"><a
                                                            class="btn all-jobs"
                                                            href="{{route('job_details_company',$post->id)}}">Open</a>
                                                </div>
                                                <div class="jobs__item-details-meta-item"><a
                                                            class="btn" href="{{route('editJob',$post->id)}}"><img
                                                                src="{{asset('assets/icons/ic-actions-emultiple-edit.svg')}}"></a>
                                                </div>
                                                <div class="profile__details-actions-item"><a
                                                            class="profile__details-logo-image-remover" href=""
                                                            data-toggle="modal"
                                                            data-target="#modalDeleteJob{{$post->id}}"><img
                                                                src="{{asset('assets/images/icons/delete.svg')}}"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modalDeleteJob{{$post->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('deleteJob',$post->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Job</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h6>Are you sure you want to log out?</h6>
                                                        <div class="my-4">
                                                            <button class="btn btn-primary-ldn px-5" type="submit">
                                                                Logout
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
                                        <div class="jobs__item-details" style="margin-left: 20px;margin-right: 20px">
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
                                             style="margin-top: 34px;margin-left: 110px"><a
                                                    class="btn all-jobs applyNow"
                                                    href="{{route('job_details',$post->id)}}">Apply now</a></div>

                                       {{-- <div class="d-flex align-items-center jobs__item-details-meta-item">
                                            @if(auth('job_seekers')->user()->postbookmarked($post->id))
                                                <a href="{{route('bookmark',$post->id)}}">
                                                    <div class="btn btn-outline-primary font-weight-bold btn-icon">
                                                        <i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                                </a>
                                            @else
                                                <a href="{{route('un_bookmark',$post->id)}}">
                                                    <div class="btn btn-primary font-weight-bold btn-icon">
                                                        <i class="svg-icon svg-icon-2x far fa-star"></i></div>
                                                </a>
                                            @endif
                                        </div>--}}

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