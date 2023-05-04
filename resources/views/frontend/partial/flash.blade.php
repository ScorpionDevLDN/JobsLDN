@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-session">
        {{ session('success') }}
        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>--}}
    </div>
@endif

@if(session('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-session-fail">
        {{ session('fail') }}
        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>--}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-session-fail">
        {{ session('error') }}
    </div>
@endif


@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(function () {
            $('#alert-session').fadeTo(5000, 500).slideUp(500, function () {
                $(this).slideUp(500);
            })
            $('#alert-session-fail').fadeTo(5000, 500).slideUp(500, function () {
                $(this).slideUp(500);
            })
        });
    </script>
@endpush