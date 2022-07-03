<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light py-4">
    <div class="container"><a class="navbar-brand" href="#">
            <div class="navbar-brand__box"><img class="img-fluid" src="{{\App\Models\Setting::query()->first()->logo}}"
                                                alt="JOBSLDN"></div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="main-menu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="{{asset('home')}}">Home<span
                                class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{asset('jobs')}}">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="{{asset('pages')}}">Dynamic Page</a></li>
                <li class="nav-item"><a class="nav-link" href="{{asset('contacts')}}">Contacts</a></li>
                @if(auth()->guard('companies')->check())
                    <div class="navbar__profile">
                        <div class="navbar__profile-image">
                            <img src="{{auth('companies')->user()->photo}}">
                        </div>
                        <div class="navbar__profile-name">
                            <h6>{{auth('companies')->user()->name}}</h6><small>Company</small>
                        </div>
                        <div class="navbar__dots"><button class="btn-primary-ldn-dots" onclick="myFunction()"><i class="fas fa-ellipsis-h"></i></button></div>
                    </div>
                @elseif(auth()->guard('job_seekers')->check())
                    <div class="navbar__profile">
                        <div class="navbar__profile-image">
                            <img src="{{auth('job_seekers')->user()->photo}}">
                        </div>
                        <div class="navbar__profile-name">
                            <h6>{{auth('job_seekers')->user()->name}}</h6><small>Job Seeker</small>
                        </div>
                        <div class="navbar__dots"><button class="btn-primary-ldn-dots" onclick="myFunction()"><i class="fas fa-ellipsis-h"></i></button></div>
                    </div>
                @else
                    <button class="btn ayaTst px-4" data-toggle="modal" data-target="#modalLoginForm">Login / Register
                    </button>
                @endif
            </ul>
        </div>
    </div>
</nav>

<section id="myDIV" class="profile-page-banner" style="display:none;">
    <div class="container">
        <div class="profile-page-banner__navbar">
            <ul>
                @if(auth()->guard('companies')->check())
                    <li class="active"><a href="{{route('company-profile.index')}}">Profile</a></li>
                    <li><a href="{{route('jobs.index')}}">Jobs</a></li>
                    <li><a href="{{route('company-notifications.index')}}">Notifications</a></li>
                    <li><a href="" data-toggle="modal" data-target="#modalLogout">Logout</a></li>
                @else
                    <li class="active"><a href="{{route('company-profile.index')}}">Profile</a></li>
                    <li><a href="{{route('myJobs')}}">My Jobs</a></li>
                    <li><a href="{{route('myBookmarks')}}">Bookmarks</a></li>
                    <li><a href="" data-toggle="modal" data-target="#modalLogout">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</section>


<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
