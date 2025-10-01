@extends('website.layouts.app')
@section('title', 'Service Details')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/module-css/page-header.css" />
@endpush
@section('website_content')
<div class="page-wrapper">
    @include('website.layouts.inc.breadcrumb', ['page_name' => 'সার্ভিসসমূহ', 'page_title' => 'সার্ভিস ডিটেইলস'])
    <!--Service Details Start-->
    <section class="service-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="service-details__sidebar">
                        <div class="service-details__services-box">
                            <h3 class="service-details__services-title">Our Services</h3>
                            <ul class="service-details__services-list list-unstyled">
                                @php
                                $recentServices = App\Models\Service::where('status', 1)->latest()->get();
                                @endphp

                                @foreach($recentServices as $key => $recentService)
                                <li>
                                        <a href="{{ route('services.details.page',$recentService->id) }}">{{ $recentService->service_title }}<span
                                                class="icon-next"></span></a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <br class="service-details__left">
                    <div class="service-details__img">
                        @if($serviceDetail->service_single_page_image)
                        <img src="{{ asset($serviceDetail->service_single_page_image) }}" alt="">
                        @else
                        <img src="{{ asset('frontend') }}/assets/images/services/service-details-img-4.jpg" alt="">
                        @endif
                    </div>
                    <h3 class="service-details__title-1">{{ $serviceDetail->service_title ?? '' }}</h3>
                    <p class="service-details__text-1">{!! $serviceDetail->service_long_description ?? '' !!}</p>
                    </br></br>
                    <ul class="service-details__points-list list-unstyled">
                        @if($serviceDetail->service_features)
                        @foreach($serviceDetail->service_features as $feature)
                        <li>
                            <div class="icon">
                                <span class="icon-right-arrow"></span>
                            </div>
                            <p>{{ $feature }}</p>
                        </li>
                        @endforeach
                        @endif

                    </ul>
                    <div class="service-details__img-box">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="service-details__img-box-single">
                                    <div class="service-details__img-box-img">
                                        @if($serviceDetail->service_feature_image)
                                        <img src="{{ asset($serviceDetail->service_feature_image) }}" alt="">
                                        @else
                                        <img src="{{ asset('frontend') }}/assets/images/services/service-details-img-box-img-1.jpg"
                                            alt="">
                                        @endif
                                    </div>
                                    <div class="service-details__img-box-content">
                                        <div class="service-details__img-box-content-icon-and-title">
                                            <div class="service-details__img-box-content-icon">
                                                <span class="icon-new-product"></span>
                                            </div>
                                            <h3 class="service-details__img-box-content-title">{{
                                                $serviceDetail->service_feature_title ?? '' }}
                                            </h3>
                                        </div>
                                        <p class="service-details__img-box-content-text">{!!
                                            $serviceDetail->service_feature_description ?? '' !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="service-details__img-box-single">
                                    <div class="service-details__img-box-img">
                                        @if ($serviceDetail->service_featuretwo_image)
                                        <img src="{{ asset($serviceDetail->service_featuretwo_image) }}" alt="">
                                        @else
                                        <img src="{{ asset('frontend') }}/assets/images/services/service-details-img-box-img-2.jpg"
                                            alt="">
                                        @endif
                                    </div>
                                    <div class="service-details__img-box-content">
                                        <div class="service-details__img-box-content-icon-and-title">
                                            <div class="service-details__img-box-content-icon">
                                                <span class="icon-customer-loyalty"></span>
                                            </div>
                                            <h3 class="service-details__img-box-content-title">{{
                                                $serviceDetail->service_featuretwo_title ?? '' }}</h3>
                                        </div>
                                        <p class="service-details__img-box-content-text">{!!
                                            $serviceDetail->service_featuretwo_description ?? '' !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<!--Service Details End-->


</div><!-- /.page-wrapper -->
@endsection
