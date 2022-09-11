<div class="horizontal-bar not-dropdown d-none d-xl-flex">

    <div class="container">
        <ul>
            <li>
                <a href="{{route('company-profile.index')}}" class="{{$menu == 'profile' ? 'active' : ''}}">Profile</a>
            </li>
            <li>
                <a href="{{route('myJobs')}}" class="{{$menu == 'myJobs' ? 'active' : ''}}">Jobs</a>
            </li>
            <li>
                <a href="{{route('myBookmarks')}}" class="{{$menu == 'myBookmarks' ? 'active' : ''}}">Bookmarks</a>
            </li>
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#logout" >Logout</a>
            </li>
        </ul>
    </div>
</div>