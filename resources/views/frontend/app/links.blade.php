<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CQKBWQK40V"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-CQKBWQK40V');
    </script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting['website_name'] }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Icon -->
    <link rel="shortcut icon"
        href="{{ isset($setting->icon_logo) ? asset('storage/' . $setting->icon_logo) : asset('admin/images/dashboard-logo.png') }}" />
    <!-- *****Css Files***** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/new/css/bootstrap/bootstrap.min.css') }}">
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('frontend/new/css/jquery-ui.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/new/css/select2.min.css') }}">
    <!-- Swiper  -->
    <link rel="stylesheet" href="{{ asset('frontend/new/css/swiper-bundle.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/new/css/animate.min.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('frontend/new/css/style.css') }}">
    <style>
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px white inset !important;
        }

        input[readOnly] {
            background: white !important;
        }
    </style>
    @stack('styles')
    <style>
        .newsletter-form .form-control {
            background-color: transparent;
            border-color: #2923ff;
            border-radius: 5px;
            min-height: 60px;
            /*position: relative;*/
            z-index: 999999
        }
    </style>

    <script defer src="{{ asset('frontend/new/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script defer src="{{ asset('frontend/new/js/bootstrap.min.js') }}"></script>
    <!-- Select 2 -->
    <script defer src="{{ asset('frontend/new/js/select2.min.js') }}"></script>
    <!-- Swiper Js -->
    <script defer src="{{ asset('frontend/new/js/swiper-bundle.min.js') }}"></script>
    <!-- Smoth Scroll -->
    <script defer src="{{ asset('frontend/new/js/smoth-scroll.min.js') }}"></script>
    <!-- Wow Js -->
    <script src="{{ asset('frontend/new/js/wow.min.js') }}"></script>
    <!-- Main Script -->
    <script defer src="{{ asset('frontend/new/js/main.js') }}"></script>
    <script defer src="{{ asset('frontend/new/js/jquery-ui.min.js') }}"></script>
    <script defer src="{{ asset('frontend/new/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script defer src="{{ asset('frontend/new/js/jquery-simple-txt-counter.min.js') }}"></script>
    @stack('scripts')
</head>
