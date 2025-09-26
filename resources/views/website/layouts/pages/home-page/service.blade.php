<section class="services-two">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline-border"></span>
                <div class="section-title__shape-1">
                    <i class="fas fa-plane"></i>
                </div>
                <h6 class="section-title__tagline">আমাদের সার্ভিসেস</h6>
                <span class="section-title__tagline-border"></span>
                <div class="section-title__shape-2">
                    <i class="fas fa-plane"></i>
                </div>
            </div>
            <h3 class="section-title__title">
                আপনার ব্যবসার জন্য দক্ষ<br />
                <span>ট্রান্সপোর্ট সেবা</span>
            </h3>
        </div>
        <div class="services-two__carousel owl-theme owl-carousel">

            <!--Services Two Single Start-->
            @foreach ($services as $service)
            <div class="item">
                <div class="services-two__single">
                    <div class="services-two__img">
                        @if($service->service_thumbnail)
                        <img src="{{ asset($service->service_thumbnail) }}" alt="" />
                        @else
                        <img src="{{ asset('frontend') }}/assets/images/services/services-two-2-3.jpg" alt="" />
                        @endif
                    </div>
                    <div class="services-two__content">
                        <div class="services-two__icon">
                            <span class="icon-delivery-man"></span>
                        </div>
                        <div class="services-two__title">
                            <h3><a href="emergency-transport.html">{{ $service->service_title }}</a></h3>
                        </div>
                        <p class="services-two__text">
                            {!! $service->service_short_description !!}
                        </p>

                        <ul class="services-two__point">
                            @foreach($service->service_features as $feature)
                            <li>
                                <div class="icon">
                                    <span class="fas fa-check"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $feature }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        <div class="services-two__btn">
                            <a href="emergency-transport.html">Read More <span class="icon-next"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!--Services Two Single End-->
        </div>
    </div>
</section>
