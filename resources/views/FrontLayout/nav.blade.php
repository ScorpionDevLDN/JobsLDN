<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light py-4">
    <div class="container"><a class="navbar-brand" href="#">
            <div class="navbar-brand__box"><img class="img-fluid" src="{{\App\Models\Setting::query()->first()->logo}}" alt="JOBSLDN"></div></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="main-menu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="{{asset('front/home')}}">Home<span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{asset('front/jobs')}}">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="dynamic-page.html">Dynamic Page</a></li>
                <li class="nav-item"><a class="nav-link" href="contacts.html">Contacts</a></li>
                <button class="btn ayaTst px-4" data-toggle="modal" data-target="#modalLoginForm">Login / Register</button>
            </ul>
        </div>
    </div>
</nav>
