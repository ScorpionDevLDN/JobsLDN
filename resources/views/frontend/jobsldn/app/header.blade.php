@if(auth()->guard('companies')->check())
    <header class="login_company">
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <a class="navbar-brand flex-grow-1" href="/">
                    <img src="{{$setting->logo}}" alt="logo">
                </a>
                <button class="navbar-toggler menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                        onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))">
                    <svg width="40" viewBox="0 0 100 100">
                        <path class="line line1"
                              d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                        <path class="line line2" d="M 20,50 H 80" />
                        <path class="line line3"
                              d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                    </svg>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li>
                            <a href="#">
                                <div class="header-profile-info d-block d-xl-none">
                                    <div class="avatar">
                                        <img src="{{auth('companies')->user()->photo}}" alt="Avatar">
                                    </div>
                                    <div class="info">
                                        <div>
                                            <div class="name">
                                                <h6>{{auth('companies')->user()->name}}</h6>
                                            </div>
                                            <div class="type">
                                                <span>Company</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item d-block d-xl-none">
                            <a href="#" class="button outline" data-bs-toggle="modal" data-bs-target="#post-job">Post a job</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$menu == 'home' ? 'active' : ''}}" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$menu == 'jobs' ? 'active' : ''}}" href="{{route('posts.index')}}">Jobs</a>
                        </li>
                        <li class="nav-item">
                            @php $title = \App\Models\DynamicPage::query()->accepted()->first()->title; @endphp
                            <a class="nav-link {{$menu == $title ? 'active' : ''}}"
                               href="{{route('page',\App\Models\DynamicPage::query()->accepted()->first()->slug)}}">{{\App\Models\DynamicPage::query()->accepted()->first()->title}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contacts.index')}}">Contact</a>
                        </li>
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logout">Logout</a>

                        </li>
                    </ul>
                    <div class="header-button d-none d-xl-block">
                        <a href="#" class="button outline" data-bs-toggle="modal" data-bs-target="#post-job">Post a job</a>
                    </div>
                    <div class="header-profile-info d-flex align-items-center d-none d-xl-flex">
                        <div class="avatar">
                            <img src="{{auth('companies')->user()->photo}}" alt="Avatar">
                        </div>
                        <div class="info">
                            <div>
                                <div class="name">
                                    <h6>{{auth('companies')->user()->name}}</h6>
                                </div>
                                <div class="type">
                                    <span>Company</span>
                                </div>
                            </div>
                            <div class="options-dots">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="horizontal-bar d-none d-xl-flex">
                    <div class="container">
                        <ul>
                            <li>
                                <a href="{{route('my-profile.index')}}">Profile</a>
                            </li>
                            <li>
                                <a href="{{route('posts.index')}}">Jobs</a>
                            </li>
                            <li>
                                <a href="{{route('company-notifications.index')}}">Notifications</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@elseif(auth()->guard('job_seekers')->check())
    <header class="login_person">
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{$setting->logo}}" alt="logo">
                </a>
                <button class="navbar-toggler menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                        onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))">
                    <svg width="40" viewBox="0 0 100 100">
                        <path class="line line1"
                              d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                        <path class="line line2" d="M 20,50 H 80" />
                        <path class="line line3"
                              d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                    </svg>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li>
                            <a href="#">
                                <div class="header-profile-info d-block d-xl-none">
                                    <div class="avatar">
                                        <img src="{{auth('job_seekers')->user()->photo}}" alt="Avatar">
                                    </div>
                                    <div class="info">
                                        <div>
                                            <div class="name">
                                                <h6>{{auth('job_seekers')->user()->name}}</h6>
                                            </div>
                                            <div class="type">
                                                <span>Jobseeker</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item d-block d-xl-none">
                            <a href="{{route('posts.index')}}" class="button outline">Apply for a job</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$menu == 'home' ? 'active' : ''}}" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$menu == 'jobs' ? 'active' : ''}}" href="{{route('posts.index')}}">Jobs</a>
                        </li>
                        <li class="nav-item">
                            @php $title = \App\Models\DynamicPage::query()->accepted()->first()->title; @endphp
                            <a class="nav-link {{$menu == $title ? 'active' : ''}}"
                               href="{{route('page',\App\Models\DynamicPage::query()->accepted()->first()->slug)}}">{{$title}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$menu == 'contacts' ? 'active' : ''}}" href="{{route('contacts.index')}}">Contact</a>
                        </li>

                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link" href="{{route('my-profile.index')}}">Profile</a>
                        </li>
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link" href="{{route('myJobs')}}">Jobs</a>
                        </li>
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link" href="{{route('myBookmarks')}}">Bookmarks</a>
                        </li>
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logout">Logout</a>
                        </li>
                    </ul>
                    <div class="header-button d-none d-xl-block">
                        <a href="{{route('posts.index')}}" class="button outline">Apply for a job</a>
                    </div>
                    <div class="header-profile-info d-flex align-items-center d-none d-xl-flex">
                        <div class="avatar">
                            <img src="{{auth('job_seekers')->user()->photo}}" alt="Avatar">
                        </div>
                        <div class="info">
                            <div>
                                <div class="name">
                                    <h6>{{auth('job_seekers')->user()->name}}</h6>
                                </div>
                                <div class="type">
                                    <span>Jobseeker</span>
                                </div>
                            </div>
                            <div class="options-dots">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="horizontal-bar d-none d-xl-flex">
                    <div class="container">
                        <ul>
                            <li>
                                <a href="{{route('my-profile.index')}}">Profile</a>
                            </li>
                            <li>
                                <a href="{{route('myJobs')}}">Jobs</a>
                            </li>
                            <li>
                                <a href={{route('myBookmarks')}}>Bookmarks</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#logout" >Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@else
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{$setting->logo}}" alt="logo">
                </a>
                <button class="navbar-toggler menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                        onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))">
                    <svg width="40" viewBox="0 0 100 100">
                        <path class="line line1"
                              d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"/>
                        <path class="line line2" d="M 20,50 H 80"/>
                        <path class="line line3"
                              d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"/>
                    </svg>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-lg-none text-center">
                            <button class="button outline" data-bs-toggle="modal" data-bs-target="#login-register">Login
                                /
                                Register
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$menu == 'home' ? 'active' : ''}}" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$menu == 'jobs' ? 'active' : ''}}" href="{{route('posts.index')}}">Jobs</a>
                        </li>
                        <li class="nav-item">
                            @php $title = \App\Models\DynamicPage::query()->accepted()->first()->title; @endphp
                            <a class="nav-link {{$menu == $title ? 'active' : ''}}"
                               href="{{route('page',\App\Models\DynamicPage::query()->accepted()->first()->slug)}}">{{$title}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$menu == 'contacts' ? 'active' : ''}}" href="{{route('contacts.index')}}">Contact</a>
                        </li>
                    </ul>
                    <div class="header-button d-none d-lg-block">
                        <button class="button outline" data-bs-toggle="modal" data-bs-target="#login-register">Login /
                            Register
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@endif

<!-- Post a job -->
@include('frontend.jobsldn.app.parts.post_job')