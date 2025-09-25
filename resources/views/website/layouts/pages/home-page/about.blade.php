<section class="about-two">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="about-two__img-box">
                        <div class="about-two__img">
                            <img src="{{ asset($about->image_one) }}" alt="" />
                        </div>
                        <div class="about-two__img-two">
                            <img src="{{ asset($about->image_two) }}" alt="" />
                        </div>
                        <div class="about-two__counter">
                            {{-- <div class="shape1">
                                <img src="{{ asset('frontend') }}/assets/images/shapes/about-two-shape-1.png" alt="" />
                            </div> --}}
                            <div class="count-text-box count-box">
                                <h2 class="count-text" data-stop="{{ $about->counter_number }}" data-speed="1500">
                                    00
                                </h2>
                                <span class="plus">+</span>
                            </div>

                            <p>
                                {{ $about->counter_label }}
                            </p>
                        </div>
                        {{-- <div class="about-two__shape-2 float-bob-x">
                            <img src="{{ asset('frontend') }}/assets/images/shapes/about-two-shape-2.png" alt="" />
                        </div> --}}
                        {{-- <div class="about-two__shape-3">
                            <img src="{{ asset('frontend') }}/assets/images/shapes/about-two-shape-3.png" alt="" />
                        </div>
                        <div class="about-two__shape-4 float-bob-y">
                            <img src="{{ asset('frontend') }}/assets/images/shapes/about-two-shape-4.png" alt="" />
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-two__right">
                    <div class="section-title text-left sec-title-animation animation-style2">
                        <div class="section-title__tagline-box">
                            <span class="section-title__tagline-border"></span>
                            <div class="section-title__shape-1">
                                <i class="fas fa-plane"></i>
                            </div>
                            <h6 class="section-title__tagline text-uppercase">{{ $about->tagline }}</h6>
                            <span class="section-title__tagline-border"></span>
                            <div class="section-title__shape-2">
                                <i class="fas fa-plane"></i>
                            </div>
                        </div>

                        <h3 class="section-title__title">
                            {{ $about->title_main }} <span>{{ $about->title_highlight }}</span>
                        </h3>

                    </div>
                    <p class="about-two__text">
                        {!! $about->description_one !!}
                    </p>

                    <div class="about-two__progress-box-outer">
                        <div class="about-two__progress-single">
                            <div class="about-two__progress-box">
                                <div class="circle-progress"
                                    data-options='{ "value": 0.{{ $about->progress_one_value }},"thickness": 4,"emptyFill": "#F4F5F9","lineCap": "square", "size": 100, "fill": { "color": "#AD2A22" } }'>
                                </div>
                                <!-- /.circle-progress -->
                                <div class="about-two__pack count-box">
                                    <p class="count-text" data-stop="{{ $about->progress_one_value }}" data-speed="1500"></p>
                                    <span>%</span>
                                </div>
                            </div>
                            <div class="about-two__progress-content">
                                <p>
                                    {{ $about->progress_one_title }}
                                </p>
                            </div>
                        </div>
                        <div class="about-two__progress-single">
                            <div class="about-two__progress-box">
                                <div class="circle-progress"
                                    data-options='{ "value": 0.{{ $about->progress_two_value }},"thickness": 4,"emptyFill": "#F4F5F9","lineCap": "square", "size": 100, "fill": { "color": "#AD2A22" } }'>
                                </div>
                                <!-- /.circle-progress -->
                                <div class="about-two__pack count-box">
                                    <p class="count-text" data-stop="{{ $about->progress_two_value }}" data-speed="1500"></p>
                                    <span>%</span>
                                </div>
                            </div>
                            <div class="about-two__progress-content">
                                <p>
                                   {{ $about->progress_two_title }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="about-two__point-box-one">
                        <ul class="about-two__point-one">
                            <li>
                                <div class="icon">
                                    <span class="fas fa-check"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $about->point_one }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="fas fa-check"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $about->point_two }}</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="about-two__point-one about-two__point-one--two">
                            <li>
                                <div class="icon">
                                    <span class="fas fa-check"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $about->point_three }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="fas fa-check"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $about->point_four }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="about-two__btn-and-author-box">
                        <div class="about-two__btn-box">
                            <a href="{{ $about->button_link }}" class="thm-btn">{{ $about->button_text }}
                                <span><i class="icon-right-arrow"></i></span>
                            </a>
                        </div>
                        <div class="about-two__author-box">
                            <div class="about-two__author-details">
                                <div class="about-two__author-img-box">
                                    <div class="about-two__author-img">
                                        @if($about->author_image)
                                        <img src="{{ asset($about->author_image) }}"
                                            alt="" />
                                        @else
                                        <img src="{{ asset('frontend') }}/assets/images/resources/about-one-author-img-1.jpg" alt="" />
                                        @endif
                                    </div>
                                </div>
                                <div class="about-two__author-content">
                                    <h4>{{ $about->author_name }}</h4>
                                    <p>{{ $about->author_designation }}</p>
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

@push('scripts')
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var split = new SplitText(".title-animation", { type: "words" });
        split.words.forEach((word, i) => {
            word.style.opacity = 0;
            word.style.display = "inline-block";
            word.style.transform = "translateY(20px)";
            setTimeout(() => {
                word.style.transition = "all 0.5s ease";
                word.style.opacity = 1;
                word.style.transform = "translateY(0)";
            }, i * 150);
        });
    });
    </script>
@endpush
