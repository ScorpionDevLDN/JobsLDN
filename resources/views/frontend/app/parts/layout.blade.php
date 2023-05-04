<!DOCTYPE html>
<html lang="en">
@php $menu = '';@endphp
@include('frontend.app.links')

<body>


<!-- Start Header -->
@include('frontend.app.parts.job_seeker_header')
<!-- End Header -->

@yield('content')
<!-- End Profile Content -->

<!-- Start Footer -->
@include('frontend.app.footer')
<!-- End Footer -->

<!-- IonIcons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>