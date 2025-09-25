<section class="testimonial-two">
    <div class="container">
        <div class="section-title text-left sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline-border"></span>
                <div class="section-title__shape-1">
                    <i class="fas fa-plane"></i>
                </div>
                <h6 class="section-title__tagline">{{ $reviewTitle->review_tagline }}</h6>
                <span class="section-title__tagline-border"></span>
                <div class="section-title__shape-2">
                    <i class="fas fa-plane"></i>
                </div>
            </div>
            <h3 class="section-title__title">
               {{ $reviewTitle->review_title }} <br />
                <span>{{ $reviewTitle->review_title_highlight }}</span>
            </h3>
        </div>
        <div class="testimonial-two__middle">
            <div class="testimonial-two__carousel owl-carousel owl-theme">
                <!--Testimonial Two Single Start-->

                @foreach ($reviews as $review)

                <div class="item">
                    <div class="testimonial-two__single">
                        <div class="testimonial-two__single-inner">
                            <div class="testimonial-two__shape-1">
                                <img src="{{ asset('frontend') }}/assets/images/shapes/testimonial-two-shape-1.png"
                                    alt="" />

                            </div>
                            <div class="testimonial-two__quote">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="testimonial-two__ratting">
                                @for($i = 1; $i <= $review->client_ratings; $i++)
                                     <span class="fas fa-star"></span>
                                @endfor

                            </div>
                            <p class="testimonial-two__text">
                                {!! $review->client_review !!}
                            </p>
                            <div class="testimonial-two__client-info">
                                <div class="testimonial-two__client-img">
                                    @if($review->client_image)
                                    <img src="{{ asset($review->client_image) }}"
                                        alt="" />
                                    @else
                                    <img src="{{ asset('frontend') }}/assets/images/testimonial/testimonial-2-1.jpg"
                                        alt="" />
                                    @endif
                                </div>
                                <div class="testimonial-two__client-content">
                                    <h3><a href="testimonials.html">{{ $review->client_name }}</a></h3>
                                    <p>{{ $review->client_designation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--Testimonial Two Single End-->


            </div>
        </div>
    </div>
</section>
