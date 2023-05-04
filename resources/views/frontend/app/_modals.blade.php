<div class="modal fade" id="login-register" tabindex="-1" aria-labelledby="loginRegisterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="loginRegisterLabel">
                    <div class="nav nav-tabs border-0 gap-5 align-items-start" id="nav-tab" role="tablist">
                        <button class="login-register-tab btn active" id="login-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login"
                                aria-selected="true">
                            Login
                        </button>
                        <button class="login-register-tab btn" id="nav-register-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register"
                                aria-selected="false">
                            Register
                        </button>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content" id="login-register-modal">
                    <div class="tab-pane fade active show" id="nav-login" role="tabpanel" aria-labelledby="login-tab">
                        <div class="login-top text-center">
                            @include('frontend.partial.flash')
                            <h5>We’re glad to see you again!</h5>
                            <p>Don’t have an account? <a href="#" class="sign-up">Sign Up!</a></p>
                        </div>
                        <form id="Login" class="px-0" autocomplete="off">

                            <div class="row gap-50">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                                <div class="col-12">
                                    <div class="floating-label-group">
                                        <input required value="{{ old('email') }}" type="email" name="email"
                                               id="login_email2"
                                               class="form-control"
                                        />
                                        <label class="floating-label" for="login_email2">Email</label>
                                        <span class="text-danger" id="fail_email"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="floating-label-group">
                                        <input required value="{{ old('password') }}" type="password" name="password"
                                               id="login_password2"
                                               class="form-control"
                                        >
                                        <label class="floating-label" for="login_password2">Password</label>
                                        <span id="password-error" class="text-danger"></span>
                                        <ion-icon class="toggle-password with-forgot-pass"
                                                  name="eye-outline"></ion-icon>
                                        <span class="text-danger" id="fail_password"></span>
                                        <br>
                                        <a href="#" class="forgot-password" data-bs-toggle="modal"
                                           data-bs-target="#forgot-password">Forgot Password ?</a>
                                    </div>

                                </div>
                                <div class="col-12 text-center">
                                    <button id="submitForm" class="button w-50 btn-submit" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                        <h5 class="register-top text-center">Let’s create your account!</h5>
                        <div class="row mb-0">
                            <div class="col-12">
                                <div class="nav nav-tabs border-0 justify-content-center account-type-btns" id="nav-tab"
                                     role="tablist">
                                    <button class="account-type-tab account-type-btn button outline active"
                                            id="nav-jobseeker-tab" data-bs-toggle="tab" data-bs-target="#nav-jobseeker"
                                            type="button" role="tab" aria-controls="nav-jobseeker"
                                            aria-selected="true">Jobseeker
                                    </button>
                                    <button class="account-type-tab account-type-btn button outline"
                                            id="nav-company-tab"
                                            data-bs-toggle="tab" data-bs-target="#nav-company" type="button" role="tab"
                                            aria-controls="nav-company" aria-selected="false">Company
                                    </button>
                                </div>
                            </div>
                            <div class="tab-content p-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-jobseeker" role="tabpanel"
                                     aria-labelledby="nav-jobseeker-tab">
                                    <form class="px-0" autocomplete="off">
                                        <div class="row gap-50">
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input autocomplete="off"  required value="{{old('first_name')}}" type="text"
                                                           name="first_name"
                                                           id="first_name"
                                                           class="form-control"
                                                    />
                                                    <label class="floating-label" for="first_name">First Name</label>
                                                    <span class="text-danger" id="first_name_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input autocomplete="off" required value="{{old('last_name')}}" type="text"
                                                           name="last_name"
                                                           id="last_name"
                                                           class="form-control"
                                                    />
                                                    <label class="floating-label" for="last_name">Last Name</label>
                                                    <span class="text-danger" id="last_name_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" required value="{{old('email','')}}" type="email" name="email"
                                                           id="register_email"
                                                           class="form-control"/>
                                                    <label class="floating-label" for="register_email">Email</label>
                                                    <span class="text-danger" id="register_email_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group is-floating-label">
                                                    <div class="is-floating-label">
                                                        <label class="floating-label" for="confirm_email">Confirm
                                                            Email</label>
                                                        <input required value="{{old('confirm_email','')}}" type="email"
                                                               name="confirm_email" id="confirm_email"
                                                               class="form-control"/>
                                                        <span class="text-danger" id="confirm_email_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input required value="{{old('password')}}" type="password"
                                                           name="password"
                                                           id="password"
                                                           class="form-control">
                                                    <label class="floating-label"
                                                           for="register_password">Password</label>
                                                    <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                                    <span class="text-danger" id="password_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input required value="{{old('password_confirmation')}}"
                                                           type="password"
                                                           name="cpassword" id="confirm_password"
                                                           class="form-control">
                                                    <label class="floating-label"
                                                           for="register_password">Confirm Password</label>
                                                    <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                                    <span class="text-danger" id="confirm_password_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="checkboxes d-inline">
                                                    <input required id="check8" type="checkbox" name="check" value="1">
                                                    <label for="check8">
                                                        By continuing you accept our standard
                                                        <a target="_blank" href="{{route('termsAndConditions')}}">terms
                                                            and conditions </a> and our
                                                        <a target="_blank" href="{{route('privacyPolicy')}}">privacy
                                                            policy.</a>
                                                    </label>
                                                </p>
                                                <span class="text-danger" id="check_error"></span>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button class="button w-50 btn-register-job-submit" type="submit">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-company" role="tabpanel"
                                     aria-labelledby="nav-company-tab">
                                    <form class="px-0" autocomplete="off">
                                        <div class="row gap-50">
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input required value="{{old('first_name')}}" type="text"
                                                           name="first_name"
                                                           id="first_name1"
                                                           class="form-control"
                                                    />
                                                    <label class="floating-label" for="first_name">First Name</label>
                                                    <span class="text-danger" id="first_name_error1"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input required value="{{old('last_name')}}" type="text"
                                                           name="last_name"
                                                           id="last_name1"
                                                           class="form-control"
                                                    />
                                                    <label class="floating-label" for="last_name">Last Name</label>
                                                    <span class="text-danger" id="last_name_error1"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input readonly onfocus="this.removeAttribute('readonly');" required value="{{old('email')}}" type="email" name="email"
                                                           id="register_email1"
                                                           class="form-control"/>
                                                    <label class="floating-label" for="register_email">Email</label>
                                                    <span class="text-danger" id="register_email_error1"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group is-floating-label">
                                                    <div class="is-floating-label">
                                                        <label class="floating-label" for="confirm_email">Confirm
                                                            Email</label>
                                                        <input required value="{{old('confirm_email')}}" type="email"
                                                               name="confirm_email" id="confirm_email1"
                                                               class="form-control"/>
                                                        <span class="text-danger" id="confirm_email_error1"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input required value="{{old('password')}}" type="password"
                                                           name="password"
                                                           id="password1"
                                                           class="form-control">
                                                    <label class="floating-label"
                                                           for="register_password">Password</label>
                                                    <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                                    <span class="text-danger" id="password_error1"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input required value="{{old('password_confirmation')}}"
                                                           type="password"
                                                           name="password_confirmation" id="confirm_password1"
                                                           class="form-control">
                                                    <label class="floating-label"
                                                           for="register_password">Confirm Password</label>
                                                    <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                                    <span class="text-danger" id="confirm_password_error1"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="checkboxes d-inline">
                                                    <input required id="check81" type="checkbox" name="check">
                                                    <label for="check81">
                                                        By continuing you accept our standard
                                                        <a target="_blank" href="{{route('termsAndConditions')}}">terms
                                                            and conditions </a> and our
                                                        <a target="_blank" href="{{route('privacyPolicy')}}">privacy
                                                            policy.</a>
                                                    </label>
                                                </p>
                                                <span class="text-danger" id="check_error1"></span>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button class="button w-50 btn-register-company-submit" type="submit">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Forgot Password -->


