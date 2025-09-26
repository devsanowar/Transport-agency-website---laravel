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
@include('website.layouts.pages.home-page.brand')
<!--End Brand One-->

@endsection
