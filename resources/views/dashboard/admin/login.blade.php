<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta charset="utf-8"/>
    <title>Login to Admin Panel</title>
    <meta name="description" content="Login page example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{asset('assets/css/pages/login/login-2.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
            <!--begin: Aside Container-->
            <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
                <!--begin::Logo-->
                <a href="{{route('admin.home')}}" class="text-center pt-2">
                    <img src="{{asset('assets/media/svg/logo.svg')}}" class="max-h-75px" alt=""/>
                </a>
                <!--end::Logo-->
                <!--begin::Aside body-->
                <div class="d-flex flex-column-fluid flex-column flex-center">
                    <!--begin::Signin-->
                    <div class="login-form login-signin py-1">
                        <!--begin::Form-->
                        <form id="login-form" class="form" action="{{ route('admin.check') }}" method="post">
                        @csrf
                        <!--begin::Title-->
                            <div class="text-center pb-8">
                                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h2>
                            </div>
                            <!--end::Title-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text"
                                       name="email" autocomplete="off"/>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                    <a href="javascript:;"
                                       class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5"
                                       id="kt_login_forgot">Forgot Password ?</a>
                                </div>
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg"
                                       type="password" name="password" autocomplete="off"/>
                            </div>
                            <!--end::Form group-->
                            <!--begin::Action-->
                            <div class="text-center pt-2">
                                <button id="kt_login_signin_submit"
                                        class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">Sign In
                                </button>
                            </div>
                            <!--end::Action-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->

                </div>
                <!--end::Aside body-->
            </div>
            <!--end: Aside Container-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">
            <!--begin::Title-->
            <div class="d-flex flex-column justify-content-center text-center pt-lg-40 pt-md-5 pt-sm-5 px-lg-0 pt-5 px-7">
                <h3 class="display4 font-weight-bolder my-7 text-dark" style="color: #986923;">Amazing Wireframes</h3>
                <p class="font-weight-bolder font-size-h2-md font-size-lg text-dark opacity-70">User Experience &amp;
                    Interface Design, Product Strategy
                    <br/>Web Application SaaS Solutions</p>
            </div>
            <!--end::Title-->
            <!--begin::Image-->
            <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"
                 style="background-image: url(assets/media/svg/illustrations/login-visual-2.svg);"></div>
            <!--end::Image-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
{{--<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>--}}
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {"breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/js/pages/custom/login/login-general.js')}}"></script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        background: #c9ccd1;
    }
    .form-style input{
        border:0;
        height:50px;
        border-radius:0;
        border-bottom:1px solid #ebebeb;
    }
    .form-style input:focus{
        border-bottom:1px solid #007bff;
        box-shadow:none;
        outline:0;
        background-color:#ebebeb;
    }
    .sideline {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        text-align: center;
        color:#ccc;
    }
    button{
        height:50px;
    }
    .sideline:before,
    .sideline:after {
        content: '';
        border-top: 1px solid #ebebeb;
        margin: 0 20px 0 0;
        flex: 1 0 20px;
    }

    .sideline:after {
        margin: 0 0 0 20px;
    }
</style>
<body>
<div class="container">
    <div class="row m-5 no-gutters shadow-lg">
        <div class="col-md-6 d-none d-md-block">
            <img src="https://images.unsplash.com/photo-1566888596782-c7f41cc184c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=2134&q=80" class="img-fluid" style="min-height:100%;" />
        </div>
        <div class="col-md-6 bg-white p-5">
            <h3 class="pb-3">Login Form</h3>
            <div class="form-style">
                <form>
                    <div class="form-group pb-3">
                        <input type="email" placeholder="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group pb-3">
                        <input type="password" placeholder="Password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center"><input name="" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Remember Me</span></div>
                        <div><a href="#">Forget Password?</a></div>
                    </div>
                    <div class="pb-2">
                        <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Submit</button>
                    </div>
                </form>
                <div class="sideline">OR</div>
                <div>
                    <button type="submit" class="btn btn-primary w-100 font-weight-bold mt-2"><i class="fa fa-facebook" aria-hidden="true"></i> Login With Facebook</button>
                </div>
                <div class="pt-4 text-center">
                    Get Members Benefit. <a href="#">Sign Up</a>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://use.fontawesome.com/f59bcd8580.js"></script>
</body>
</html>