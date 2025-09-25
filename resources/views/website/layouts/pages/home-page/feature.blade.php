<!--Feature One Start-->
<section class="feature-one">
    <div class="container">
        <div class="row">
            <!--Feature One Single Start-->
            @forelse ($features as $feature)
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                <div class="feature-one__single">
                    <div class="feature-one__icon">
                        <span><img src="{{ asset($feature->feature_image) }}" alt="feature image" width="75%"></span>
                    </div>
                    <div class="feature-one__content">
                        <h3 class="feature-one__title">
                            <a href="emergency-transport.html">{{ $feature->feature_title }}</a>
                        </h3>
                        <p class="feature-one__text">
                            {!! $feature->feature_content !!}
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-xl-12 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                <div class="feature-one__single">
                    <div class="feature-one__content">
                        <p class="feature-one__text">
                            Feature not found!
                        </p>
                    </div>
                </div>
            </div>
            @endforelse

            <!--Feature One Single End-->

        </div>
    </div>
</section>
