<footer class="footer" id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <img src="{{asset('jobs/images/logo.svg')}}" alt="Logo" class="logo">
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center justify-content-lg-end align-items-center gap-0 gap-sm-5 flex-column flex-sm-row">
                    <h3>Following us now</h3>
                    <ul class="d-flex">
                        <li>
                            <a href="{{\App\Models\Setting::query()->first()->telegram_link}}">
                                <ion-icon name="logo-linkedin"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="{{\App\Models\Setting::query()->first()->twitter_link}}">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="{{\App\Models\Setting::query()->first()->instagram_link}}">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="{{\App\Models\Setting::query()->first()->facebook_link}}">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a  href="{{\App\Models\Setting::query()->first()->youtube_link}}">
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
                    <h3>You apply, we hire!</h3>
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
                        <input type="email" name="email_newsletter" placeholder="Write your e-mail"  class="form-control mt-3" id="email_newsletter">
                        <button class="news-letter-button button mt-4">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container text-center">
            <p>Copyright 2022 - LONDJOBS <a href="https://www.nishanstudio.com/">
          <span class="nishan">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 398.9 142.1" style="height:21px;enable-background:new 0 0 398.9 142.1;" xml:space="preserve" fill="#001689">
              <g>
                <path d="M177.8,91.9c-5.9,0-8.3-1.7-8.3-7.2V64c0-6.8-4.9-10.1-10.9-10.1c-1.4,0-2.5,1.1-2.5,2.5c0,0,0,0,0,0V86
                           c0,11,5.7,16.9,16.2,16.9c5.7,0,8-2.3,8-8.1v-0.4C180.3,93.1,179.2,92,177.8,91.9z"></path>
                <path d="M213.7,73.7c-9.2-1.2-10.9-2.2-10.9-4.7c0-3,2.6-5.2,10.9-5.2c6.5,0,12.7,1.9,15.4,4.4h0.6v-4.5c0-4.6-5-10.1-17.4-10.1
                           c-13.9,0-23,7.6-23,16.3c0,7.2,5.5,11.2,17,12.6c9.3,1.1,11.2,2.4,11.2,5.1c0,3.5-3.2,5.2-9.9,5.2c-6.3,0-13.3-2.2-16.3-4.5h-0.5
                           v5.3c0,4.8,7.4,9.3,17.5,9.3c14.5,0,22.6-5.9,22.6-15.9C231.1,79.6,225,75.4,213.7,73.7z">
                </path>
                <path d="M265.8,53.6c-5.1,0-9.7,4.1-11.7,7.3v-9.4c0-14.9-4.6-22.4-13-22.4c-5.6,0-7.8,3.3-8.2,5.9c3.3,1.2,7.7,7.1,7.7,18.4
                           l-0.3,39.3c0,5.6,3.7,9.1,10.1,9.1c2,0,3.6-1.6,3.6-3.6c0,0,0,0,0,0V78.4c0-9.6,5.5-12.8,9.8-12.8c5.9,0,10.9,3.8,10.9,12.6v21.1
                           c0,2,1.7,3.7,3.7,3.7h0.2c5.7,0,9.5-3.8,9.5-8.9V76.7C287.8,61.7,279.6,53.6,265.8,53.6z">
                </path>
                <path d="M322.1,53.7c-4-0.7-17.6,0.6-19.1,7.7c-1,4.8,1.5,7.3,4,8.1c1.9-2.6,5.2-6.2,15-3.3c3.7,1.1,7,2.9,7,5.2v1.4h-4.7
                           c-1.8,0-3.5,0.1-5.1,0.2h-0.6c-15.6,1.1-21.3,7-21.3,14.7c0,8.7,8.9,15.1,21.8,15.1h2.8c12,0,20.5-7,20.5-17V74.9
                           C342.2,59.8,333,54.4,322.1,53.7z M329.1,85.8H329c0,4.8-2.9,7.3-8.6,7.3c-6,0-9.3-2.2-9.3-5.9c0-3.9,2.9-6,13.2-6h4.8V85.8z">
                </path>
                <path d="M374.5,53.5c-12.7,0-23.3,8.6-23.3,23.9V99c0,2,1.6,3.6,3.6,3.6c0,0,0,0,0,0c6,0,9.9-3.8,9.9-8.9V78.6
                           c0-9.1,4.1-13.2,11-13.2c5.7,0,9.8,4.4,9.8,12.2v21.6c0,2,1.7,3.7,3.7,3.7h0.2c5.7,0,9.5-3.8,9.5-8.9V76.6
                           C398.9,65.3,391.4,53.5,374.5,53.5z"></path>
                <circle cx="162.9" cy="36.2" r="6.8"></circle>
                <path d="M150.3,63.9c-1.3,1.2-3,2.5-5,3.9c-3-7.8-10.4-14.2-22.7-14.2c-11.2,0-20.7,6.7-22.9,18.7l-3.8,3.4
                           c-10.8,9.7-18.5,16-22.7,18.7c-4.1,2.6-7.3,3.9-9.6,3.9c-1.4,0-1.6-0.6-1.6-1.3c0-0.5,0.4-2,4.3-5.5c8.4-7.3,13.3-12,15.1-14.3
                           c1.8-2.2,2.8-4.9,2.9-7.7c0-1.4-0.5-2.8-1.5-3.9c-1-1.1-2.5-1.7-4-1.7c-2.4,0-5.6,1.2-9.7,3.5c-3.6,2.1-7.1,4.4-10.2,7.1l-9.1,7.7
                           l0,0c-2.2,2-4.6,3.8-7.1,5.5c-0.9,0.6-2,0.9-3.1,0.9c-0.6,0-1.3-0.2-1.7-0.7c-0.5-0.4-0.7-0.9-0.7-1.5c0-0.5,0.1-1,0.2-1.5
                           c2.1-1.5,4.8-4.3,8.2-8.6c5-6.1,5.6-8.4,5.6-9.5c0-1.6-0.9-2.6-2.3-2.6c-1.1,0-2.9,0.7-7,6.4c-2.7,3.7-5,7.7-6.6,12
                           c-4.4,4.1-9.2,7.8-14.4,10.9c-5.9,3.6-10.4,5.5-13.5,5.5c-0.9,0-1.8-0.3-2.5-0.9c-0.6-0.4-1-1.1-1-1.9c0-1.7,2-6,11.7-16.5l19-20.7
                           c0.8-0.9,3.2-2.5,10.1-5.5c5.7-2.5,13.8-6.9,24-13.3C78.7,34,86.9,27.8,92.9,21.7c6.2-6.3,9.2-11.5,9.2-16c0-3.7-2.3-5.7-6.4-5.7
                           c-4.4,0-11.3,3.7-21,11.2c-9.2,7.1-18,14.9-26.2,23.1l-23.8,24l-2.4,2.5L7.4,77.7C2.5,83.5,0,89.1,0,94.2c-0.1,2.1,0.7,4.2,2.2,5.8
                           c1.4,1.5,3.4,2.3,5.4,2.3c5,0,13.7-4.7,26.5-14.4c0.3,1,0.8,1.8,1.6,2.4c1,0.8,2.3,1.3,3.6,1.3c2.5,0,5.2-1.1,7.8-3.4l5.3-4.5
                           l6.6-5.4c3.8-3.2,7.9-6.2,12.2-8.7c4.2-2.3,6.1-2.8,7.1-2.8c1.1,0,1.1,0.3,1.1,0.5c0,0.3-0.2,1.2-1.9,3.1c-3.5,3.5-7.2,6.8-11,9.9
                           C60.2,85.6,57,90.8,57,95.7c-0.1,1.7,0.7,3.4,2.1,4.4c1.1,0.8,2.4,1.3,3.8,1.3c2.2-0.1,4.3-0.6,6.3-1.5c2.4-1,5.8-3.2,10.7-6.7
                           c4.2-3.1,7.4-5.6,9.5-7.4L68,108.1c-13.6,4.3-24.5,9.3-32.3,14.8c-8.2,5.8-12.1,10.5-12.1,14.5c0,1.8,0.8,4.7,6.3,4.7
                           c5.5,0,12.2-2.9,19.7-8.6c6.9-5.1,13.4-10.8,19.3-17l9.2-9.6c4.5-1.1,12.2-4.4,21-8.8v1c0,2,1.6,3.6,3.6,3.6c0,0,0,0,0,0
                           c6,0,9.9-3.8,9.9-8.9v-2.8c7.2-3.9,14.4-8.1,20.8-12.1v20.2c0,2,1.7,3.7,3.7,3.7h0.2c5.7,0,9.5-3.8,9.5-8.9V76.7
                           c0-2-0.2-4.1-0.8-6.1c2.4-1.7,4.5-3.3,6-4.6l0.8-0.7l-2-2L150.3,63.9z M55.9,35.5c7.5-8.2,15.4-16,23.8-23.3
                           C87,6,92.4,2.9,95.9,2.9c2.7,0,3.1,1.3,3.1,2.5c0,1-0.3,1.9-0.7,2.8c-0.9,1.9-2,3.7-3.3,5.4c-2.5,3.4-5.3,6.5-8.4,9.4
                           c-3.9,3.8-8.1,7.3-12.6,10.4c-4.5,3.1-10.1,6.6-16.8,10.4c-4.7,2.6-8.8,4.8-12.2,6.3c-1.5,0.7-2.8,1.3-3.7,1.7L55.9,35.5z
                           M58.7,118.6c-8.1,8.7-14.1,14.4-17.8,16.9c-3.2,2.3-7,3.6-11,3.7c-3.2,0-3.2-1.2-3.2-1.7c0-2.1,2.2-6.2,12.7-13.3
                           c7.5-5.1,15.8-9,24.5-11.4L58.7,118.6z M82.8,102.3l16.4-17.2v9.7C92.7,98.1,87,100.8,82.8,102.3z M112.7,78.7
                           c0-9.1,4.1-13.2,11-13.2c5.2,0,9,3.7,9.7,10.2c-6.4,4-13.6,8.1-20.7,12V78.7z"></path>
              </g>
            </svg>
          </span>
                </a></p>
        </div>
    </div>
</footer>
<!-- IonIcons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>