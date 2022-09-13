<div class="horizontal-bar not-dropdown d-none d-xl-flex">

    <div class="container">
        <ul>
            <li>
                <a href="{{route('my-profile.index')}}" class="{{$menu == 'profile' ? 'active' : ''}}">Profile</a>
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

<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="logoutLabel">Notification</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <form action="{{route('logoutFront')}}" method="post">
                @csrf
                <div class="modal-body">
                    <h5 class="text-center">Are you sure you want to log out?</h5>
                </div>
                <div class="modal-footer">
                    <button class="button mx-auto" type="submit">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>