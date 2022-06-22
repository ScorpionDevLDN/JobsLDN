@extends('FrontLayout.index')
@section('content')
    <!-- Profile page banner-->
    <section class="profile-page-banner">
        <div class="container">
            <div class="profile-page-banner__navbar">
                <ul>
                    <li><a href="profile-company.html">Profile</a></li>
                    <li><a href="profile-company-jobs.html">Jobs</a></li>
                    <li class="active"><a href="profile-company-notifications.html">Notifications</a></li>
                    <li><a href="" data-toggle="modal" data-target="#modalLogout">Logout</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- profile-page-banner-end-->

    <!-- Profile company jobs-->
    <section class="profile py-5">
        <div class="container">
            <h1 class="mb-4 text-center text-md-left">Notifications</h1>
            <div class="row">
                <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                    <h5 class="mb-1"><span>2</span> new notifications</h5>
                </div>
                <div class="col-md-9">
                    <div class="alert alert-success py-4 mb-4" role="alert"><img src="{{asset('assets/images/icons/ic-actions-notifications-check.svg')}}"> Surgey Ivanov applied for a job: &nbsp;<span class="font-weight-bold">Super Project Manager</span>.</div>
                    <div class="alert alert-success py-4 mb-4" role="alert"><img src="{{asset('assets/images/icons/ic-actions-notifications-close.svg')}}"> Joseph has withdrawn his application from the job: &nbsp;<span class="font-weight-bold">Super Project Manager</span>.</div>
                    <div class="alert alert-success py-4 mb-4" role="alert"><img src="{{asset('assets/images/icons/ic-actions-notifications-check.svg')}}"> Surgey Ivanov applied for a job: &nbsp;<span class="font-weight-bold">Super Project Manager</span>.</div>
                    <div class="alert alert-success py-4 mb-4" role="alert"><img src="{{asset('assets/images/icons/ic-actions-notifications-close.svg')}}"> Joseph has withdrawn his application from the job: &nbsp;<span class="font-weight-bold">Super Project Manager</span>.</div>
                    <div class="alert alert-success py-4 mb-4" role="alert"><img src="{{asset('assets/images/icons/ic-actions-notifications-check.svg')}}"> Surgey Ivanov applied for a job: &nbsp;<span class="font-weight-bold">Super Project Manager</span>.</div>
                    <div class="alert alert-success py-4 mb-4" role="alert"><img src="{{asset('assets/images/icons/ic-actions-notifications-close.svg')}}"> Joseph has withdrawn his application from the job: &nbsp;<span class="font-weight-bold">Super Project Manager</span>.</div>
                    <!-- pagination-->
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
    <!-- profile-end-->
@endsection