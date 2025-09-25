<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> @yield('title') || {{ $website_setting->website_title }}</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend') }}/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend') }}/assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend') }}/assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="{{ asset('frontend') }}/assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Tanspot HTML 5 Template " />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />

    @include('website.layouts.inc.style')

    @stack('styles')

</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!--Start Preloader-->
    <div class="loader js-preloader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!--End Preloader-->

    <div class="chat-icon">
        <button type="button" class="chat-toggler">
            <i class="fa fa-comment"></i>
        </button>
    </div>
    <!--Chat Popup-->

    @include('website.layouts.inc.chat-popup')


    <div class="page-wrapper">
        @include('website.layouts.inc.header')


        @yield('website_content')

        <!--Site Footer Two Start-->
        @include('website.layouts.inc.footer')
        <!--Site Footer Two End-->
    </div>
    <!-- /.page-wrapper -->

   @include('website.layouts.inc.mobile-nav')

    @include('website.layouts.inc.search')
    <!-- End Search Popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>

    @include('website.layouts.inc.script')
    @stack('scripts')
</body>

</html>
