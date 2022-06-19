
{{--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>

<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>

<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>

<script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

{{--<script type="text/javascript" charset="utf8" src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>--}}
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/js/pages/crud/forms/editors/summernote.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>--}}
{{--<script type="text/javascript" class="init"></script>--}}
@yield('js')