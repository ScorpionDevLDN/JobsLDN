@extends('FrontLayout.index')
@section('content')
    <!-- Profile page banner-->
    <section class="profile-page-banner">
        <div class="container">
            <div class="profile-page-banner__navbar">
                <ul>
                    <li class="active"><a href="profile-company.html">Profile</a></li>
                    <li><a href="profile-company-jobs.html">Jobs</a></li>
                    <li><a href="profile-company-notifications.html">Notifications</a></li>
                    <li><a href="" data-toggle="modal" data-target="#modalLogout">Logout</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- profile-page-banner-end-->

    <!-- Profile-->
    <section class="profile py-5">
        <div class="container">
            <h1 class="mb-4 text-center text-md-left">Profile</h1>
            <form method="POST" action="#">
                <div>
                    <div class="row pb-0 pb-md-5">
                        <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                            <h6 class="mb-1">Account Type</h6>
                            <small class="text-muted mb-4 mb-md-0">Your account type determine your role on our website it can’t be changed.</small>
                        </div>
                        <div class="col-md-9  text-center text-md-left">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary-ldn-outline2 px-5 mr-4 active">
                                    <input id="option1" type="radio" name="accountType" autocomplete="off" checked=""> Jobseeker
                                </label>
                                <label class="btn btn-primary-ldn-outline2 px-5 mr-4">
                                    <input id="option2" type="radio" name="accountType" autocomplete="off">Company
                                </label>
                            </div>
                            <br>
                            <br>
                            <hr class="mt-5">
                        </div>
                    </div>

                    <div class="row pb-0 pb-md-5">
                        <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                            <h6 class="mb-1">My Account</h6>
                            <small class="text-muted mb-4 mb-md-0">Manage all details for your personal account.</small>
                        </div>
                        <div class="col-md-9 pb-5">
                            <div class="row">
                                <div class="col-md-6 py-3">
                                    <input class="form-control form-control-lg" type="text" placeholder="First Name *" required>
                                </div>
                                <div class="col-md-6 py-3">
                                    <input class="form-control form-control-lg" type="text" placeholder="Last Name *" required>
                                </div>
                                <div class="col-md-6 py-3">
                                    <input class="form-control form-control-lg" type="email" placeholder="Email *" required>
                                </div>
                                <div class="col-md-6 py-3">
                                    <input class=" form-control form-control-lg" type="email" placeholder="Confirm Email *">
                                    <span><small class="text-muted">Leave this field empty if you do not make any changes.</small></span>
                                </div>
                                <div class="px-md-3 mt-4 text-center text-md-left form-actions">
                                    <button class="btn btn-primary-ldn px-5" type="submit">Update</button>
                                    <button class="btn all-jobs ml-3 mt-4 mt-md-0" type="submit">Delete My Account</button>
                                </div>

                            </div>
                            <br>
                            <hr class="mt-5">
                        </div>
                    </div>
                </div>
            </form>
            <!-- company details-->
            <form>
                <div class="row pb-0 pb-md-5">
                    <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                        <h6 class="mb-1">Company Details</h6>
                        <small class="text-muted mb-4 mb-md-0">Tell us about your company so jobseekers know who you are.</small>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12 py-3">
                                <div class="profile__details">
                                    <div class="profile__details-logo"><span class="profile__details-logo-text">Logo</span></div>
                                    <div class="profile__details-actions">
                                        <div class="profile__details-actions-item">
                                            <label for="profileLogo"><img src="{{asset('assets/images/icons/upload.svg')}}"></label>
                                            <input class="profile__details-image-upload" type="file" id="profileLogo" name="profileLogo" accept="image/*">
                                        </div>
                                        <div class="profile__details-actions-item"><a class="profile__details-logo-image-remover" href="" data-toggle="modal" data-target="#modalDeleteThis"><img src="{{asset('assets/images/icons/delete.svg')}}"></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 py-3">
                                <input class="form-control form-control-lg" type="text" placeholder="Company *" required>
                            </div>
                            <div class="col-md-6 py-3">
                                <input class="form-control form-control-lg" type="text" placeholder="Number of Employees *" required>
                            </div>
                            <div class="col-md-6 py-3">
                                <input class="form-control form-control-lg" type="text" placeholder="Industry *" required>
                            </div>
                            <div class="col-md-6 py-3">
                                <input class="form-control form-control-lg" type="text" placeholder="Website *" required>
                            </div>
                            <div class="col-md-12 py-3">
                                <textarea class="form-control" rows="5" placeholder="Overview *" required></textarea>
                            </div>
                            <div class="px-3 mt-4 text-center text-md-left form-actions">
                                <button class="btn btn-primary-ldn px-5" type="submit">Update</button>
                            </div>
                        </div>
                        <br>
                        <br>
                        <hr>
                    </div>
                </div>
            </form>
            <!-- security-->
            <form>
                <div class="row pb-0 pb-md-5">
                    <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                        <h6 class="mb-1">Security</h6>
                        <small class="text-muted mb-4 mb-md-0">Only change the password when necessary.</small>
                    </div>
                    <div class="col-md-9">
                        <form method="POST" action="#">
                            <div class="row">
                                <div class="col-md-6 py-3">
                                    <div class="input-group">
                                        <input class="form-control form-control-lg" type="password" placeholder="Current Password *" data-toggle="password" required>
{{--                                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-eye-slash"></i></span></div>--}}
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 py-3">
                                    <div class="input-group">
                                        <input class="form-control form-control-lg" type="password" placeholder="New Password *" data-toggle="password" required>
{{--                                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-eye-slash"></i></span></div><span class="input-group-instructions text-muted">Must be at least 8 characters</span>--}}
                                    </div>
                                    <span><small class="text-muted">Must be at least 8 characters</small></span>
                                </div>
                                <div class="col-md-6 py-3">
                                    <div class="input-group">
                                        <input class="form-control form-control-lg" type="password" placeholder="Must Match Your New Password *" data-toggle="password" required>
{{--                                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-eye-slash"></i></span></div>--}}
                                    </div>
                                    <span><small class="text-muted">Must be at least 8 characters</small></span>
                                </div>
                            </div>
                            <div class="mt-4 text-center text-md-left form-actions">
                                <button class="btn btn-primary-ldn px-5" type="submit">Update</button>
                            </div>
                        </form>
                        <br>
                        <br>
                        <hr>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- profile-end-->
@endsection