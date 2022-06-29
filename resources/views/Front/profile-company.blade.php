@extends('FrontLayout.index')
@section('content')

    <!-- Profile-->
    <section class="profile py-5">
        <div class="container">
            <h1 class="mb-4 text-center text-md-left">Profile</h1>
            <form method="POST" action="{{route('company-profile.update',1)}}">
                @method('PUT')
                @csrf
                <div>
                    <div class="row pb-0 pb-md-5">
                        <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                            <h6 class="mb-1">Account Type</h6>
                            <small class="text-muted mb-4 mb-md-0">Your account type determine your role on our website
                                it can’t be changed.</small>
                        </div>
                        <div class="col-md-9  text-center text-md-left">
                            @if(auth()->guard('job_seekers')->check())
                                <a class="btn btn-primary-ldn px-5"> Job Seeker</a>
                                <a class="btn btn-primary-ldn-outline px-5 ml-2 disabled"> Company</a>
                            @elseif(auth()->guard('companies')->check())
                                <a class="btn btn-primary-ldn-outline px-5 ml-2 disabled"> Job Seeker</a>
                                <a class="btn btn-primary-ldn px-5 ml-2"> Company</a>
                            @endif
                            <br>
                            <br>
                            <hr class="mt-5">
                        </div>
                    </div>

                    <div class="row pb-0 pb-md-2">
                        <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                            <h6 class="mb-1">My Account</h6>
                            <small class="text-muted mb-4 mb-md-0">Manage all details for your personal account.</small>
                        </div>
                        <div class="col-md-9 pb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    @if(session('msgProfile'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{session('msgProfile')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 py-3">
                                    <input name="first_name" class="form-control form-control-lg" type="text"
                                           placeholder="First Name *" value="{{$user->first_name}}"
                                           required>
                                </div>
                                <div class="col-md-6 py-3">
                                    <input name="last_name" class="form-control form-control-lg" type="text"
                                           placeholder="Last Name *"
                                           required value="{{$user->last_name}}">
                                </div>
                                <div class="col-md-6 py-3">
                                    <input name="email" class="form-control form-control-lg" type="email"
                                           placeholder="Email *"
                                           required value="{{$user->email}}">
                                </div>
                                <div class="col-md-6 py-3">
                                    <input name="confirm_email" class=" form-control form-control-lg" type="email"
                                           placeholder="Confirm Email *" value="{{$user->confirm_email}}">
                                    <span><small class="text-muted">Leave this field empty if you do not make any changes.</small></span>
                                </div>
                                <div class="px-md-3 mt-4 text-center text-md-left form-actions">
                                    <button class="btn btn-primary-ldn px-5" type="submit">Update</button>
                                    <button class="btn all-jobs ml-3 mt-4 mt-md-0" type="submit">Delete My Account
                                    </button>
                                </div>

                            </div>
                            <br>
                            <hr class="mt-5">
                        </div>
                    </div>
                </div>
            </form>
            <!-- company details-->

            @if(auth()->guard('companies')->check())
                <form method="POST" action="{{route('updateCompanyFront')}}">
                    @csrf
                    <div class="row pb-0 pb-md-5">
                        <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                            <h6 class="mb-1">Company Details</h6>
                            <small class="text-muted mb-4 mb-md-0">Tell us about your company so jobseekers know who you
                                are.</small>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    @if(session('msgCompany'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{session('msgCompany')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 py-3">
                                    <div class="profile__details">
                                        <div class="profile__details-logo"><span
                                                    class="profile__details-logo-text">Logo</span></div>
                                        <div class="profile__details-actions">
                                            <div class="profile__details-actions-item">
                                                <label for="profileLogo"><img
                                                            src="{{asset('assets/images/icons/upload.svg')}}"></label>
                                                <input class="profile__details-image-upload" type="file"
                                                       id="profileLogo" name="profileLogo" accept="image/*">
                                            </div>
                                            <div class="profile__details-actions-item"><a
                                                        class="profile__details-logo-image-remover" href=""
                                                        data-toggle="modal" data-target="#modalDeleteThis"><img
                                                            src="{{asset('assets/images/icons/delete.svg')}}"></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 py-3">
                                    <input name="company_name" class="form-control form-control-lg" type="text" placeholder="Company *"
                                           required value="{{$user->company_name}}">
                                </div>
                                <div class="col-md-6 py-3">
                                    <input name="employee_count" class="form-control form-control-lg" type="number"
                                           placeholder="Number of Employees *" required value="{{$user->employee_count}}">
                                </div>
                                <div class="col-md-6 py-3">
                                    <input name="industry" class="form-control form-control-lg" type="text" placeholder="Industry *"
                                           required value="{{$user->industry}}">
                                </div>
                                <div class="col-md-6 py-3">
                                    <input name="website_url" class="form-control form-control-lg" type="text" placeholder="Website *"
                                           required value="{{$user->website_url}}">
                                </div>
                                <div class="col-md-12 py-3">
                                    <textarea name="overview" class="form-control" rows="5" placeholder="Overview *"
                                              required>{{$user->overview}}</textarea>
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
        @endif
        <!-- security-->
            <div class="row pb-0 pb-md-2">
                <div class="col-md-3 pr-md-5 text-center text-md-left mt-4 mt-md-0">
                    <h6 class="mb-1">Security</h6>
                    <small class="text-muted mb-4 mb-md-0">Only change the password when necessary.</small>
                </div>
                <div class="col-md-9">
                    <form method="POST" action="{{route('updatePasswordFront')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                @if(session('msg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{session('msg')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 py-3">
                                <div class="input-group">
                                    <input name="currPassword" class="form-control form-control-lg" type="password"
                                           placeholder="Current Password *" data-toggle="password" required>
                                    {{--                                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-eye-slash"></i></span></div>--}}
                                </div>
                                <small><span
                                            class="text-danger">@error('currPassword'){{ $message }}@enderror</span></small>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6 py-3">
                                <div class="input-group">
                                    <input name="password" class="form-control form-control-lg" type="password"
                                           placeholder="New Password *" data-toggle="password" required>
                                    {{--                                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-eye-slash"></i></span></div><span class="input-group-instructions text-muted">Must be at least 8 characters</span>--}}
                                </div>
                                {{--                                    <span><small class="text-muted">Must be at least 8 characters</small></span>--}}
                                <small><span
                                            class="text-danger">@error('password'){{ $message }}@enderror</span></small>
                            </div>
                            <div class="col-md-6 py-3">
                                <div class="input-group">
                                    <input name="password_confirmation" class="form-control form-control-lg"
                                           type="password"
                                           placeholder="Password Confirmation *" data-toggle="password"
                                           required>
                                    {{--                                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-eye-slash"></i></span></div>--}}
                                </div>
                                {{--                                    <span><small class="text-muted">Must be at least 8 characters</small></span>--}}
                                <small><span
                                            class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span></small>
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
        </div>
    </section>
    <!-- profile-end-->
@endsection