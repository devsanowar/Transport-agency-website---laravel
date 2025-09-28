<header class="main-header">
    <div class="main-menu__top">
        <div class="main-menu__top-inner">
            <ul class="list-unstyled main-menu__contact-list">
                <li>
                    <div class="icon">
                        <i class="icon-phone-call"></i>
                    </div>
                    <div class="text">
                        <p><a href="tel:15502505260">+1 (550) 250 5260</a></p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <i class="icon-email"></i>
                    </div>
                    <div class="text">
                        <p>
                            <a href="mailto:info@tanspot24.com">info@tanspot24.com</a>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <i class="icon-location1"></i>
                    </div>
                    <div class="text">
                        <p>4124 Cimmaron Road, CA 92806</p>
                    </div>
                </li>
            </ul>
            <p class="main-menu__top-welcome-text">
                Welcome to Our Tanspot Office
            </p>
            <div class="main-menu__top-right">
                <div class="main-menu__top-time">
                    <div class="main-menu__top-time-icon">
                        <span class="icon-clock"></span>
                    </div>
                    <p class="main-menu__top-text">Mon - Fri: 09:00 - 05:00</p>
                </div>
                <div class="main-menu__social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <div class="main-menu__left">
                    <div class="main-menu__logo">
                        @if($website_setting->website_header_logo)
                        <a href="{{ route('home') }}"><img src="{{ asset($website_setting->website_header_logo) }}"
                                alt="" /></a>
                        @else
                        <a href="index.html"><img src="{{ asset('frontend') }}/assets/images/resources/logo-05.png"
                                alt="" /></a>
                        @endif

                    </div>
                </div>
                <div class="main-menu__main-menu-box">
                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                    <ul class="main-menu__list">
                        <li><a href="{{ route('home') }}">Home</a></li>

                        <li>
                            <a href="{{ route('about.page') }}">About</a>
                        </li>

                        <li>
                            <a href="{{ route('services.page') }}">Services</a>
                        </li>

                        <li>
                            <a href="{{ route('blog.page') }}">Blog</a>
                        </li>

                        <li><a href="{{ route('faq.page') }}">FAQs</a></li>

                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="main-menu__right">
                    <div class="main-menu__call">
                        <div class="main-menu__call-icon">
                            <i class="icon-phone-call"></i>
                        </div>
                        <div class="main-menu__call-content">
                            <p class="main-menu__call-sub-title">Call Anytime</p>
                            <h5 class="main-menu__call-number">
                                <a href="tel:9288006780">+92 ( 8800 ) - 6780</a>
                            </h5>
                        </div>
                    </div>
                    <div class="main-menu__search-cart-box">
                        <div class="main-menu__search-cart-box">
                            <div class="main-menu__search-box">
                                <a href="#" class="main-menu__search searcher-toggler-box icon-search"></a>
                            </div>

                        </div>
                    </div>

                    <div class="main-menu__btn-box">
                        <a href="contact.html" class="thm-btn">Track Order<span><i
                                    class="icon-right-arrow"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu main-menu-two">
    <div class="sticky-header__content"></div>

</div>
