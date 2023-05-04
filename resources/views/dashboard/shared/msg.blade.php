<script>
    @if (session('failed'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.error("{{ session('failed') }}");
    @endif

            @if ($errors = session('errors'))
            @if (is_object($errors))
            @foreach ($errors->all() as $error)
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.error("{{ $error }}");
    @endforeach
            @else
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.error("{{ $errors }}");
    @endif
            @endif

            @if (session('success'))
        toastr.options =
        {
            "closeButton": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
        }
    toastr.info("{{ session('success') }}");
    @endif
            @if (session('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    toastr.warning("{{ session('warning') }}");
    @endif

</script>
<script>
    $(document).on('click', '.delete-action', function () {
        var form_id = $(this).attr('data-form-id')
        $.confirm({
            title: '{{ __('Alert !') }}',
            content: '{{ __('Are You sure ?') }}',
            buttons: {
                confirm: function () {
                    $("#" + form_id).submit();
                },
                cancel: function () {
                }
            }
        });
    });
</script>
