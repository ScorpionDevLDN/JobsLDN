<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {
            text-decoration: underline !important;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
<!--100% body table-->
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
       style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
    <tr>
        <td>
            <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                   align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="height:80px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <a href="#" title="logo" target="_blank">
                            <img width="80"
                                 src="{{  isset($setting['email_logo']) ? $setting['email_logo'] : ''}}"
                                 title="logo"
                                 alt="logo">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                               style="max-width:670px;background:#fff; border-radius:3px; text-align:{{app()->getLocale()== 'ar' ? 'right' : 'left'}};-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                            <tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding:0 35px;">
                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                        Hi there!
                                    </p>
                                    <br>
                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                        Thank you so much for signing up to
                                        {{-- <a href="https://jobsldn.co.uk/test/home"> {{isset($setting['website_name']) ? $setting['website_name'] : ''}}</a> --}}
                                        <a href="{{URL::to('/test/home') }}"> {{isset($setting['website_name']) ? $setting['website_name'] : ''}}</a>

                                         ,we're so pleased to have you as part of our community!
                                    </p>
                                    <br>

                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                        If you're a jobseeker, you can start applying now by using this
                                        {{-- <a href="https://jobsldn.co.uk/test/posts">link</a>. --}}
                                        <a href="{{URL::to('test/posts') }}">link</a>.


                                    </p>

                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                        If you're a business, you can post a new job advertisement for free
                                        {{-- <a href="https://jobsldn.co.uk/test/company-post-job">here</a>. --}}
                                        <a href="{{URL::to('/test/company-post-job') }}">here</a>.

                                    </p>
                                    <br>

                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                        Your feedback helps us to make sure that we’re delivering exactly what customers want.
                                        Just hit reply and us know what we can do better!
                                    </p>
                                    <br>
                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                        Best,
                                    </p>
                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                        Your
                                        {{-- <a href="https://jobsldn.co.uk/test/home">{{isset($setting['website_name']) ? $setting['website_name'] : ''}}</a> --}}
                                        <a href="{{URL::to('/test/home')}}">{{isset($setting['website_name']) ? $setting['website_name'] : ''}}</a>


                                        team.
                                    </p>

                                </td>
                            </tr>
                            <tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <p style="font-size:10px; margin:0 0 0;color:#B5B5C3">
                            <span>{{$setting['copy_right_text']}}</span>
                        </p>
                        <p style="font-size:10px; margin:0 0 0;color:#B5B5C3">
                            <span>{{$setting['website_name']}}</span>

                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!--/100% body table-->
</body>

</html>
