@php $menu = 'profile';@endphp
@extends('frontend.jobsldn.app.parts.layout')
@section('content')
    <!-- Start Horizontal bar -->
    @include('frontend.jobsldn.app.parts.job_seeker_horizental')
    <!-- End Horizontal bar -->

    <!-- Start Profile Content -->
    <section class="profile-content jobseeker" id="profile-content">
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
                        <div class="account-type-btn active button outline">Jobseeker</div>
                        <div class="account-type-btn button outline">Company</div>
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
                    <form method="post" action="{{route('my-profile.update',$user->id)}}">
                        @csrf
                        @method('put')
                        <div class="row gap-50">
                            <div class="col-12 company-details-logo">
                                <img src="{{asset('jobsldn/images/account-img.svg')}}" alt="Logo" class="logo">
                                <div class="pdf-upload-btn custom-upload">
                                    <label
                                            class="custom-upload__button  d-inline-flex gap-3 align-items-center w-auto upload-logo"
                                            for="client_form_file" data-element="custom-upload-button">

                                        <img src="{{asset('jobsldn/images/icons/upload.svg')}}" class="icon"
                                             alt="Upload">
                                    </label>
                                    <input class="custom-upload__input" name="client_form_file" accept=".png,.jpeg,.jpg"
                                           id="client_form_file" type="file" data-behaviour="custom-upload-input"
                                    >
                                </div>
                                <img src="{{asset('jobsldn/images/icons/delete.svg')}}" class="icon" alt="Delete">
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input value="{{$user->first_name}}" type="text" name="first_name" id="first_name"
                                           class="form-control" required/>
                                    <label class="floating-label" for="first_name">Full Name*</label>
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
                                        <label class="floating-label" for="confirm_email">Confirm Email</label>
                                        <input value="{{$user->confirm_email}}" type="email" name="confirm_email"
                                               id="confirm_email" class="form-control"/>
                                        <p class="note pt-1">Leave this field empty if you do not make any changes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="floating-label-group is-floating-label temp-textarea-label">
                                    <div class="is-floating-label temp-textarea-label">
                                        <label for="overview" class="floating-label">Introduce Yourself
                                            *</label>
                                        <textarea name="overview" id="overview" cols="30" rows="7"
                                                  class="form-control max-length" maxlength="6500" required>
                                            {{$user->overview}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <button type="submit" class="button w-100">Update</button>
                            </div>
                            <div class="col-6 col-lg-3 align-self-center text-end text-lg-start">
                                <a href="#" class="danger delete-account">Delete My Account</a>
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
                        <h3>My CV</h3>
                        <p>Having multiple CVs can benefit your job search.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <form enctype="multipart/form-data" action="{{route('uploadCv')}}" method="post">
                        @csrf
                        <div class="row gap-20">
                            @if(auth('job_seekers')->user()->cvs->count() < 10)
                                <form enctype="multipart/form-data" method="post" action="{{route('uploadCv')}}">
                                    @csrf
                                    <div class="col-12">
                                        @if(session('cvSuccess'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{session('cvSuccess')}}
                                                {{--<button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>--}}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <div class="pdf-upload-btn custom-upload file">
                                            <label
                                                    class="custom-upload__button button outline d-inline-flex gap-3 align-items-center w-auto"
                                                    for="client_form_file_cv" data-element="custom-upload-button">
                                                Upload New CV
                                                <img src="{{asset('jobsldn/images/icons/ic-actions-add-file.svg')}}"
                                                     alt="Upload Icon">
                                            </label>
                                            <input onchange="form.submit()" class="custom-upload__input" name="pdf"
                                                   accept=".pdf"
                                                   id="client_form_file_cv" type="file"
                                                   data-behaviour="custom-upload-input">
                                            <p class="note">You can only upload PDF files.
                                                <br> Maximum file size: 10 MB
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            @endif
                            @if(auth('job_seekers')->user()->cvs->count() > 0)
                                @foreach(auth('job_seekers')->user()->cvs as $cv)
                                    <div class="col-12">
                                        <div class="uploaded-file">
                                            <div class="content">
                                                <div class="icon">
                                                    <img src="{{asset('jobsldn/images/icons/ic-folder-simple.svg')}}"
                                                         alt="Icon">
                                                </div>
                                                <p>{{$cv->cv_name}}</p>
                                                <span>3MB</span>
                                            </div>
                                            <div class="actions">
                                                <a href="{{route('downloadCv',$cv->id)}}">
                                                    <img src="{{asset('jobsldn/images/icons/ic-actions-download.svg')}}"
                                                         alt="Download"
                                                         class="action-download">
                                                </a>
                                                <img src="{{asset('jobsldn/images/icons/ic-actions-trash.svg')}}"
                                                     alt="Trash"
                                                     class="action-trash">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
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
                    <form>
                        <div class="row gap-50">
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input type="text" name="current_password" id="current_password"
                                           class="form-control" required>
                                    <label class="floating-label" for="current_password">Current Password*</label>
                                    <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 d-none d-lg-block"></div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group is-floating-label">
                                    <div class="is-floating-label">
                                        <label class="floating-label" for="new_password">New Password</label>
                                        <input type="password" name="new_password" id="new_password"
                                               class="form-control"/>
                                        <ion-icon class="toggle-password with-p" name="eye-outline"></ion-icon>
                                        <p class="note pt-1">Must be at least 8 characters</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group is-floating-label">
                                    <div class="is-floating-label">
                                        <label class="floating-label" for="repeat_password">Must match your New
                                            Password</label>
                                        <input type="password" name="repeat_password" id="repeat_password"
                                               class="form-control"/>
                                        <ion-icon class="toggle-password with-p" name="eye-outline"></ion-icon>
                                        <p class="note pt-1">Must be at least 8 characters</p>
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
@endsection