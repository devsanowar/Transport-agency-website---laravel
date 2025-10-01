@extends('website.layouts.app')
@section('title', 'Services Page')
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/module-css/page-header.css" />
@endpush
@section('website_content')
<div class="page-wrapper">
    @include('website.layouts.inc.breadcrumb', ['page_name' => 'Services', 'page_title' => 'Our Services'])

    <section class="services-two">
        <div class="container">
            <div class="services-two__carousel owl-theme owl-carousel">

                <!--Services Two Single Start-->
                @foreach ($services as $service)
                <div class="item">
                    <div class="services-two__single">
                        <div class="services-two__img">
                            @if($service->service_thumbnail)
                            <img src="{{ asset($service->service_thumbnail) }}" alt="" />
                            @else
                            <img src="{{ asset('frontend') }}/assets/images/services/services-two-2-3.jpg" alt="" />
                            @endif
                        </div>
                        <div class="services-two__content">
                            <div class="services-two__icon">
                                <span class="icon-delivery-man"></span>
                            </div>
                            <div class="services-two__title">
                                <h3><a href="{{ route('services.details.page', ['id' => $service->id]) }}">{{ $service->service_title }}</a></h3>
                            </div>
                            <p class="services-two__text">
                                {!! $service->service_short_description !!}
                            </p>

                            <ul class="services-two__point">
                                @foreach($service->service_features as $feature)
                                <li>
                                    <div class="icon">
                                        <span class="fas fa-check"></span>
                                    </div>
                                    <div class="text">
                                        <p>{{ $feature }}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                            <div class="services-two__btn">
                                <a href="{{ route('services.details.page', ['id' => $service->id]) }}">Read More <span class="icon-next"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!--Services Two Single End-->
            </div>
        </div>
    </section>
</div>

@endsection
