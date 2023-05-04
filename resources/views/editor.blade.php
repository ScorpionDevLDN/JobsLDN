
<script>
    // Class definition

    var KTCkeditor2 = function () {
        // Private functions
        var demos2 = function () {
            ClassicEditor
                .create( document.querySelector( '#summernote2' ),{
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
                demos2();
            }
        };
    }();

    // Initialization
    jQuery(document).ready(function() {
        KTCkeditor2.init();
    });
</script>