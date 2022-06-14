<head>
    <base href="">
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <title>JOBSLDN| @yield('title')</title>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
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

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

{{--        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
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

</style>