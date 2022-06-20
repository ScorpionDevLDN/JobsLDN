<footer class="site-footer">
    <!-- follow us-->
    <div class="follow-us py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="site-footer__logo"><img src="{{\App\Models\Setting::query()->first()->logo}}"></div>
                </div>
                <div class="col-md-6">
                    <div class="site-footer__sm">
                        <h5>Following us now</h5>
                        <div class="site-footer__sm-icons"><a class="social-icon" href="#"><i class="fab fa-linkedin-in"></i></a><a class="social-icon" href="#"><i class="fab fa-twitter"></i></a><a class="social-icon" href="#"><i class="fab fa-instagram"></i></a><a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a><a class="social-icon" href="#"><i class="fab fa-youtube"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- apply-->
    <div class="apply py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>{{\App\Models\Setting::query()->first()->slogan_text}}</h5>
                </div>
                <div class="col-md-3">
                    <ul class="site-footer__nav">
                        <li><a href="#"><small>Home</small></a></li>
                        <li><a href="#"><small>Jobs</small></a></li>
                        <li><a href="#"><small>Contact</small></a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="site-footer__nav">
                        <li><a href="#"><small>Dynamic Page</small></a></li>
                        <li><a href="#"><small>Dynamic Page</small></a></li>
                        <li><a href="#"><small>Dynamic Page</small></a></li>
                        <li><a href="#"><small>Terms and Conditions</small></a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <form action="#" method="GET">
                        <div class="form-group">
                            <label for="newsletterSubscription"><small>Subscribe to the latest updates</small></label>
                            <input class="form-control form-control-lg mb-3" type="text" id="newsletterSubscription" name="newsletterSubscription" placeholder="Write your email">
                            <button class="btn btn-primary-ldn px-4 py-2" type="submit">Sign up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright-->
    <div class="copyright py-3 text-center">
        <div class="container">
            <small class="text-muted"> {{\App\Models\Setting::query()->first()->copy_right_text}} <script>document.write(new Date().getFullYear())</script></small>
        </div>
    </div>
</footer>