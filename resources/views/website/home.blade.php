@extends('website.layouts.app')
@section('title', 'Home Page')
@section('website_content')
<!--Main Slider Start-->
       @include('website.layouts.pages.home-page.slider')
        <!--Main Slider End-->

        <!--Feature One Start-->
        <section class="feature-one">
            <div class="container">
                <div class="row">
                    <!--Feature One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="feature-one__single">
                            <div class="feature-one__icon">
                                <span class="icon-international-shipping"></span>
                            </div>
                            <div class="feature-one__content">
                                <h3 class="feature-one__title">
                                    <a href="emergency-transport.html">Export Logistics</a>
                                </h3>
                                <p class="feature-one__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global logistic service.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--Feature One Single End-->
                    <!--Feature One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="300ms">
                        <div class="feature-one__single">
                            <div class="feature-one__icon">
                                <span class="icon-courier-services"></span>
                            </div>
                            <div class="feature-one__content">
                                <h3 class="feature-one__title">
                                    <a href="ocean-transport.html">Safety And Reliability</a>
                                </h3>
                                <p class="feature-one__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global logistic service.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--Feature One Single End-->
                    <!--Feature One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="500ms">
                        <div class="feature-one__single">
                            <div class="feature-one__icon">
                                <span class="icon-delivery-man"></span>
                            </div>
                            <div class="feature-one__content">
                                <h3 class="feature-one__title">
                                    <a href="personal-delivery.html">Fast Delivery</a>
                                </h3>
                                <p class="feature-one__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global logistic service.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--Feature One Single End-->
                    <!--Feature One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="700ms">
                        <div class="feature-one__single">
                            <div class="feature-one__icon">
                                <span class="icon-24-hours-service"></span>
                            </div>
                            <div class="feature-one__content">
                                <h3 class="feature-one__title">
                                    <a href="contact.html">24/7 Support</a>
                                </h3>
                                <p class="feature-one__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global logistic service.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--Feature One Single End-->
                </div>
            </div>
        </section>
        <!--Feature One End-->

        <!--About Two Start-->
        <section class="about-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-two__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="about-two__img-box">
                                <div class="about-two__img">
                                    <img src="{{ asset('frontend') }}/assets/images/resources/about-two-img-1.jpg" alt="" />
                                </div>
                                <div class="about-two__img-two">
                                    <img src="{{ asset('frontend') }}/assets/images/resources/about-two-img-2.jpg" alt="" />
                                </div>
                                <div class="about-two__counter">
                                    <div class="shape1">
                                        <img src="{{ asset('frontend') }}/assets/images/shapes/about-two-shape-1.png" alt="" />
                                    </div>
                                    <div class="count-text-box count-box">
                                        <h2 class="count-text" data-stop="25" data-speed="1500">
                                            00
                                        </h2>
                                        <span class="plus">+</span>
                                    </div>

                                    <p>
                                        Years Of <br />
                                        Experience
                                    </p>
                                </div>
                                <div class="about-two__shape-2 float-bob-x">
                                    <img src="{{ asset('frontend') }}/assets/images/shapes/about-two-shape-2.png" alt="" />
                                </div>
                                <div class="about-two__shape-3">
                                    <img src="{{ asset('frontend') }}/assets/images/shapes/about-two-shape-3.png" alt="" />
                                </div>
                                <div class="about-two__shape-4 float-bob-y">
                                    <img src="{{ asset('frontend') }}/assets/images/shapes/about-two-shape-4.png" alt="" />
                                </div>
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
                                    <h6 class="section-title__tagline">ABOUT US</h6>
                                    <span class="section-title__tagline-border"></span>
                                    <div class="section-title__shape-2">
                                        <i class="fas fa-plane"></i>
                                    </div>
                                </div>
                                <h3 class="section-title__title title-animation">
                                    Our Expertise Stands in <span>Logistics Solutions</span>
                                </h3>
                            </div>
                            <p class="about-two__text">
                                আমাদের পরিবহন সংস্থা দীর্ঘদিনের অভিজ্ঞতা ও বিশ্বস্ততার মাধ্যমে গ্রাহকদের সর্বোত্তম সেবা
                                দিয়ে আসছে। আমরা জানি, প্রতিটি পণ্যই গ্রাহকের জন্য গুরুত্বপূর্ণ, তাই আমাদের সেবা সবসময়
                                নিরাপদ, নির্ভরযোগ্য এবং সময়মতো ডেলিভারি নিশ্চিত করে। আমাদের আধুনিক যানবাহন ও দক্ষ
                                কর্মীদের মাধ্যমে দেশের যেকোনো প্রান্তে পণ্য পৌঁছানো আমাদের মূল লক্ষ্য।
                            </p>
                            <p class="about-two__text">
                                দেশীয় বা আন্তর্জাতিক যেকোনো পরিবহন সমাধানে আমরা আছি আপনার পাশে। শুধুমাত্র পণ্য পরিবহন
                                নয়, আমরা আপনার ব্যবসার অংশীদার হিসেবে কার্যকর লজিস্টিকস সমাধান প্রদান করি। রিয়েল-টাইম
                                ট্র্যাকিং, সাশ্রয়ী খরচ এবং উন্নত মানের সেবা নিশ্চিত করে আমরা প্রতিটি গ্রাহকের সন্তুষ্টি
                                অর্জনে প্রতিশ্রুতিবদ্ধ।
                            </p>
                            <div class="about-two__progress-box-outer">
                                <div class="about-two__progress-single">
                                    <div class="about-two__progress-box">
                                        <div class="circle-progress"
                                            data-options='{ "value": 0.95,"thickness": 4,"emptyFill": "#F4F5F9","lineCap": "square", "size": 100, "fill": { "color": "#AD2A22" } }'>
                                        </div>
                                        <!-- /.circle-progress -->
                                        <div class="about-two__pack count-box">
                                            <p class="count-text" data-stop="95" data-speed="1500"></p>
                                            <span>%</span>
                                        </div>
                                    </div>
                                    <div class="about-two__progress-content">
                                        <p>
                                            Supper <br />
                                            Fast Delivery
                                        </p>
                                    </div>
                                </div>
                                <div class="about-two__progress-single">
                                    <div class="about-two__progress-box">
                                        <div class="circle-progress"
                                            data-options='{ "value": 0.97,"thickness": 4,"emptyFill": "#F4F5F9","lineCap": "square", "size": 100, "fill": { "color": "#FD5523" } }'>
                                        </div>
                                        <!-- /.circle-progress -->
                                        <div class="about-two__pack count-box">
                                            <p class="count-text" data-stop="97" data-speed="1500"></p>
                                            <span>%</span>
                                        </div>
                                    </div>
                                    <div class="about-two__progress-content">
                                        <p>
                                            Customer <br />
                                            Satisfied
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
                                            <p>Safety And Reliability</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>End-to-End Transportation</p>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="about-two__point-one about-two__point-one--two">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Warehousing & Distribution</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Fast Transportation</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="about-two__btn-and-author-box">
                                <div class="about-two__btn-box">
                                    <a href="about.html" class="thm-btn">Read More
                                        <span><i class="icon-right-arrow"></i></span>
                                    </a>
                                </div>
                                <div class="about-two__author-box">
                                    <div class="about-two__author-details">
                                        <div class="about-two__author-img-box">
                                            <div class="about-two__author-img">
                                                <img src="{{ asset('frontend') }}/assets/images/resources/about-one-author-img-1.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="about-two__author-content">
                                            <h4>Dainel Brain</h4>
                                            <p>Co-Founder</p>
                                        </div>
                                    </div>
                                    <div class="about-two__video-link">
                                        <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                            <div class="about-two__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Two End-->

        <!--Services Two Start-->
        <section class="services-two">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box">
                        <span class="section-title__tagline-border"></span>
                        <div class="section-title__shape-1">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h6 class="section-title__tagline">Our Services</h6>
                        <span class="section-title__tagline-border"></span>
                        <div class="section-title__shape-2">
                            <i class="fas fa-plane"></i>
                        </div>
                    </div>
                    <h3 class="section-title__title title-animation">
                        Efficient Logistics Services <br />
                        <span>for Your Business</span>
                    </h3>
                </div>
                <div class="services-two__carousel owl-theme owl-carousel">
                    <!--Services Two Single Start-->
                    <div class="item">
                        <div class="services-two__single">
                            <div class="services-two__img">
                                <img src="{{ asset('frontend') }}/assets/images/services/services-two-2-1.jpg" alt="" />
                            </div>
                            <div class="services-two__content">
                                <div class="services-two__icon">
                                    <span class="icon-worldwide-shipping"></span>
                                </div>
                                <div class="services-two__title">
                                    <h3>
                                        <a href="international-transport.html">International Transport</a>
                                    </h3>
                                </div>
                                <p class="services-two__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global supply.
                                </p>
                                <ul class="services-two__point">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Quality Control System</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Real-Time Tracking</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>100% True Result Provide</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="services-two__btn">
                                    <a href="international-transport.html">Read More <span class="icon-next"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                    <div class="item">
                        <div class="services-two__single">
                            <div class="services-two__img">
                                <img src="{{ asset('frontend') }}/assets/images/services/services-two-2-2.jpg" alt="" />
                            </div>
                            <div class="services-two__content">
                                <div class="services-two__icon">
                                    <span class="icon-shipment"></span>
                                </div>
                                <div class="services-two__title">
                                    <h3><a href="ocean-transport.html">Ocean Freight</a></h3>
                                </div>
                                <p class="services-two__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global supply.
                                </p>
                                <ul class="services-two__point">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Quality Control System</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Real-Time Tracking</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>100% True Result Provide</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="services-two__btn">
                                    <a href="ocean-transport.html">Read More <span class="icon-next"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                    <div class="item">
                        <div class="services-two__single">
                            <div class="services-two__img">
                                <img src="{{ asset('frontend') }}/assets/images/services/services-two-2-3.jpg" alt="" />
                            </div>
                            <div class="services-two__content">
                                <div class="services-two__icon">
                                    <span class="icon-delivery-man"></span>
                                </div>
                                <div class="services-two__title">
                                    <h3><a href="track-transport.html">Rail Freight</a></h3>
                                </div>
                                <p class="services-two__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global supply.
                                </p>
                                <ul class="services-two__point">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Quality Control System</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Real-Time Tracking</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>100% True Result Provide</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="services-two__btn">
                                    <a href="track-transport.html">Read More <span class="icon-next"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                    <div class="item">
                        <div class="services-two__single">
                            <div class="services-two__img">
                                <img src="{{ asset('frontend') }}/assets/images/services/services-two-2-4.jpg" alt="" />
                            </div>
                            <div class="services-two__content">
                                <div class="services-two__icon">
                                    <span class="icon-truck"></span>
                                </div>
                                <div class="services-two__title">
                                    <h3><a href="personal-delivery.html">Road Freight</a></h3>
                                </div>
                                <p class="services-two__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global supply.
                                </p>
                                <ul class="services-two__point">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Quality Control System</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Real-Time Tracking</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>100% True Result Provide</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="services-two__btn">
                                    <a href="personal-delivery.html">Read More <span class="icon-next"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                    <div class="item">
                        <div class="services-two__single">
                            <div class="services-two__img">
                                <img src="{{ asset('frontend') }}/assets/images/services/services-two-2-5.jpg" alt="" />
                            </div>
                            <div class="services-two__content">
                                <div class="services-two__icon">
                                    <span class="icon-shipment"></span>
                                </div>
                                <div class="services-two__title">
                                    <h3>
                                        <a href="track-transport.html">Local Truck Transport</a>
                                    </h3>
                                </div>
                                <p class="services-two__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global supply.
                                </p>
                                <ul class="services-two__point">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Quality Control System</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Real-Time Tracking</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>100% True Result Provide</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="services-two__btn">
                                    <a href="track-transport.html">Read More <span class="icon-next"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                    <div class="item">
                        <div class="services-two__single">
                            <div class="services-two__img">
                                <img src="{{ asset('frontend') }}/assets/images/services/services-two-2-6.jpg" alt="" />
                            </div>
                            <div class="services-two__content">
                                <div class="services-two__icon">
                                    <span class="icon-delivery-man"></span>
                                </div>
                                <div class="services-two__title">
                                    <h3>
                                        <a href="personal-delivery.html">Fast Personal Delivery</a>
                                    </h3>
                                </div>
                                <p class="services-two__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global supply.
                                </p>
                                <ul class="services-two__point">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Quality Control System</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Real-Time Tracking</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>100% True Result Provide</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="services-two__btn">
                                    <a href="personal-delivery.html">Read More <span class="icon-next"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                    <div class="item">
                        <div class="services-two__single">
                            <div class="services-two__img">
                                <img src="{{ asset('frontend') }}/assets/images/services/services-two-2-3.jpg" alt="" />
                            </div>
                            <div class="services-two__content">
                                <div class="services-two__icon">
                                    <span class="icon-delivery-man"></span>
                                </div>
                                <div class="services-two__title">
                                    <h3><a href="emergency-transport.html">Rail Freight</a></h3>
                                </div>
                                <p class="services-two__text">
                                    A logistic service provider company plays a pivotal role in
                                    the global supply.
                                </p>
                                <ul class="services-two__point">
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Quality Control System</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Real-Time Tracking</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>100% True Result Provide</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="services-two__btn">
                                    <a href="emergency-transport.html">Read More <span class="icon-next"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                </div>
            </div>
        </section>
        <!--Services Two End-->

        <!--Counter Two Start -->
        <section class="counter-two">
            <div class="container">
                <div class="row">
                    <!--Counter Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="counter-two__single">
                            <div class="counter-two__icon">
                                <span class="icon-world-wide-web"></span>
                            </div>
                            <div class="counter-two__content">
                                <div class="counter-two__count">
                                    <h3 class="odometer" data-count="850">00</h3>
                                    <span>+</span>
                                </div>
                                <p class="counter-two__count-text">Worldwide Branches</p>
                            </div>
                        </div>
                    </div>
                    <!--Counter Two Single End-->
                    <!--Counter Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="300ms">
                        <div class="counter-two__single">
                            <div class="counter-two__icon">
                                <span class="icon-user-avatar"></span>
                            </div>
                            <div class="counter-two__content">
                                <div class="counter-two__count">
                                    <h3 class="odometer" data-count="50">00</h3>
                                    <span>k</span>
                                </div>
                                <p class="counter-two__count-text">Total Clients in World</p>
                            </div>
                        </div>
                    </div>
                    <!--Counter Two Single End-->
                    <!--Counter Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="500ms">
                        <div class="counter-two__single">
                            <div class="counter-two__icon">
                                <span class="icon-rating"></span>
                            </div>
                            <div class="counter-two__content">
                                <div class="counter-two__count">
                                    <h3 class="odometer" data-count="2.7">00</h3>
                                    <span>k</span>
                                </div>
                                <p class="counter-two__count-text">Satisfied Customers</p>
                            </div>
                        </div>
                    </div>
                    <!--Counter Two Single End-->
                    <!--Counter Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="700ms">
                        <div class="counter-two__single">
                            <div class="counter-two__icon">
                                <span class="icon-delivery-man-1"></span>
                            </div>
                            <div class="counter-two__content">
                                <div class="counter-two__count">
                                    <h3 class="odometer" data-count="99">00</h3>
                                    <span>%</span>
                                </div>
                                <p class="counter-two__count-text">Successful Delivery</p>
                            </div>
                        </div>
                    </div>
                    <!--Counter Two Single End-->
                </div>
            </div>
        </section>
        <!--Counter Two End -->

        <!--Find Transport Start -->
        <section class="find-transport">
            <div class="find-transport__shape-bg" style="
            background-image: url({{ asset('frontend') }}/assets/images/shapes/find-transport-shape-bg.png);
          "></div>
            <div class="container">
                <div class="find-transport__inner">
                    <div class="find-transport__title-box">
                        <h3 class="find-transport__title">
                            Looking for the Best <br />
                            logistics Transport Service?
                        </h3>
                    </div>
                    <div class="find-transport__btn-and-call">
                        <div class="find-transport__call-us">
                            <div class="icon">
                                <span class="icon-phone-call"></span>
                            </div>
                            <div class="content">
                                <span>Call Us Free</span>
                                <p><a href="tel:+9993256589">+999 325 6589</a></p>
                            </div>
                        </div>
                        <div class="find-transport__btn-box">
                            <a href="contact.html" class="thm-btn">Get a Quote<span><i
                                        class="icon-right-arrow"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Find Transport End -->

        <!--Testimonials Two Start -->
        <section class="testimonial-two">
            <div class="container">
                <div class="section-title text-left sec-title-animation animation-style1">
                    <div class="section-title__tagline-box">
                        <span class="section-title__tagline-border"></span>
                        <div class="section-title__shape-1">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h6 class="section-title__tagline">Client Feedback</h6>
                        <span class="section-title__tagline-border"></span>
                        <div class="section-title__shape-2">
                            <i class="fas fa-plane"></i>
                        </div>
                    </div>
                    <h3 class="section-title__title title-animation">
                        Happy Client Feedback <br />
                        <span>About Our Service</span>
                    </h3>
                </div>
                <div class="testimonial-two__middle">
                    <div class="testimonial-two__carousel owl-carousel owl-theme">
                        <!--Testimonial Two Single Start-->
                        <div class="item">
                            <div class="testimonial-two__single">
                                <div class="testimonial-two__single-inner">
                                    <div class="testimonial-two__shape-1">
                                        <img src="{{ asset('frontend') }}/assets/images/shapes/testimonial-two-shape-1.png" alt="" />
                                    </div>
                                    <div class="testimonial-two__quote">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial-two__ratting">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                    <p class="testimonial-two__text">
                                        Pension schemes ensu security during retirement years for
                                        eligible individua. Retirement pensions provide fina
                                    </p>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="{{ asset('frontend') }}/assets/images/testimonial/testimonial-2-1.jpg" alt="" />
                                        </div>
                                        <div class="testimonial-two__client-content">
                                            <h3><a href="testimonials.html">Hazard Will</a></h3>
                                            <p>Delivery Man</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Two Single End-->
                        <!--Testimonial Two Single Start-->
                        <div class="item">
                            <div class="testimonial-two__single">
                                <div class="testimonial-two__single-inner">
                                    <div class="testimonial-two__shape-1">
                                        <img src="{{ asset('frontend') }}/assets/images/shapes/testimonial-two-shape-1.png" alt="" />
                                    </div>
                                    <div class="testimonial-two__quote">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial-two__ratting">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                    <p class="testimonial-two__text">
                                        Pension schemes ensu security during retirement years for
                                        eligible individua. Retirement pensions provide fina
                                    </p>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="{{ asset('frontend') }}/assets/images/testimonial/testimonial-2-2.jpg" alt="" />
                                        </div>
                                        <div class="testimonial-two__client-content">
                                            <h3><a href="testimonials.html">Alisha Martin</a></h3>
                                            <p>Delivery Man</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Two Single End-->
                        <!--Testimonial Two Single Start-->
                        <div class="item">
                            <div class="testimonial-two__single">
                                <div class="testimonial-two__single-inner">
                                    <div class="testimonial-two__shape-1">
                                        <img src="{{ asset('frontend') }}/assets/images/shapes/testimonial-two-shape-1.png" alt="" />
                                    </div>
                                    <div class="testimonial-two__quote">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial-two__ratting">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                    <p class="testimonial-two__text">
                                        Pension schemes ensu security during retirement years for
                                        eligible individua. Retirement pensions provide fina
                                    </p>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="{{ asset('frontend') }}/assets/images/testimonial/testimonial-2-3.jpg" alt="" />
                                        </div>
                                        <div class="testimonial-two__client-content">
                                            <h3><a href="testimonials.html">Robert Son</a></h3>
                                            <p>Delivery Man</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Two Single End-->
                        <!--Testimonial Two Single Start-->
                        <div class="item">
                            <div class="testimonial-two__single">
                                <div class="testimonial-two__single-inner">
                                    <div class="testimonial-two__shape-1">
                                        <img src="{{ asset('frontend') }}/assets/images/shapes/testimonial-two-shape-1.png" alt="" />
                                    </div>
                                    <div class="testimonial-two__quote">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial-two__ratting">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                    <p class="testimonial-two__text">
                                        Pension schemes ensu security during retirement years for
                                        eligible individua. Retirement pensions provide fina
                                    </p>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="{{ asset('frontend') }}/assets/images/testimonial/testimonial-2-4.jpg" alt="" />
                                        </div>
                                        <div class="testimonial-two__client-content">
                                            <h3><a href="testimonials.html">Saila Sara</a></h3>
                                            <p>Delivery Man</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Two Single End-->
                        <!--Testimonial Two Single Start-->
                        <div class="item">
                            <div class="testimonial-two__single">
                                <div class="testimonial-two__single-inner">
                                    <div class="testimonial-two__shape-1">
                                        <img src="{{ asset('frontend') }}/assets/images/shapes/testimonial-two-shape-1.png" alt="" />
                                    </div>
                                    <div class="testimonial-two__quote">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial-two__ratting">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                    <p class="testimonial-two__text">
                                        Pension schemes ensu security during retirement years for
                                        eligible individua. Retirement pensions provide fina
                                    </p>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="{{ asset('frontend') }}/assets/images/testimonial/testimonial-2-5.jpg" alt="" />
                                        </div>
                                        <div class="testimonial-two__client-content">
                                            <h3><a href="testimonials.html">Oliva Sara</a></h3>
                                            <p>Delivery Man</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Two Single End-->
                        <!--Testimonial Two Single Start-->
                        <div class="item">
                            <div class="testimonial-two__single">
                                <div class="testimonial-two__single-inner">
                                    <div class="testimonial-two__shape-1">
                                        <img src="{{ asset('frontend') }}/assets/images/shapes/testimonial-two-shape-1.png" alt="" />
                                    </div>
                                    <div class="testimonial-two__quote">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial-two__ratting">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                    <p class="testimonial-two__text">
                                        Pension schemes ensu security during retirement years for
                                        eligible individua. Retirement pensions provide fina
                                    </p>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="{{ asset('frontend') }}/assets/images/testimonial/testimonial-2-6.jpg" alt="" />
                                        </div>
                                        <div class="testimonial-two__client-content">
                                            <h3><a href="testimonials.html">Kevin Smith</a></h3>
                                            <p>Delivery Man</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Two Single End-->
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonials Two End -->

        <!--Contact One Start -->
        <section class="contact-one">
            <div class="contact-one__shape-bg" style="
            background-image: url({{ asset('frontend') }}/assets/images/shapes/contact-one-shape-bg.png);
          "></div>
            <div class="contact-one__bg-img" style="
            background-image: url({{ asset('frontend') }}/assets/images/backgrounds/contact-one-bg-img.jpg);
          "></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-one__left">
                            <div class="contact-one__video-link">
                                <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                    <div class="contact-one__video-icon">
                                        <span class="fa fa-play"></span>
                                        <i class="ripple"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-one__right wow slideInRight" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <div class="contact-one__content">
                                <p class="contact-one__tagline">GET FREE QUOTE</p>
                                <h2 class="contact-one__title">Request a Quote</h2>
                                <form class="contact-one__form contact-form-validated"
                                    action="https://unicktheme.com/2025/tanspot/main-html/{{ asset('frontend') }}/assets/inc/sendemail.php"
                                    method="POST">
                                    <div class="contact-one__content-box">
                                        <div class="contact-one__input-box">
                                            <input type="text" placeholder="Your Name" name="name" required />
                                        </div>
                                        <div class="contact-one__input-box">
                                            <input type="email" placeholder="Email Address" name="email" required />
                                        </div>
                                        <div class="contact-one__input-box">
                                            <input type="text" placeholder="Phone Number" name="phone" required />
                                        </div>
                                        <div class="contact-one__input-box">
                                            <input type="text" placeholder="Property Types" name="subject" required />
                                        </div>
                                    </div>
                                    <div class="contact-one__progress">
                                        <div class="contact-one__progress-single">
                                            <h4 class="contact-one__progress-title">
                                                DIST (Miles):
                                            </h4>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="70%">
                                                    <div class="count-text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contact-one__content-bottom">
                                        <button type="submit" class="thm-btn">
                                            Get Your Quote<span><i class="icon-right-arrow"></i></span>
                                        </button>
                                        <div class="contact-one__content-bottom-text-box">
                                            <div class="contact-one__count-box">
                                                <div class="contact-one__count count-box">
                                                    <h3 class="count-text" data-stop="212" data-speed="1500">
                                                        00
                                                    </h3>
                                                    <span>+</span>
                                                </div>
                                                <p>Reviews</p>
                                            </div>
                                            <div class="contact-one__ratting">
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                                <span class="fas fa-star"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact One End -->

        <!-- Team Two Start -->
        <section class="team-two">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box">
                        <span class="section-title__tagline-border"></span>
                        <div class="section-title__shape-1">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h6 class="section-title__tagline">Our Team Members</h6>
                        <span class="section-title__tagline-border"></span>
                        <div class="section-title__shape-2">
                            <i class="fas fa-plane"></i>
                        </div>
                    </div>
                    <h3 class="section-title__title title-animation">
                        Our Talented <span>Team</span> <br />
                        <span>Member</span> Behind Tanspot
                    </h3>
                </div>
                <div class="team-two__carousel owl-carousel owl-theme">
                    <!-- Team Two Single Start -->
                    <div class="item">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="{{ asset('frontend') }}/assets/images/team/team-2-1.jpg" alt="" />
                                    <div class="team-two__social">
                                        <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                        <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                        <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name">
                                    <a href="team-details.html">Jessica Brown</a>
                                </h3>
                                <p class="team-two__sub-title">Founder</p>
                            </div>
                        </div>
                    </div>
                    <!-- Team Two Single End -->
                    <!-- Team Two Single Start -->
                    <div class="item">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="{{ asset('frontend') }}/assets/images/team/team-2-2.jpg" alt="" />
                                    <div class="team-two__social">
                                        <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                        <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                        <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name">
                                    <a href="team-details.html">James Fuller</a>
                                </h3>
                                <p class="team-two__sub-title">Senior Worker</p>
                            </div>
                        </div>
                    </div>
                    <!-- Team Two Single End -->
                    <!-- Team Two Single Start -->
                    <div class="item">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="{{ asset('frontend') }}/assets/images/team/team-2-3.jpg" alt="" />
                                    <div class="team-two__social">
                                        <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                        <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                        <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name">
                                    <a href="team-details.html">Jasmet Mangat</a>
                                </h3>
                                <p class="team-two__sub-title">Senior Associate</p>
                            </div>
                        </div>
                    </div>
                    <!-- Team Two Single End -->
                    <!-- Team Two Single Start -->
                    <div class="item">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="{{ asset('frontend') }}/assets/images/team/team-2-4.jpg" alt="" />
                                    <div class="team-two__social">
                                        <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                        <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                        <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name">
                                    <a href="team-details.html">Tim Southe</a>
                                </h3>
                                <p class="team-two__sub-title">Founder</p>
                            </div>
                        </div>
                    </div>
                    <!-- Team Two Single End -->
                    <!-- Team Two Single Start -->
                    <div class="item">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="{{ asset('frontend') }}/assets/images/team/team-2-5.jpg" alt="" />
                                    <div class="team-two__social">
                                        <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                        <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                        <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name">
                                    <a href="team-details.html">Alisa Fox</a>
                                </h3>
                                <p class="team-two__sub-title">Junior Worker</p>
                            </div>
                        </div>
                    </div>
                    <!-- Team Two Single End -->
                    <!-- Team Two Single Start -->
                    <div class="item">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="{{ asset('frontend') }}/assets/images/team/team-2-6.jpg" alt="" />
                                    <div class="team-two__social">
                                        <a href="team-details.html"><i class="fab fa-facebook-f"></i></a>
                                        <a href="team-details.html"><i class="fab fa-twitter"></i></a>
                                        <a href="team-details.html"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="team-details.html"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name">
                                    <a href="team-details.html">Andre Staus</a>
                                </h3>
                                <p class="team-two__sub-title">Delivery Man</p>
                            </div>
                        </div>
                    </div>
                    <!-- Team Two Single End -->
                </div>
            </div>
        </section>
        <!-- Team Two End -->

        <!-- Blog Two Start -->
        <section class="blog-two">
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <div class="section-title__tagline-box">
                        <span class="section-title__tagline-border"></span>
                        <div class="section-title__shape-1">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h6 class="section-title__tagline">Blog & News</h6>
                        <span class="section-title__tagline-border"></span>
                        <div class="section-title__shape-2">
                            <i class="fas fa-plane"></i>
                        </div>
                    </div>
                    <h3 class="section-title__title title-animation">
                        Latest <span>News</span> from Insight
                    </h3>
                </div>
                <div class="row">
                    <!-- Blog Two Single Start -->
                    <div class="col-xl-4 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="blog-two__single">
                            <div class="blog-two__img">
                                <img src="{{ asset('frontend') }}/assets/images/blog/blog-2-1.jpg" alt="" />
                                <div class="blog-two__plus">
                                    <a href="blog-details.html"><i class="icon-plus"></i></a>
                                </div>
                                <div class="blog-two__tag">
                                    <a href="blog-details.html">Logistics</a>
                                </div>
                            </div>
                            <div class="blog-two__content">
                                <ul class="blog-two__meta list-unstyled">
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-calendar-alt"></span>May 10, 2025
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-comments"></span>Comment
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="blog-two__title">
                                    <a href="blog-details.html">Grow Your Following by the Building Cargo Service</a>
                                </h3>
                                <div class="blog-two__author-and-btn">
                                    <div class="blog-two__author-info">
                                        <div class="blog-two__author-img-box">
                                            <div class="blog-two__author-img">
                                                <img src="{{ asset('frontend') }}/assets/images/blog/blog-one-author-img-1.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="blog-two__author-content">
                                            <h5>Janes Cooper</h5>
                                            <p>May 10, 2025</p>
                                        </div>
                                    </div>
                                    <div class="blog-two__arrow-box">
                                        <a href="blog-details.html" class="blog-two__arrow"><span
                                                class="icon-right-arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Two Single End -->
                    <!-- Blog Two Single Start -->
                    <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="blog-two__single">
                            <div class="blog-two__img">
                                <img src="{{ asset('frontend') }}/assets/images/blog/blog-2-2.jpg" alt="" />
                                <div class="blog-two__plus">
                                    <a href="blog-details.html"><i class="icon-plus"></i></a>
                                </div>
                                <div class="blog-two__tag">
                                    <a href="blog-details.html">Logistics</a>
                                </div>
                            </div>
                            <div class="blog-two__content">
                                <ul class="blog-two__meta list-unstyled">
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-calendar-alt"></span>May 10, 2025
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-comments"></span>Comment
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="blog-two__title">
                                    <a href="blog-details.html">Cargo Follow Through the Best Supply Your Metal</a>
                                </h3>
                                <div class="blog-two__author-and-btn">
                                    <div class="blog-two__author-info">
                                        <div class="blog-two__author-img-box">
                                            <div class="blog-two__author-img">
                                                <img src="{{ asset('frontend') }}/assets/images/blog/blog-one-author-img-2.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="blog-two__author-content">
                                            <h5>Kevin Cooper</h5>
                                            <p>May 10, 2025</p>
                                        </div>
                                    </div>
                                    <div class="blog-two__arrow-box">
                                        <a href="blog-details.html" class="blog-two__arrow"><span
                                                class="icon-right-arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Two Single End -->
                    <!-- Blog Two Single Start -->
                    <div class="col-xl-4 col-lg-6 wow fadeInRight" data-wow-delay="500ms">
                        <div class="blog-two__single">
                            <div class="blog-two__img">
                                <img src="{{ asset('frontend') }}/assets/images/blog/blog-2-3.jpg" alt="" />
                                <div class="blog-two__plus">
                                    <a href="blog-details.html"><i class="icon-plus"></i></a>
                                </div>
                                <div class="blog-two__tag">
                                    <a href="blog-details.html">Logistics</a>
                                </div>
                            </div>
                            <div class="blog-two__content">
                                <ul class="blog-two__meta list-unstyled">
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-calendar-alt"></span>May 10, 2025
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-comments"></span>Comment
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="blog-two__title">
                                    <a href="blog-details.html">How Will You Know Success When it Show Up?</a>
                                </h3>
                                <div class="blog-two__author-and-btn">
                                    <div class="blog-two__author-info">
                                        <div class="blog-two__author-img-box">
                                            <div class="blog-two__author-img">
                                                <img src="{{ asset('frontend') }}/assets/images/blog/blog-one-author-img-3.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="blog-two__author-content">
                                            <h5>Alisa Fox</h5>
                                            <p>May 10, 2025</p>
                                        </div>
                                    </div>
                                    <div class="blog-two__arrow-box">
                                        <a href="blog-details.html" class="blog-two__arrow"><span
                                                class="icon-right-arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Two Single End -->
                </div>
            </div>
        </section>
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
