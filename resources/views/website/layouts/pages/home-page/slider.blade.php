<section class="main-slider">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                    "delay": 8000
                }
            }'>
        <div class="swiper-wrapper">

            @forelse ($sliders as $slider)
            <div class="swiper-slide">
                <div class="main-slider__bg" style="background-image: url({{ asset($slider->slider_image) }});">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h4 class="main-slider__sub-title">{{ $slider->slider_subtitle }}</h4>

                                @php
                                $words = explode(' ', $slider->slider_title);
                                @endphp

                                <h2 class="main-slider__title">
                                    {{ $words[0] }} {{ $words[1] }} <br>
                                    <span>{{ $words[2] }} {{ $words[3] }}</span> <br>
                                    {{ $words[4] }}
                                </h2>


                                <p class="main-slider__text">
                                    {{ $slider->slider_contents }}
                                </p>
                                <div class="main-slider__btn-box">
                                    <a href="{{ $slider->slider_button_link }}" class="thm-btn">
                                        {{ $slider->slider_button_name }}
                                        <span><i class="icon-right-arrow"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="swiper-slide">
                <div class="main-slider__bg"
                    style="background-image: url({{ asset('frontend') }}/assets/images/slider/slider-2.jpg);">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">

                                <p class="main-slider__text">
                                    Slider Data Not found!
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse

        </div>

        <div class="swiper-pagination" id="main-slider-pagination"></div>
        <!-- If we need navigation buttons -->
    </div>
</section>
