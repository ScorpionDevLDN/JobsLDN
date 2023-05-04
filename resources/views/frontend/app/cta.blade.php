<section class="call-to-action" id="call-to-action">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-lg-row">
            <div class="col-12 col-lg-6">
                <img src="{{$advertise->image}}" alt="Girl" class="wow animate animate__fadeIn">
            </div>
            <div class="col-12 col-lg-6">
                <h2 class="wow animate animate__fadeInUp">{{$advertise->text}}
                </h2>
                <a target="_blank" href="{{$advertise->url}}" class="button wow animate animate__fadeInDown">{{$advertise->cta}}</a>
            </div>
        </div>
    </div>
</section>