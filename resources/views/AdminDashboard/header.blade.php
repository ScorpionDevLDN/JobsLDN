<head>
    <meta charset="utf-8" />
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{isset($setting->website_name) ? $setting->website_name : 'JOBSLDN'}} @yield('title')</title>
    <meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!--end::Page Vendors Styles-->
    <!--begin::Page Scripts(used by this page)-->
	<link rel="shortcut icon" href="{{isset($setting->icon_logo) ? asset('storage/'.$setting->icon_logo) : asset('admin/images/dashboard-logo.png')}}"  />
    <!--end::Page Scripts-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet" type="text/css"/>
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    {{-- <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/> --}}
    @yield('css')
</head>
<style>
    table.dataTable.no-footer{
        border-bottom: 1px solid #ebedf3;
    }


    /*.dataTables_wrapper .dataTables_paginate .paginate_button.current{*/
    /*    color:blue !important;*/
    /*    background-color: blue;*/
    /*}*/
    /*.dataTables_wrapper .dataTables_paginate .paginate_button  {*/
    /*    color:blue !important;*/
    /*    background: rgba(0, 0, 0, 0) no-repeat scroll right center;*/
    /*}*/
    /*.dataTables_wrapper .dataTables_paginate .paginate_button:hover {*/
    /*    background: blue;*/
    /*    border: none;*/
    /*    color: white!important; !*change the hover text color*!*/
    /*}*/

    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
        border: 1px solid #e1f0ff;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #e1f0ff;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: #e1f0ff;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #e1f0ff none;
        color: black!important;
        border-radius: 4px;
        border: 1px solid #e1f0ff;
    }
    table.dataTable thead th {
        border-bottom: none;
    }
    .form-icon .select2-container {
        width: 100% !important;
    }

    .form-icon .select2-container--default .select2-selection--single .select2-selection__rendered {
        min-height: calc(1.5em + 1.3rem + 2px);
    }

</style>