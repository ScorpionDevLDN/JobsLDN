@extends('FrontLayout.index')
@section('content')
    <!-- Page banner-->
    <section class="page-banner py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-2 order-md-1">
                    <h2 class="page-banner__title">{{$page->title}}</h2>
                    <p class="page-banner__subtitle text-muted"><small>Last update {{$page->updated_at->format('M d,Y')}}</small></p>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <div class="page-banner__image"><img src="{{$page->image}}"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-banner-end-->

    <!-- Page content-->
    <section class="page-content py-5">
        <div class="container text-left">
            <small class="text-muted">
                {{$page->description}}
            </small>
        </div>
    </section>
    <!-- page-content-end-->
@endsection