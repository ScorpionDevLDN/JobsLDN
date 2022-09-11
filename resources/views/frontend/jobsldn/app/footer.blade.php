
<footer class="footer" id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <img src="{{asset('jobsldn/images/logo.svg')}}" alt="Logo" class="logo">
                </div>
                <div
                        class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center gap-0 gap-sm-5 flex-column flex-sm-row">
                    <h3>Following us on</h3>
                    <ul class="d-flex">
                        <li>
                            <a href="#">
                                <ion-icon name="logo-linkedin"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <ion-icon name="logo-youtube"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middel">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-xxl-3">
                    <h3>{{$setting->slogan_text}}</h3>
                </div>
                <div class="col-12 col-lg-6 col-xxl-3">
                    <div class="d-flex flex-column flex-md-row gap-0 gap-md-5">
                        <ul>
                            <li>
                                <a href="{{route('myHome')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('posts.index')}}">Jobs</a>
                            </li>
                            <li>
                                <a href="{{route('contacts.index')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xxl-3">
                    <div class="d-flex flex-column flex-md-row gap-0 gap-md-5">
                        <ul>
                            @foreach(\App\Models\DynamicPage::query()->where('status',1)->whereIn('shown_in',[0,2])->take(3)->get() as $page )
                                <li><a href="{{route('page',$page->slug)}}"><small>{{$page->title}}</small></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-xxl-3">
                    <h6>Subscribe to the latest updates</h6>
                    <form class="newsletter-form">
                        <input type="email" name="email_newsletter" placeholder="Write your e-mail"
                               class="form-control mt-3" id="email_newsletter">
                        <button class="news-letter-button button mt-4">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container text-center">
            <p>{{$setting->copy_right_text}} <a href="https://www.nishanstudio.com/"></a></p>
        </div>
    </div>
</footer>