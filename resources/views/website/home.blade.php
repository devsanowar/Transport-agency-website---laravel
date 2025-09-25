@extends('website.layouts.app')
@section('title', 'Home Page')
@section('website_content')
<!--Main Slider Start-->
@include('website.layouts.pages.home-page.slider')
<!--Main Slider End-->

<!--Feature One End-->
@include('website.layouts.pages.home-page.feature')

<!--About Two Start-->
@include('website.layouts.pages.home-page.about')

<!--About Two End-->

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
<section class="brand-one">
    <div class="container">
        <div class="brand-one__carousel owl-carousel owl-theme">
            <!--Start Brand One Single-->
            <div class="brand-one__single">
                <div class="brand-one__single-inner">
                    <a href="#"><img src="{{ asset('frontend') }}/assets/images/brand/brand-1-1.png" alt="" /></a>
                </div>
            </div>
            <!--End Brand One Single-->

            <!--Start Brand One Single-->
            <div class="brand-one__single">
                <div class="brand-one__single-inner">
                    <a href="#"><img src="{{ asset('frontend') }}/assets/images/brand/brand-1-2.png" alt="" /></a>
                </div>
            </div>
            <!--End Brand One Single-->

            <!--Start Brand One Single-->
            <div class="brand-one__single">
                <div class="brand-one__single-inner">
                    <a href="#"><img src="{{ asset('frontend') }}/assets/images/brand/brand-1-3.png" alt="" /></a>
                </div>
            </div>
            <!--End Brand One Single-->

            <!--Start Brand One Single-->
            <div class="brand-one__single">
                <div class="brand-one__single-inner">
                    <a href="#"><img src="{{ asset('frontend') }}/assets/images/brand/brand-1-4.png" alt="" /></a>
                </div>
            </div>
            <!--End Brand One Single-->

            <!--Start Brand One Single-->
            <div class="brand-one__single">
                <div class="brand-one__single-inner">
                    <a href="#"><img src="{{ asset('frontend') }}/assets/images/brand/brand-1-5.png" alt="" /></a>
                </div>
            </div>
            <!--End Brand One Single-->

            <!--Start Brand One Single-->
            <div class="brand-one__single">
                <div class="brand-one__single-inner">
                    <a href="#"><img src="{{ asset('frontend') }}/assets/images/brand/brand-1-6.png" alt="" /></a>
                </div>
            </div>
            <!--End Brand One Single-->
        </div>
    </div>
</section>
<!--End Brand One-->

@endsection
