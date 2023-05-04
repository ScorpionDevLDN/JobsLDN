{{--<script src="https://cdn.ckeditor.com/ckeditor5/12.3.0/classic/ckeditor.js
"></script>--}}

<script src="{{asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
{{--
<script src="{{asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js')}}"></script>
--}}
<script>
    // Class definition

    var KTCkeditor = function () {
        // Private functions
        var demos = function () {
            ClassicEditor
                .create( document.querySelector( '#summernote' ),{
                    toolbar: [ 'bold', 'italic', 'numberedList' ],
                    fontColor: 'red'
                } )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );
        }

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    }();

    // Initialization
    jQuery(document).ready(function() {
        KTCkeditor.init();
    });
</script>