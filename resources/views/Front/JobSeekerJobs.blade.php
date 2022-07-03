@extends('FrontLayout.index')
@section('content')
    <section class="py-5 single-job__description">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1>Jobs</h1>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-primary-ldn btn-block">Apply for a job</a>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-3">
                    <h6>You have applied
                        for {{$posts->count()}} jobs</h6>
                </div>
                <div class="col-9">
                    @if(session('msgBookmarked'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <small>{{session('msgBookmarked')}}</small>
                        </div>
                    @endif

                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <div class="jobs__item rounded">
                                <div class="jobs__item-employer"><img
                                            src="{{\App\Models\Setting::query()->first()->logo}}">
                                </div>
                                <div class="jobs__item-details" style="margin-left: 20px;margin-right: 20px">
                                    <small>{{$post->job->company->company_name}}
                                        ,{{$post->job->city->name}}</small>
                                    <h6>{{$post->job->title}}</h6>
                                    <div class="jobs__item-details-meta justify-content-end">
                                        <div class="jobs__item-details-meta-item"><img
                                                    src="{{asset('assets/images/home/location.svg')}}"><span
                                                    class="main-color-sm">{{$post->job->city->name}}</span></div>
                                        <div class="jobs__item-details-meta-item"><img
                                                    src="{{asset('assets/images/home/full-time.svg')}}"><span
                                                    class="main-color-sm">{{$post->job->type->name}}</span></div>
                                        <div class="jobs__item-details-meta-item salary"><img
                                                    src="{{asset('assets/images/home/wallet.svg')}}"><span
                                                    class="main-color-sm">{{$post->job->currency->symbol}}{{$post->salary}}</span><span
                                                    class="period">/{{$post->job->per->per}}</span>
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
                                            class="btn all-jobs applyNow" href="{{route('job_details',$post->id)}}">Apply
                                        now</a></div>

                                <div class="d-flex align-items-center jobs__item-details-meta-item">
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
                </div>
            </div>
        </div>
    </section>
@endsection
