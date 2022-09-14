@php $menu = 'profile';@endphp
@extends('frontend.jobsldn.app.parts.layout')
@section('content')
    <!-- Start Horizontal bar -->
    @include('frontend.jobsldn.app.parts.job_seeker_horizental')
    <!-- End Horizontal bar -->

    <!-- Start Profile Content -->
    <section class="profile-content" id="profile-content">
        <div class="container">
            <div class="section-heading">
                <h1>Profile</h1>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-lg-3">
                    <div class="account-type account-col">
                        <h3>Account Type</h3>
                        <p>Your account type will determine your role on the
                            website and it can’t be changed.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="account-type-btns">
                        <div class="account-type-btn button outline">Jobseeker</div>
                        <div class="account-type-btn active button outline">Company</div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-9">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="account-col">
                        <h3>My Account</h3>
                        <p>Manage all details for your personal
                            account.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            @if(session('msgProfile'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{session('msgProfile')}}
                                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>--}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{route('my-profile.update',$user->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row gap-50">
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input value="{{$user->first_name}}" type="text" name="first_name" id="first_name"
                                           class="form-control" required/>
                                    <label class="floating-label" for="first_name">First Name*</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input value="{{$user->last_name}}" type="text" name="last_name" id="last_name"
                                           class="form-control" required/>
                                    <label class="floating-label" for="last_name">Last Name*</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input value="{{$user->email}}" type="email" name="email" id="email"
                                           class="form-control" required/>
                                    <label class="floating-label" for="last_name">Email*</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group is-floating-label">
                                    <div class="is-floating-label">
                                        <label class="floating-label" for="confirm_email">New Email</label>
                                        <input value="{{$user->email}}" type="email" name="confirm_email"
                                               id="confirm_email"
                                               class="form-control"/>
                                        <p class="note pt-1">Leave this field empty if you do not make any changes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <button type="submit" class="button w-100">Update</button>
                            </div>
                            <div class="col-6 col-lg-3 align-self-center text-end text-lg-start">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#delete-account" class="danger delete-account">Delete My Account</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-9">
                        <hr>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="account-col">
                        <h3>Company Details</h3>
                        <p>Tell us about your company so
                            jobseekers know who you are.</p>
                    </div>
                </div>


                <div class="col-12 col-lg-9">
                    <form enctype="multipart/form-data" method="POST" action="{{route('updateCompanyFront')}}">
                        @csrf
                        <div class="row gap-50">
                            <div class="col-12 company-details-logo">
                                <img src="{{$user->photo}}" alt="Logo" class="logo">
                                <div class="pdf-upload-btn custom-upload">
                                    <label
                                            class="custom-upload__button  d-inline-flex gap-3 align-items-center w-auto upload-logo"
                                            for="client_form_file" data-element="custom-upload-button">

                                        <img src="{{asset('jobsldn/images/icons/upload.svg')}}" class="icon"
                                             alt="Upload">
                                    </label>
                                    <input class="custom-upload__input" name="client_form_file"
                                           id="client_form_file" type="file" data-behaviour="custom-upload-input"
                                    >
                                </div>
                                <img src="{{asset('jobsldn/images/icons/delete.svg')}}" class="icon" alt="Delete">
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input value="{{$user->company_name}}" type="text" name="company_name" id="company"
                                           class="form-control" required/>
                                    <label class="floating-label" for="company">Company*</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input readonly value="{{$user->employee_count}} Employees" type="text"
                                           name="employee_count" id="number_of_employees"
                                           class="form-control" required/>
                                    <label class="floating-label" for="number_of_employees">Number of Employees*</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input value="{{$user->industry}}" type="text" name="industry" id="industry"
                                           class="form-control" required/>
                                    <label class="floating-label" for="industry">Industry*</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input value="{{$user->website_url}}" type="text" name="website_url" id="website"
                                           class="form-control" required/>
                                    <label class="floating-label" for="website">Website *</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="floating-label-group is-floating-label temp-textarea-label">
                                    <div class="is-floating-label temp-textarea-label">
                                        <label for="overview" class="floating-label">Overview *</label>
                                        <textarea name="overview" id="overview" cols="30" rows="7"
                                                  class="form-control max-length" maxlength="6500" required>
                                            {{$user->overview}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <button type="submit" class="button w-100">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-9">
                        <hr>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="account-col">
                        <h3>Security</h3>
                        <p>Only change the password when
                            necessary.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <form method="POST" action="{{route('updatePasswordFront')}}">
                        @csrf
                        <div class="row gap-50">
                            <div class="col-md-12">
                                @if(session('msg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{session('msg')}}
                                        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>--}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input type="text" name="currPassword" id="currPassword"
                                           class="form-control" required>
                                    <label class="floating-label" for="currPassword">Current Password*</label>
                                    <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                    <small><span
                                                class="text-danger">@error('currPassword'){{ $message }}@enderror</span></small>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 d-none d-lg-block"></div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group is-floating-label">
                                    <div class="is-floating-label">
                                        <label class="floating-label" for="password">New Password</label>
                                        <input type="password" name="password" id="password"
                                               class="form-control"/>
                                        <ion-icon class="toggle-password with-p" name="eye-outline"></ion-icon>
                                        <p class="note pt-1">Must be at least 8 characters</p>
                                        <small><span
                                                    class="text-danger">@error('password'){{ $message }}@enderror</span></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group is-floating-label">
                                    <div class="is-floating-label">
                                        <label class="floating-label" for="password_confirmation">Must match your New
                                            Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                               class="form-control"/>
                                        <ion-icon class="toggle-password with-p" name="eye-outline"></ion-icon>
                                        <p class="note pt-1">Must be at least 8 characters</p>
                                        <small><span
                                                    class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <button type="submit" class="button w-100">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile Content -->

    <div class="modal fade" id="delete-account" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="logoutLabel">Delete Account</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>
                <form action="{{route('my-profile.destroy',1)}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to delete your account?</h5>
                    </div>
                    <div class="modal-footer">
                        <button class="button mx-auto" type="submit">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection