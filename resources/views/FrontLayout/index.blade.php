@include('FrontLayout.header')
<body>
<!-- Fallback javascript-->
@include('FrontLayout.noScript')

<!-- Navbar-->
@include('FrontLayout.nav')
<!-- navbar-end-->

@yield('content')

<!-- Footer-->
@include('FrontLayout.footer')
<!-- footer-end-->

<!-- Modals-->
@include('FrontLayout.modals')
@include('FrontLayout.footer_script')
</body>
</html>