<footer class="site-footer-two">
            <div class="site-footer-two__shape-1 float-bob-x">
                <img src="assets/images/shapes/site-footer-two-shape-1.png" alt="" />
            </div>
            <div class="container">
                <div class="site-footer-two__top">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget-two__column footer-widget-two__about">
                                {{-- <div class="footer-widget-two__logo">
                                    <a href="index.html"><img src="assets/images/resources/footer-logo-3.png"
                                            alt="" /></a>
                                </div> --}}
                                <p class="footer-widget-two__about-text">
                                    {{ $website_setting->website_footer_content ?? '' }}
                                </p>
                                <ul class="footer-widget-two__contact list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-phone-call"></span>
                                        </div>
                                        <div class="content">
                                            {{-- <h5>Contact</h5> --}}
                                            <p><a href="tel:{{ $website_setting->website_phone_number_one ?? '' }}">{{ $website_setting->website_phone_number_one ?? '' }}</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-location1"></span>
                                        </div>
                                        <div class="content">
                                            {{-- <h5>Location</h5> --}}
                                            <p>{{ $website_setting->website_address ?? '' }}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget-two__column footer-widget-two__usefull-link">
                                <div class="footer-widget-two__title-box">
                                    <h3 class="footer-widget-two__title">গুরুত্বপূর্ণ লিঙ্ক</h3>
                                </div>
                                <div class="footer-widget-two__link-box">
                                    <ul class="footer-widget-two__link list-unstyled">
                                        <li><a href="{{ route('home') }}">হোম</a></li>
                                        <li><a href="{{ route('about.page') }}">এভাউট</a></li>
                                        <li><a href="{{ route('services.page') }}">সার্ভিসসমূহ</a></li>
                                        <li><a href="{{ route('blog.page') }}">ব্লগ</a></li>
                                        <li><a href="{{ route('contact.page') }}">কন্টাক্ট</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms" style="padding-right: 20px;">
                            <div class="footer-widget-two__column footer-widget-two__services">
                                <div class="footer-widget-two__title-box">
                                    <h3 class="footer-widget-two__title">আমাদের সার্ভিসসমূহ</h3>
                                </div>
                                <ul class="footer-widget-two__link list-unstyled">
                                    @php
                                    $services = App\Models\Service::where('status', 1)->latest()->get();
                                    @endphp
                                    @foreach($services as $service)
                                    <li>
                                        <a href="{{ route('services.details.page', $service->id) }}">{{ $service->service_title }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget-two__column footer-widget-two__newsletter">
                                <h3 class="footer-widget-two__newsletter-title">
                                    সর্বশেষ আপডেট পেতে আমাদের নিউজলেটারে সাবস্ক্রাইব করুন
                                </h3>
                                <form action="https://unicktheme.com/2025/tanspot/main-html/assets/inc/sendemail.php"
                                    method="POST" class="footer-widget-two__newsletter-form contact-form-validated">
                                    <div class="footer-widget-two__newsletter-form-input-box">
                                        <input type="email" placeholder="Enter email address..." name="email"
                                            required />
                                        <button type="submit" class="footer-widget-two__newsletter-btn">
                                            <span class="icon-paper-plane"></span>
                                        </button>
                                    </div>
                                    <div class="result"></div>
                                </form>
                                <div class="site-footer-two__social">
                                    <a href="#" target="_blank"><i class="icon-facebook-app-symbol">{{ $socialIcon->facebook_url ?? '' }}</i></a>
                                    <a href="#" target="_blank"><i class="icon-twitter1">{{ $socialIcon->twitter_url ?? '' }}</i></a>
                                    <a href="#" target="_blank"><i class="icon-instagram">{{ $socialIcon->instagram_url ?? '' }}</i></a>
                                    <a href="#" target="_blank"><i class="fab fa-pinterest-p">{{ $socialIcon->pinterest_url ?? '' }}</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer-two__bottom">
                <div class="container">
                    <div class="site-footer-two__bottom-inner">
                        <p class="site-footer-two__bottom-text text-center">
                            © {{ $website_setting->website_copyright_text ?? '' }}
                        </p>
                        {{-- <ul class="list-unstyled site-footer-two__bottom-menu">
                            <li><a href="contact.html">Support</a></li>
                            <li><a href="about.html">Terms and Condition</a></li>
                            <li><a href="about.html">Privacy and Policy</a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </footer>
