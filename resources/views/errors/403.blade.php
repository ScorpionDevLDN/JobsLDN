<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{\App\Models\Setting::query()->first()->website_name}}</title>
    <!-- Site Icon -->
    <link rel="shortcut icon" href="{{asset('frontend/new/images/logo.svg')}}" type="image/x-icon">

    <!-- *****Css Files***** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend/new/css/bootstrap/bootstrap.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('frontend/new/css/animate.min.css')}}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('frontend/new/css/style.css')}}">

    <!-- *****Js Files***** -->

    <!-- Jquery -->
    <script defer src="{{asset('frontend/new/jquery.min.js')}}"></script>
    <!-- Smoth Scroll -->
    <script defer src="{{asset('frontend/new/smoth-scroll.min.js')}}"></script>
    <!-- Wow Js -->
    <script src="{{asset('frontend/new/wow.min.js')}}"></script>

    <!-- Main Script -->
    <script defer src="{{asset('frontend/new/main.js')}}"></script>
</head>

<body>

<section class="error-page overflow-hidden d-flex justify-content-center align-items-center gap-5 flex-column pt-5" id="error-page">
    <div class="container text-center">
        <h1 class="wow animate animate__fadeInDown">OOPS!</h1>
        <h4 class="wow animate animate__fadeInUp">We're working on it and we'll get it fixed as soon possible. </h4>

        <img src="{{asset('frontend/new/images/403.svg')}}" alt="Error" class=" wow animate animate__fadeInOut">
    </div>
    <div class="text-center">
        <a href="{{route('home.index')}}" class="button">Go To Home Page</a>
    </div>
</section>

</body>

</html>