<!DOCTYPE html>
<html lang="en">

@include('frontend.app.links')

<body>

<!-- Start Cookies -->
@include('frontend.app.cookie')
<!-- End Cookies -->


<!-- Start Header -->
@include('frontend.app.header')

@yield('content')
@include('frontend.app.footer')
@include('frontend.app._modals')
<!-- IonIcons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function saveCookies(accept , url) {
        $.ajax({
            url : url,
            method : 'get',
            complete: function(json){
                console.log(json);
            }
        });
        document.getElementsByClassName('cookies-card')[0].style.visibility='hidden';
    }
</script>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $(".btn-submit").on('click keydown',function (e) {
            console.log('sad');
            e.preventDefault();

            var email = $("#login_email2").val();
            var password = $("#login_password2").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('job_seeker.check') }}",
                data: {email: email, password: password, _token: '{{csrf_token()}}'},
                beforeSend: function(){
                    $('#fail_email').empty();
                    $('#fail_password').empty();
                    //$('#fail_password2').empty();
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        //alert(data.success);
                        location.reload();
                    } else {
                        console.log(data);
                        $('#fail_email').text(data.error.email);
                        $('#fail_password').text(data.error.password);
                        //$('#fail_password2').text(data.error);
                    }
                },error: function (data) {
                    console.log(data);
                    $('#fail_email').text(data.error.email);
                    $('#fail_password').text(data.error.password);

                },
            });

        });

        $(".btn-register-job-submit").click(function (e) {
            console.log('sad');
            e.preventDefault();

            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var email = $("#register_email").val();
            var confirm_email = $("#confirm_email").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            var check8 = $("#check8").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('job_seeker.createJobSeeker') }}",
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    confirm_email: confirm_email,
                    password: password,
                    cpassword: confirm_password,
                    check8: check8,
                    _token: '{{csrf_token()}}'
                },
                beforeSend: function(){
                    $('#first_name_error').empty();
                    $('#last_name_error').empty();
                    $('#register_email_error').empty();
                    $('#confirm_email_error').empty();
                    $('#password_error').empty();
                    $('#confirm_password_error').empty();
                    $('#check8_error').empty();
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        location.reload();
                    } else {
                        console.log(data);
                        $('#first_name_error').text(data.error.first_name);
                        $('#last_name_error').text(data.error.last_name);
                        $('#register_email_error').text(data.error.email);
                        $('#confirm_email_error').text(data.error.confirm_email);
                        $('#password_error').text(data.error.password);
                        $('#confirm_password_error').text(data.error.cpassword);
                        $('#check8_error').text(data.error.check);
                    }
                },error: function (data) {
                    console.log(data);
                    $('#first_name_error').text(data.error.first_name);
                    $('#last_name_error').text(data.error.last_name);
                    $('#register_email_error').text(data.error.email);
                    $('#confirm_email_error').text(data.error.confirm_email);
                    $('#password_error').text(data.error.password);
                    $('#confirm_password_error').text(data.error.cpassword);
                    $('#check8_error').text(data.error.check);

                },
            });

        });

        $(".btn-register-company-submit").click(function (e) {
            console.log('sad');
            e.preventDefault();

            var first_name = $("#first_name1").val();
            var last_name = $("#last_name1").val();
            var register_email = $("#register_email1").val();
            var confirm_email = $("#confirm_email1").val();
            var password = $("#password1").val();
            var confirm_password = $("#confirm_password1").val();
            var check8 = $("#check81").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('job_seeker.createCompany') }}",
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: register_email,
                    confirm_email: confirm_email,
                    password: password,
                    password_confirmation: confirm_password,
                    check8: check8,
                    _token: '{{csrf_token()}}'
                },
                beforeSend: function(){
                    $('#first_name_error1').empty();
                    $('#last_name_error1').empty();
                    $('#register_email_error1').empty();
                    $('#confirm_email_error1').empty();
                    $('#password_error1').empty();
                    $('#confirm_password_error1').empty();
                    $('#check8_error1').empty();
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        location.reload();
                    } else {
                        console.log(data);
                        $('#first_name_error1').text(data.error.first_name);
                        $('#last_name_error1').text(data.error.last_name);
                        $('#register_email_error1').text(data.error.email);
                        $('#confirm_email_error1').text(data.error.confirm_email);
                        $('#password_error1').text(data.error.password);
                        $('#confirm_password_error1').text(data.error.password_confirmation);
                        $('#check8_error1').text(data.error.check);
                    }
                },error: function (data) {
                    console.log(data);
                    $('#first_name_error1').text(data.error.first_name);
                    $('#last_name_error1').text(data.error.last_name);
                    $('#register_email_error1').text(data.error.email);
                    $('#confirm_email_error1').text(data.error.confirm_email);
                    $('#password_error1').text(data.error.password);
                    $('#confirm_password_error1').text(data.error.password_confirmation);
                    $('#check8_error1').text(data.error.check);

                },
            });

        });

        $(".btn-forget-submit").click(function (e) {
            e.preventDefault();

            var login_email_forget = $("#login_email_forget").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('frontend.forget.password.post') }}",
                data: {email: login_email_forget, _token: '{{csrf_token()}}'},
                beforeSend: function(){
                    $('#login_email_forget_error').empty();
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        /*location.reload();*/
                        $('#forgot-password').modal('hide');
                        $('#forget_success').modal('show');
                    } else {
                        console.log(data);
                        $('#login_email_forget_error').text(data.error.email);
                    }
                },error: function (data) {
                    console.log(data);

                },
            });

        });


        $(".subscribe").click(function (e) {
            e.preventDefault();

            var email_newsletter = $("#email_newsletter").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('home.store') }}",
                data: {email: email_newsletter, _token: '{{csrf_token()}}'},
                beforeSend: function(){
                    $('#email_newsletter').empty();
                    $('#email_newsletter_success').empty();
                    $('#email_newsletter_error').empty();
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#email_newsletter_success').text(data.subscribed);
                    } else {
                        console.log(data);
                        $('#email_newsletter_error').text(data.error.email);
                    }
                },error: function (data) {
                    console.log(data);

                },
            });

        });
    });

</script>
</body>

</html>