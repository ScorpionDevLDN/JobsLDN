{{$menu = $page->title}}
@extends('frontend.jobsldn.app.layout')
@section('content')
    <section class="page-banner " id="page-banner">
        <div class="container">
            <div class="row position-relative py-5 py-lg-0">
                <div class="col-12 col-lg-8 text-center text-lg-start pb-5 pb-lg-0">
                    <h1>{{$page->title}}</h1>
                    <p>Last update {{$page->updated_at->format('d M Y')}}</p>
                </div>
                <div class="col-12 col-lg-4 text-center text-lg-end">
                    <img src="{{filled($page->image) ? $page->image: asset('jobsldn/images/page-banners/dynamic_banner.svg')}}" alt="Person" class="dynamic-banner">
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Banner Section -->

    <section class="dynamic-content pt-0">
        <div class="container">
            <div class="dynamic-desc-content">
                {!! $page->content !!}
            </div>
        </div>
    </section>
@endsection