<!-- Modals-->
<!-- Login/Register modal-->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-3">
                <div class="modal-header-tabs">
                    <div class="modal-header-tabs__tab active" id="login-form-title">
                        <h6 class="modal-title">Login</h6>
                    </div>
                    <div class="modal-header-tabs__tab" id="register-form-title">
                        <h6 class="modal-title">Register</h6>
                    </div>
                </div>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="login-form">
                    <div class="text-center">
                        <h6 class="mb-1">We are glad to see you again!</h6>
                        <small>Don’t have an account? <a href="#" id="register-form-link">Sign Up!</a></small>
                    </div>
                    <form method="POST" action="{{route('job_seeker.check')}}">
                        @csrf
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" placeholder="Email"
                                               name="email" required>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="password"
                                               placeholder="Password" name="password" required>
                                    </div>
                                    <div class="my-3"><a class="text-dark" href="" id="modal-forgot-password-link"
                                                         data-toggle="modal"
                                                         data-target="#modalForgotPassword" data-dismiss="modal"><small>Forgot
                                                Password?</small></a></div>
                                    <div class="center" style="text-align: center">
                                        <button class="btn btn-primary-ldn px-5 text-center" type="submit">Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="register-form">
                    <div class="text-center">
                        <h6>Let's create your account!</h6>
                    </div>
                    <form method="POST" action="{{route('job_seeker.create')}}">
                        @csrf
                        <div class="row mt-5">
                            <div class="col-12 mb-4">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn ayaTst px-5 mr-4 active">
                                        <input type="radio" name="type" value="jobseeker"> Jobseeker
                                    </label>
                                    <label class="btn ayaTst px-5 mr-4">
                                        <input type="radio" name="type" value="company">Company
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <input class="form-control form-control-lg" type="text" placeholder="First Name"
                                       name="first_name">
                                <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-12 mb-3">
                                <input class="form-control form-control-lg" type="text" placeholder="Last Name"
                                       name="last_name">
                                <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-12 mb-3">
                                <input class="form-control form-control-lg" type="email" placeholder="Email"
                                       name="email">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-12 mb-3">
                                <input class="form-control form-control-lg" type="email" placeholder="Confirm Email"
                                       name="confirm_email">
                                <span class="text-danger">@error('confirm_email'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-12 mb-3">
                                <input class="form-control form-control-lg" type="password" placeholder="Password"
                                       name="password">
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-12 mb-3">
                                <input class="form-control form-control-lg" type="password" placeholder="Password"
                                       name="cpassword" required>
                            </div>
                            <div class="col-12">
                                <div class="form-check my-3">
                                    <input class="form-check-input" type="checkbox" name="read_conditions"
                                           id="registerTerms" required>
                                    <label for="registerTerms"><small>
                                            By continuing you accept our standard <a href="#">terms
                                                and conditions</a> and our <a href="#">privacy policy</a>
                                        </small></label>
                                </div>
                                <br>
                                <div class="center" style="text-align: center">
                                    <button class="btn btn-primary-ldn px-5" type="submit">Register</button>
                                </div>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login-register-modal-end-->

<!-- Forgot password modal-->
<div class="modal fade" id="modalForgotPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-3">
                <h6 class="modal-title">Reset password</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="text-center">
                                <h6>Enter Your Email to Reset Your Password</h6>
                            </div>
                            <input class="form-control form-control-lg" type="email" placeholder="ُEnter Your Email"
                                   name="email"
                                   required>
                            <div class="center my-4" style="text-align: center">
                                <button class="btn btn-primary px-5" type="submit">Reset Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- forgot-password-modal-end-->

<!-- Create a new job post modal-->
<div class="modal fade" id="modalCreateJob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-5">
            <div class="modal-header">
                <h5 class="modal-title">Create a new job post</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="#">
                    <div class="row mt-5 text-center">
                        <div class="col-12 mb-3">
                            <input class="form-control-lg" type="text" placeholder="Title *" name="jobTitle">
                        </div>
                        <div class="col-12 mb-3">
                            <textarea class="form-control" name="jobSummary" rows="5" placeholder="Summary *"
                                      required></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <d-flex class="justify-content-between">
                                <input type="text" placeholder="Salary *" name="jobSalary">
                                <select name="jobSalaryCurrency">
                                    <option value="currency1">Currency 1</option>
                                    <option value="currency2">Currency 2</option>
                                    <option value="currency3">Currency 3</option>
                                </select>
                            </d-flex>
                        </div>
                        <div class="col-12 mb-3">
                            <select name="jobSalaryPer">
                                <option value="hour">Hour</option>
                                <option value="day">Day</option>
                                <option value="month">Month</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <select name="jobType">
                                <option value="type1">Type 1</option>
                                <option value="type2">Type 2</option>
                                <option value="type3">Type 3</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <select name="jobCategory">
                                <option value="category1">Category 1</option>
                                <option value="category2">Category 2</option>
                                <option value="category3">Category 3</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <select name="jobCity">
                                <option value="city1">City 1</option>
                                <option value="city2">City 2</option>
                                <option value="city3">City 3</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <input class="form-control-lg" type="date" placeholder="Expiration Date *">
                        </div>
                        <div class="col-12 mb-3">
                            <input class="form-control-lg" type="email" placeholder="Email *"><span class="text-muted">You will receive direct applaied requests.</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- create-a-new-job-post-modal-end-->

<!-- Notifications modals-->
<!-- Logout modal-->
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h6>Are you sure you want to log out?</h6>
                <div class="my-4">
                    <form method="POST" action="#">
                        <button class="btn btn-primary px-5" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- logout-modal-end-->

<!-- Delete item modal-->
<div class="modal fade" id="modalDeleteThis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h6>Are you sure you want to delete this?</h6>
                <div class="my-4">
                    <button class="btn btn-primary px-5" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- delete-item-modal-end-->

<!-- Retract application-->
<div class="modal fade" id="modalRetractApplicationConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h6>Are you sure you want to retract your application?</h6>
                <div class="my-4">
                    <button class="btn btn-primary px-5" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- retract-application-end-->

<!-- Retract application success-->
<div class="modal fade" id="modalRetractApplicationSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center"><i class="fas fa-check text-muted text-success fa-2x my-3"></i>
                <h6 class="text-success">Are you sure you want to retract your application?</h6>
                <div class="my-4">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- retract-application-success-end-->

<!-- Can't complete this action-->
<div class="modal fade" id="modalActionNotSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center"><i class="fas fa-times text-muted text-danger fa-2x my-3"></i>
                <h6 class="text-danger">Sorry! We can't complete this action at this time!</h6>
                <div class="my-4">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cannot-complete-action-end-->
