<!DOCTYPE html>
<html lang="en">

@include('frontend.jobsldn.app.links')

<body>

<!-- Start Cookies -->
@include('frontend.jobsldn.app.cookie')
<!-- End Cookies -->


<!-- Start Header -->
@include('frontend.jobsldn.app.header')

@yield('content')
@include('frontend.jobsldn.app.footer')
@include('frontend.jobsldn.app._modals')
<!-- IonIcons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>