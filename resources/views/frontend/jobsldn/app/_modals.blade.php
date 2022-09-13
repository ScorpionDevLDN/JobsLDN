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
                            <h5>We’re glad to see you again!</h5>
                            <p>Don’t have an account? <a href="#" class="sign-up">Sign Up!</a></p>
                        </div>
                        <form class="px-0" action="{{route('job_seeker.check')}}" method="post">
                            @method('post')
                            @csrf
                            <div class="row gap-50">
                                <div class="col-12">
                                    <div class="floating-label-group">
                                        <input type="email" name="email" id="login_email" class="form-control"
                                               required/>
                                        <label class="floating-label" for="login_email">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="floating-label-group">
                                        <input type="text" name="password" id="login_password"
                                               class="form-control"
                                               required>
                                        <label class="floating-label" for="login_password">Password</label>
                                        <ion-icon class="toggle-password with-forgot-pass"
                                                  name="eye-outline"></ion-icon>
                                        <a href="#" class="forgot-password" data-bs-toggle="modal"
                                           data-bs-target="#forgot-password">Forgot Password ?</a>

                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="button w-50" type="submit">Login</button>
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
                                    <form class="px-0" method="POST" action="{{route('job_seeker.createJobSeeker')}}">
                                        @csrf
                                        <div class="row gap-50">
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input type="text" name="first_name" id="first_name"
                                                           class="form-control"
                                                           required/>
                                                    <label class="floating-label" for="first_name">First Name</label>
                                                    <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input type="text" name="last_name" id="last_name"
                                                           class="form-control"
                                                           required/>
                                                    <label class="floating-label" for="last_name">Last Name</label>
                                                    <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input type="email" name="email" id="register_email"
                                                           class="form-control" required/>
                                                    <label class="floating-label" for="register_email">Email</label>
                                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group is-floating-label">
                                                    <div class="is-floating-label">
                                                        <label class="floating-label" for="confirm_email">Confirm
                                                            Email</label>
                                                        <input type="email" name="confirm_email" id="confirm_email"
                                                               class="form-control"/>
                                                        <span class="text-danger">@error('confirm_email'){{ $message }}@enderror</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input type="text" name="password" id="register_password"
                                                           class="form-control" required>
                                                    <label class="floating-label"
                                                           for="register_password">Password</label>
                                                    <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group is-floating-label">
                                                    <div class="is-floating-label">
                                                        <label class="floating-label" for="confirm_password">Confirm
                                                            Password</label>
                                                        <input type="password" name="cpassword"
                                                               id="confirm_password"
                                                               class="form-control"/>
                                                        <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="checkboxes d-inline">
                                                    <input id="check" type="checkbox" name="check">
                                                    <label for="check">
                                                        By continuing you accept our standard
                                                        <a href="#">terms and conditions </a> and our
                                                        <a href="#">privacy policy.</a>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button class="button w-50" type="submit">Register</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-company" role="tabpanel"
                                     aria-labelledby="nav-company-tab">
                                    <form class="px-0" method="POST" action="{{route('job_seeker.createCompany')}}">
                                        @csrf
                                        <div class="row gap-50">
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input type="text" name="first_name" id="first_name"
                                                           class="form-control"
                                                           required/>
                                                    <label class="floating-label" for="first_name">First Name</label>
                                                    <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input type="text" name="last_name" id="last_name"
                                                           class="form-control"
                                                           required/>
                                                    <label class="floating-label" for="last_name">Last Name</label>
                                                    <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input type="email" name="email" id="register_email"
                                                           class="form-control" required/>
                                                    <label class="floating-label" for="register_email">Email</label>
                                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group is-floating-label">
                                                    <div class="is-floating-label">
                                                        <label class="floating-label" for="confirm_email">Confirm
                                                            Email</label>
                                                        <input type="email" name="confirm_email" id="confirm_email"
                                                               class="form-control"/>
                                                        <span class="text-danger">@error('confirm_email'){{ $message }}@enderror</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group">
                                                    <input type="text" name="password" id="register_password"
                                                           class="form-control" required>
                                                    <label class="floating-label"
                                                           for="register_password">Password</label>
                                                    <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="floating-label-group is-floating-label">
                                                    <div class="is-floating-label">
                                                        <label class="floating-label" for="confirm_password">Confirm
                                                            Password</label>
                                                        <input type="password" name="cpassword"
                                                               id="confirm_password"
                                                               class="form-control"/>
                                                        <ion-icon class="toggle-password" name="eye-outline"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <p class="checkboxes d-inline">
                                                    <input checked id="check" type="checkbox" name="check">
                                                    <label for="check">
                                                        By continuing you accept our standard
                                                        <a href="#">terms and conditions </a> and our
                                                        <a href="#">privacy policy.</a>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button class="button w-50" type="submit">Register</button>
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
                <form class="px-0">
                    <div class="row gap-50">
                        <div class="col-12">
                            <div class="floating-label-group">
                                <input type="email" name="login_email" id="login_email" class="form-control" required/>
                                <label class="floating-label" for="login_email">Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-center">
                                <button class="button w-50" type="button">Send</button>
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
