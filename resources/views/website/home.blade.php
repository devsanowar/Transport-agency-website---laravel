@extends('website.layouts.app')
@section('title', 'Home Page')
@section('website_content')

<!--Start Preloader-->
<div class="loader js-preloader">
    <div></div>
    <div></div>
    <div></div>
</div>
<!--End Preloader-->


<!--Main Slider Start-->
@include('website.layouts.pages.home-page.slider')
<!--Main Slider End-->

<!--Feature One End-->
@include('website.layouts.pages.home-page.feature')

<!--About Two Start-->
@include('website.layouts.pages.home-page.about')

<!--About Two End-->

<section class="sliding-text-one" style="padding-bottom: 0">
        <div class="sliding-text-one__wrap">
            <ul class="sliding-text__list list-unstyled marquee_mode">
                <li>
                    <h2 data-hover="১০০% বিশ্বাসযোগ্য পরিবহন" class="sliding-text__title">
                        ১০০% বিশ্বাসযোগ্য পরিবহন
                        <img src="{{ asset('frontend') }}/assets/images/icon/sliding-text-icon-1.png" alt="" />
                    </h2>
                </li>
                <li>
                    <h2 data-hover="পরিবহন নজরদারি" class="sliding-text__title">
                        পরিবহন নজরদারি
                        <img src="{{ asset('frontend') }}/assets/images/icon/sliding-text-icon-1.png" alt="" />
                    </h2>
                </li>
                <li>
                    <h2 data-hover="ডেলিভারি সেবা" class="sliding-text__title">
                        ডেলিভারি সেবা
                        <img src="{{ asset('frontend') }}/assets/images/icon/sliding-text-icon-1.png" alt="" />
                    </h2>
                </li>
                <li>
                    <h2 data-hover="পরিবহন ও সরবরাহ ব্যবস্থাপনা" class="sliding-text__title">
                        পরিবহন ও সরবরাহ ব্যবস্থাপনা
                        <img src="{{ asset('frontend') }}/assets/images/icon/sliding-text-icon-1.png" alt="" />
                    </h2>
                </li>
                <li>
                    <h2 data-hover="পণ্য সংরক্ষণের গুদাম" class="sliding-text__title">
                        পণ্য সংরক্ষণের গুদাম
                        <img src="{{ asset('frontend') }}/assets/images/icon/sliding-text-icon-1.png" alt="" />
                    </h2>
                </li>
            </ul>
        </div>
    </section>

<!--Services Two Start-->
@include('website.layouts.pages.home-page.service')
<!--Services Two End-->

<!--Counter Two Start -->
@include('website.layouts.pages.home-page.achievement')
<!--Counter Two End -->

<!--Find Transport Start -->
@include('website.layouts.pages.home-page.cta')
<!--Find Transport End -->
<!--Testimonials Two Start -->
@include('website.layouts.pages.home-page.review')

<!--Testimonials Two End -->

<!-- Team Two Start -->
@include('website.layouts.pages.home-page.team')
<!-- Team Two End -->

<!-- Blog Two Start -->
@include('website.layouts.pages.home-page.blog')
<!-- Blog Two End -->

<!--Start Brand One-->
@include('website.layouts.pages.home-page.brand')
<!--End Brand One-->

@endsection
