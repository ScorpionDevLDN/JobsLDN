@php $menu = 'profile';@endphp
@extends('frontend.app.parts.layout')
@section('content')
    <!-- Start Horizontal bar -->
    @include('frontend.app.parts.job_seeker_horizental')
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
                    @include('frontend.partial.flash')
                    <form enctype="multipart/form-data" method="post"
                          action="{{route('job_seeker-profile.update',$user->id)}}">
                        @method('put')
                        @csrf
                        <div class="row gap-50">
                            <div class="col-12 company-details-logo jobseeker-logo" id="company-logo">
                                <img src="{{auth('job_seekers')->user()->photo}}" alt="Logo" class="logo">
                                <div class="custom-upload">
                                    <label
                                            class="custom-upload__button  d-inline-flex gap-3 align-items-center w-auto upload-logo"
                                            for="client_form_file2" data-element="custom-upload-button">

                                        <img src="{{asset('frontend/images/icons/upload.svg')}}" class="icon"
                                             alt="Upload">
                                    </label>
                                    <input class="custom-upload__input" name="photo" accept=".png,.jpeg,.jpg"
                                           id="client_form_file2" type="file" data-behaviour="custom-upload-input"
                                           onchange="readURL(this);">
                                </div>
                                <img src="{{asset('frontend/images/icons/delete.svg')}}" class="icon" alt="Delete"
                                     data-bs-toggle="modal"
                                     data-bs-target="#delete-box">
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input value="{{auth('job_seekers')->user()->first_name}}" type="text"
                                           name="job_seeker_first_name" id="job_seeker_first_name"
                                           class="form-control" required/>
                                    <label class="floating-label" for="job_seeker_first_name">First Name*</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input value="{{$user->last_name}}" type="text" name="job_seeker_last_name"
                                           id="job_seeker_last_name"
                                           class="form-control" required/>
                                    <label class="floating-label" for="job_seeker_last_name">Last Name*</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group">
                                    <input value="{{$user->email}}" type="email" name="jobseeker_email"
                                           id="jobseeker_email"
                                           class="form-control" required/>
                                    <label class="floating-label" for="jobseeker_email">Email*</label>
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
                                <div class="floating-label-group is-floating-label">
                                    <div class="is-floating-label">
                                        <label for="overview" class="floating-label">Introduce Yourself
                                            *</label>
                                        <textarea name="overview" id="overview" cols="30" rows="7"
                                                  class="form-control max-length" maxlength="6500"
                                                  required>{{old('overview',$user->overview)}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <button type="submit" class="button w-100">Update</button>
                            </div>
                            <div class="col-6 col-lg-3 align-self-center text-end text-lg-start">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#delete-account"
                                   class="danger delete-account">Delete My Account</a>
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
                                                <img src="{{asset('frontend/images/icons/ic-actions-add-file.svg')}}"
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
                                                    <img src="{{asset('frontend/images/icons/ic-folder-simple.svg')}}"
                                                         alt="Icon">
                                                </div>
                                                <p>{{$cv->cv_name}}</p>
                                                <span>3MB</span>
                                            </div>
                                            <div class="actions">
                                                <a href="{{route('downloadCv',$cv->id)}}">
                                                    <img src="{{asset('frontend/images/icons/ic-actions-download.svg')}}"
                                                         alt="Download"
                                                         class="action-download">
                                                </a>
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#delete-cv{{$cv->id}}">
                                                    <img src="{{asset('frontend/images/icons/ic-actions-trash.svg')}}"
                                                         alt="Trash"
                                                         class="action-trash">
                                                </a>
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
                    <form method="POST" action="{{route('updatePasswordFront')}}">
                        @csrf
                        <div class="row gap-50">
                            <div class="col-12 col-lg-6">
                                @if(session('msg'))
                                    <span class="text-danger">{{session('msg')}}</span>
                                @endif
                                <div class="floating-label-group">
                                    <input type="password" name="currPassword" id="current_password"
                                           class="form-control" required>
                                    <label class="floating-label" for="current_password">Current Password*</label>
                                    <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                    @error('currPassword')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 d-none d-lg-block"></div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group is-floating-label">
                                    <div class="is-floating-label">
                                        <label class="floating-label" for="new_password">New Password</label>
                                        <input required type="password" name="password" id="new_password"
                                               class="form-control"/>
                                        <ion-icon class="toggle-password with-p" name="eye-outline"></ion-icon>
                                        <p class="note pt-1">Must be at least 8 characters</p>
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="floating-label-group is-floating-label">
                                    <div class="is-floating-label">
                                        <label class="floating-label" for="repeat_password">Must match your New
                                            Password</label>
                                        <input required type="password" name="password_confirmation"
                                               id="repeat_password"
                                               class="form-control"/>
                                        <ion-icon class="toggle-password with-p" name="eye-outline"></ion-icon>
                                        <p class="note pt-1">Must be at least 8 characters</p>
                                        @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
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

    @foreach(auth('job_seekers')->user()->cvs as $cv)
        <div class="modal fade" id="delete-cv{{$cv->id}}" tabindex="-1" aria-labelledby="logoutLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="logoutLabel">Delete CV</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <ion-icon name="close-outline"></ion-icon>
                        </button>
                    </div>
                    <form action="{{route('deleteCv',$cv->id)}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <h5 class="text-center">Are you sure you want to delete your {{$cv->cv_name}} CV?</h5>
                        </div>
                        <div class="modal-footer">
                            <button class="button mx-auto" type="submit">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="delete-box" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="deleteLabel">Notification</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center"> Are you sure you want to delete this?</h5>
                </div>
                <div class="modal-footer">
                    <button class="button mx-auto" type="button" id="del-icon" data-bs-dismiss="modal"
                            aria-label="Close">Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection