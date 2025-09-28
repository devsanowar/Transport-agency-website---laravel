@extends('website.layouts.app')
@section('title', 'About Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/module-css/page-header.css" />
@endpush
@section('website_content')

<div class="page-wrapper">

      <!--Page Header Start-->
      @include('website.layouts.inc.breadcrumb', ['page_name' => 'About', 'page_title' => 'About Us'])
      <!--Page Header End-->

      <!--About One Start-->
      @include('website.layouts.pages.about-page.about')
      <!--About One End-->

    <!--Sliding Text One Start-->
    <section class="sliding-text-one">
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
    <!--Sliding Text One End-->

    <!--Why Choose Two Start-->
    @include('website.layouts.pages.about-page.why_choose_us')
    <!--Why Choose Two End-->

    <!-- Team Two Start -->
    @include('website.layouts.pages.about-page.team')
    <!-- Team Two End -->

    <!--Find Transport Start -->
    @include('website.layouts.pages.about-page.cta')
    <!--Find Transport End -->

    @include('website.layouts.pages.about-page.brand')
</div>

@endsection
