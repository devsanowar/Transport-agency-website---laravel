<script src="{{ asset('frontend') }}/assets/js/jquery-latest.js"></script>
<script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jarallax.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.appear.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/swiper.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.validate.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/wNumb.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/wow.js"></script>
<script src="{{ asset('frontend') }}/assets/js/isotope.js"></script>
<script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery-ui.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/marquee.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/countdown.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.circleType.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.fittext.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.lettering.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery-sidebar-content.js"></script>
<script src="{{ asset('frontend') }}/assets/js/aos.js"></script>
<script src="{{ asset('frontend') }}/assets/js/odometer.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/typed-2.0.11.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.circle-progress.min.js"></script>

<script src="{{ asset('frontend') }}/assets/js/gsap/gsap.js"></script>
<script src="{{ asset('frontend') }}/assets/js/gsap/ScrollTrigger.js"></script>
<script src="{{ asset('frontend') }}/assets/js/gsap/SplitText.js"></script>

<!-- template js -->
<script src="{{ asset('frontend') }}/assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const currentPath = window.location.pathname;
    const menuLinks = document.querySelectorAll('.main-menu__list a');

    // Shob li theke current class remove
    const allMenuItems = document.querySelectorAll('.main-menu__list li');
    allMenuItems.forEach(li => li.classList.remove('current'));

    menuLinks.forEach(link => {
        if (link.getAttribute('href') === window.location.origin + currentPath) {
            link.parentElement.classList.add('current');
        }
    });
});
</script>

