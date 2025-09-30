@extends('website.layouts.app')
@section('title', 'Contact Page')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/module-css/page-header.css" />
@endpush
@section('website_content')
<div class="page-wrapper">

    @include('website.layouts.inc.breadcrumb', ['page_name' => 'Contact', 'page_title' => 'Contact page'])

    <!--Contact Info Start-->
    <section class="contact-info">
        <div class="container">
            <div class="row">
                <!--Contact Two Single Start-->
                <div class="col-xl-4 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-phone-call"></span>
                        </div>
                        <p>Contact Us</p>
                        <h5><a href="tel:{{ $website_setting->website_phone_number_one ?? '' }}">{{
                                $website_setting->website_phone_number_one ?? '' }}</a></h5>
                        <h5><a href="tel:{{ $website_setting->website_phone_number_two ?? '' }}">{{
                                $website_setting->website_phone_number_two ?? '' }}</a></h5>
                    </div>
                </div>
                <!--Contact Two Single End-->
                <!--Contact Two Single Start-->
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-email"></span>
                        </div>
                        <p>Mail Us</p>
                        <h5>
                            <a href="mailto:{{ $website_setting->website_email_one ?? '' }}">{{
                                $website_setting->website_email_one ?? '' }}</a>
                        </h5>
                        <h5>
                            <a href="mailto:{{ $website_setting->website_email_two ?? '' }}">{{
                                $website_setting->website_email_two ?? '' }}</a>
                        </h5>
                    </div>
                </div>
                <!--Contact Two Single End-->
                <!--Contact Two Single Start-->
                {{-- <div class="col-xl-3 col-lg-6 wow fadeInRight" data-wow-delay="300ms">
                    <div class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-24-hours-service"></span>
                        </div>
                        <p>Working Hours</p>
                        <h5>
                            Wednesday - Sunday <br />
                            7:00 AM - 5:00 PM
                        </h5>
                    </div>
                </div> --}}
                <!--Contact Two Single End-->
                <!--Contact Two Single Start-->
                <div class="col-xl-4 col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                    <div class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-location1"></span>
                        </div>
                        <p>Our Office Location</p>
                        <h5>{{ $website_setting->website_address ?? '' }}</h5>
                    </div>
                </div>
                <!--Contact Two Single End-->
            </div>
        </div>
    </section>
    <!--Contact Info End-->

    <!--Contact Page Start-->
    <section class="contact-page">
        <div class="container">
            <div class="contact-page__inner">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="contact-page__left">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                                class="google-map__one" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-page__right">
                            <h3 class="contact-page__form-title">Get A Free Quote</h3>
                            <form id="ContactMailForm" class="contact-form-validated contact-page__form"
                                action="{{ route('contact.mail.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-xl-12 col-lg-6 col-md-6">
                                        <div class="contact-page__input-box">
                                            <input type="text" name="name" placeholder="Your name" required="" />
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-6 col-md-6">
                                        <div class="contact-page__input-box">
                                            <input type="text" placeholder="Phone" name="phone" required="" />
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box text-message-box">
                                            <textarea name="message" placeholder="Messege" required=""></textarea>
                                        </div>
                                        <div class="contact-page__btn-box">
                                            <button type="submit" class="footer-widget__newsletter-btn thm-btn">
                                                Send A Message
                                                <span><i class="icon-right-arrow"></i></span>
                                            </button>
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
    <!--Contact Page End-->

</div>
@endsection
@push('scripts')
<script>
$(document).on('submit', '#ContactMailForm', function(e){
    e.preventDefault();
    let form = $(this);

    $.ajax({
        url: form.attr('action'),
        method: "POST",
        data: form.serialize(),
        success: function(res){
            if(res.success){
                toastr.success(res.message); // ✅ toastr success
                form.trigger("reset");
            }
        },
        error: function(xhr){
            let errors = xhr.responseJSON?.errors;
            if(errors){
                $.each(errors, function(key, value){
                    toastr.error(value[0]); // ✅ toastr error
                });
            } else {
                toastr.error('Something went wrong!');
            }
        }
    });
});
</script>
@endpush
