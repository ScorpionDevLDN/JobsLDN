@if(!request()->cookie('nishan-cookie'))
    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center cookies-card cookies"
         id="cookies">
        <img src="{{asset('jobsldn/images/cookies.svg')}}">
        <p class="my-3">We use third party <a href="#">cookies</a> in order to personalize your site experience.</p>
        <div class="buttons">
            <button id="allow-cookies" class="button" onclick="saveCookies(1 , '{{route('cookie') . '?accept=1'}}')">
                Allow
            </button>
            <button onclick="window.location='https://www.google.com'" id="decline-cookies"
                    class="button decline outline">Decline
            </button>
        </div>
    </div>
@endif
