@if(!request()->cookie('nishan-cookie'))
    <div style="display: none"
         class="d-flex flex-column flex-lg-row align-items-center justify-content-center cookies-card cookies"
         id="cookies">
        <img src="{{asset('frontend/images/cookies.svg')}}">
        @php $page = \App\Models\DynamicPage::query()->where('slug','cookies'); @endphp
        <p class="my-3">We use third party <a href="{{$page->exists() ? route('page',$page->first()->slug) : '#'}}">cookies</a>
            in order to personalize your site experience.</p>
        <div class="buttons">
            <button id="allow-cookies" class="button" onclick="saveCookies(1 , '{{route('cookie') . '?accept=1'}}')">
                Allow
            </button>
            <button onclick="saveCookies(1 , '{{route('cookie') . '?accept=0'}}')" id="decline-cookies"
                    class="button decline outline">Decline
            </button>
        </div>
    </div>
@endif
