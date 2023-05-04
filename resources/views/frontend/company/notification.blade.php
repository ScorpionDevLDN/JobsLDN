@php $menu = 'myBookmarks';
@endphp
@extends('frontend.app.parts.layout')
@section('content')
    <!-- Start Horizontal bar -->
    @include('frontend.app.parts.job_seeker_horizental')
    <!-- Start Profile Content -->
    <section class="profile-content notifications" id="notifications-content">
        <div class="container">
            <div class="section-heading mb-0">
                <h1>Notifications</h1>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-lg-3">
                    <div class="account-col">
                        <h3>{{$notifications->total()}} new notifications </h3>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="row gap-20">
                        @if($notifications->count() > 0)
                            @foreach($notifications as $notification)
                                <div class="col-12 wow animate animate__fadeInDown animation-delay-{{$notification->id}}">
                                    <div class="alert" role="alert">
                                        <div class="icon">
                                            @if($notification->type == 1 || $notification->type == 3)
                                                <img src="{{asset('frontend/images/icons/alert_green.svg')}}"
                                                     alt="Icon">
                                            @else
                                                <img src="{{asset('frontend/images/icons/alert_red.svg')}}"
                                                     alt="Icon">
                                            @endif
                                        </div>
                                        <p>
                                            {!! $notification->type_text  !!}
                                            {{--Sergey applied for a job: <span>Super Project Manager</span> . check your
                                            email
                                            address for more information.--}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Start Jobs Pagination -->
                    {{ $notifications->links('vendor.pagination.custom') }}
                    <!-- End Jobs Pagination -->
                </div>

            </div>
        </div>
    </section>
    <!-- End Profile Content -->
@endsection