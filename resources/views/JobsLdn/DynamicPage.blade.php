@extends('JobsLdn.Layout.index')
@section('content')
    <!-- Start Header -->
    @include('JobsLdn.Layout.nav')
    <!-- Start Page Banner Section -->
    <section class="page-banner contact" id="page-banner">
        <div class="container">
            <div class="row position-relative py-5 py-xl-0">
                <div class="col-12 col-xl-8">
                    <h1>{{$page->title}}</h1>
                    <p>Last update {{$page->updated_at->format('M d,Y')}}</p>
                </div>
                <div class="col-12 col-xl-4 d-none d-xl-block text-end">
                    <img src="{{$page->image}}" alt="Person" class="contact-banner">
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