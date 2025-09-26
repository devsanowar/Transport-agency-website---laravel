<section class="find-transport">
    <div class="find-transport__shape-bg" style="
            background-image: url({{ asset($cta->cta_bg_image) }});
          "></div>
    <div class="container">
        <div class="find-transport__inner">
            <div class="find-transport__title-box">
                <h3 class="find-transport__title">
                   {!! $cta->cta_content !!}
                </h3>
            </div>
            <div class="find-transport__btn-and-call">
                <div class="find-transport__call-us">
                    <div class="icon">
                        <span class="icon-phone-call"></span>
                    </div>
                    <div class="content">
                        <span>Call Us Free</span>
                        <p><a href="tel:{{ $cta->cta_phone ?? '+9993256589' }}">{{ $cta->cta_phone ?? '+9993256589' }}</a></p>
                    </div>
                </div>
                <div class="find-transport__btn-box">
                    <a href="contact.html" class="thm-btn">Get a Quote<span><i class="icon-right-arrow"></i></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
