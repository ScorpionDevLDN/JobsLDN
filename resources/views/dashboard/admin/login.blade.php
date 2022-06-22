<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login To Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" autocomplete="off" action="{{ route('admin.check') }}"
                  method="post">
                <img src="{{asset('assets/images/logo.svg')}}" alt="" style="margin-top: -200px;margin-left: 25%">
                @csrf
                <span class="login100-form-title p-b-43">
						Login to Admin Panel
					</span>

                <span class="text-danger">
                    @if(session('msgTst'))
                        <div class="text-danger">{{session('msgTst')}}</div>
                    @endif</span>

                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input autocomplete="off" class="input100" type="text" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>

                <span class="text-danger">@if(session('error'))
                        <div class="text-danger">{{session('error')}}</div>
                    @endif</span>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input autocomplete="off" class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div>
                        <a href="{{route('admin.forget.password.get')}}" class="txt1">
                            Forgot Password?
                        </a>
                    </div>
                </div>


                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>

            </form>

            <div class="login100-more" style="background-image: url({{asset('admin/images/bg-01.jpg')}});">
            </div>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="{{asset('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/js/main.js')}}"></script>

</body>
</html>