<div class="modal fade" id="forgot-password" tabindex="-1" aria-labelledby="forgotPpasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="forgotPpasswordLabel">Forgot Password</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <div class="modal-body m-50">
                <form class="px-0" autocomplete="off">
                    <div class="row gap-50">
                        <div class="col-12">
                            <div class="floating-label-group">
                                <input autocomplete="off" required type="email" name="email" id="login_email_forget" class="form-control"/>
                                <label class="floating-label" for="login_email_forget">Email</label>
                                <span class="text-danger" id="login_email_forget_error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-center">
                                <button class="button w-50 btn-forget-submit" type="submit">Send</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


{{--logout--}}
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="logoutLabel">Notification</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <form action="{{route('logoutFront')}}" method="post">
                @csrf
                <div class="modal-body">
                    <h5 class="text-center">Are you sure you want to log out?</h5>
                </div>
                <div class="modal-footer">
                    <button class="button mx-auto" type="submit">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{--terms and condition--}}
<div class="modal fade" id="terms-condition" tabindex="-1" aria-labelledby="terms-condition" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="logoutLabel">Terms And Condition</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">{!! $setting['terms'] !!}</h5>
            </div>

            <div class="modal-footer">
                <button class="button mx-auto" data-bs-target="#login-register" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Back
                </button>
            </div>

        </div>
    </div>
</div>

{{--Privacy--}}
<div class="modal fade" id="privacy" tabindex="-1" aria-labelledby="privacy" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="logoutLabel">Privacy And Policy</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">{!! $setting['privacy'] !!}</h5>
            </div>
            <div class="modal-footer">
                <button class="button mx-auto" data-bs-target="#login-register" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Back
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="forget_success" tabindex="-1" aria-labelledby="privacy" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="logoutLabel">Notification</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <div class="modal-body">
                <h5 style="line-height: 35px" class="text-center my-3">
                    We have sent you instructions. Please check your email address.
                </h5>
            </div>
        </div>
    </div>
</div>


@if(isset($post))
    <div class="modal fade" id="upload_cv" tabindex="-1" aria-labelledby="upload_cv" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="upload_cv">Please attach your CV to apply</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>
                <div class="modal-body">
                    <section style="margin-top: -100px;margin-bottom: -100px" class="profile-content jobseeker"
                             id="upload">
                        <form action="{{route('uploadApply',$post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @error('pdf')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="container">
                                <div class="row gap-30">
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <div class="pdf-upload-btn custom-upload file">
                                            <label
                                                    class="custom-upload__button button outline d-inline-flex gap-3 align-items-center w-auto"
                                                    for="client_form_file_cv-test" data-element="custom-upload-button">
                                                Upload New CV
                                                <img src="{{asset('frontend/images/icons/ic-actions-add-file.svg')}}"
                                                     alt="Upload Icon">
                                            </label>
                                            <input onchange="form.submit()" class="custom-upload__input" name="pdf"
                                                   accept=".pdf"
                                                   id="client_form_file_cv-test" type="file"
                                                   data-behaviour="custom-upload-input">
                                            <p class="note">You can only upload PDF files.
                                                <br> Maximum file size: 10 MB
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endif


