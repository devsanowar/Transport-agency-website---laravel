<section class="about-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-one__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="about-one__img-box">
                        <div class="about-one__img">
                            @if($about->about_image)
                                <img src="{{ asset($about->about_image) }}" alt="" />
                            @else
                                <img src="{{ asset('frontend') }}/assets/images/resources/about-one-img-1.jpg" alt="" />
                            @endif
                        </div>

                        {{-- <div class="about-one__circle-text">
                            <div class="about-one__round-text-box">
                                <div class="inner">
                                    <div class="about-one__curved-circle rotate-me">
                                        WELCOME TO OUR COMPANY WORKING Poperly SINCE 2002
                                    </div>
                                </div>
                                <div class="overlay-icon-box">
                                    <a href="about.html"><i class="icon-truck"></i></a>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-one__right">
                    <div class="section-title text-left sec-title-animation animation-style2">
                        <div class="section-title__tagline-box">
                            <span class="section-title__tagline-border"></span>
                            <div class="section-title__shape-1">
                                <i class="fas fa-plane"></i>
                            </div>
                            <h6 class="section-title__tagline">{{ $about->about_tag_line ?? '' }}</h6>
                            <span class="section-title__tagline-border"></span>
                            <div class="section-title__shape-2">
                                <i class="fas fa-plane"></i>
                            </div>
                        </div>
                        <h3 class="section-title__title">
                            {{ $about->about_section_title ?? '' }} <span>{{ $about->about_section_highlight_title ?? '' }}</span>
                        </h3>
                    </div>
                    <p class="about-one__text">
                        {!! $about->about_description ?? '' !!}
                    </p>


                    <div class="about-two__btn-and-author-box">
                        {{-- <div class="about-two__btn-box">
                            <a href="{{ $about->button_link }}" class="thm-btn">{{ $about->button_text }}
                                <span><i class="icon-right-arrow"></i></span>
                            </a>
                        </div> --}}
                        <div class="about-two__author-box">
                            <div class="about-two__author-details">
                                <div class="about-two__author-img-box">
                                    <div class="about-two__author-img">
                                        @if($about->about_founder_founder_image)
                                        <img src="{{ asset($about->about_founder_founder_image) }}"
                                            alt="" />
                                        @else
                                        <img src="{{ asset('frontend') }}/assets/images/resources/about-one-author-img-1.jpg" alt="" />
                                        @endif
                                    </div>
                                </div>
                                <div class="about-two__author-content">
                                    <h4>{{ $about->about_founder_name }}</h4>
                                    <p>{{ $about->about_founder_designation }}</p>
                                </div>
                            </div>
                            {{-- <div class="about-two__video-link">
                                <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                    <div class="about-two__video-icon">
                                        <span class="fa fa-play"></span>
                                        <i class="ripple"></i>
                                    </div>
                                </a>
                            </div> --}}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
