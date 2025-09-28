@extends('website.layouts.app')
@section('title', 'FAQ Page')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/module-css/page-header.css" />
@endpush
@section('website_content')
<div class="page-wrapper">

    @include('website.layouts.inc.breadcrumb', ['page_name' => 'FAQ Page', 'page_title' => 'FAQ Page', 'page_link' =>
    route('faq.page')])
    <section class="faq-page">
        <div class="container">
            <div class="row">
                <div class="row">
                    {{-- Left Side --}}
                    <div class="col-xl-6">
                        <div class="faq-page__single">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                @foreach($faqs->take(5) as $key => $faq)
                                <div class="accrodion wow {{ $key % 2 == 0 ? 'fadeInLeft' : 'fadeInRight' }}"
                                    data-wow-delay="{{ $key * 100 }}ms" data-wow-duration="1500ms">
                                    <div class="accrodion-title">
                                        <h4>{{ $faq->question }}</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Right Side --}}
                    <div class="col-xl-6">
                        <div class="faq-page__single">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                @foreach($faqs->skip(5)->take(5) as $key => $faq)
                                <div class="accrodion wow {{ $key % 2 == 0 ? 'fadeInLeft' : 'fadeInRight' }}"
                                    data-wow-delay="{{ $key * 100 }}ms" data-wow-duration="1500ms">
                                    <div class="accrodion-title">
                                        <h4>{{ $faq->question }}</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
