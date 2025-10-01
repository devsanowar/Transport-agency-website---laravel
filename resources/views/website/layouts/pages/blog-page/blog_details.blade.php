@extends('website.layouts.app')
@section('title', 'Blog Details')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/module-css/page-header.css" />
@endpush
@section('website_content')
<div class="page-wrapper">

    @include('website.layouts.inc.breadcrumb', ['page_name' => 'Blog', 'page_title' => 'Blog Details'])


    <!--Blog Details Start -->
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            @if($postDetail->thumbnail)
                            <img src="{{ asset($postDetail->thumbnail) }}" alt="">
                            @else
                            <img src="{{ asset('frontend/assets/images/blog/blog-details-img-1.jpg') }}" alt="">
                            @endif
                            <div class="blog-details__date">
                                <p>{{ $postDetail->created_at->format('d') }}<br>{{ $postDetail->created_at->format('M')
                                    }}</p>
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <div class="blog-details__user-and-meta">
                                <div class="blog-details__user">
                                    <p><span class="icon-user-1"></span>By {{ $postDetail->author->name }}</p>
                                </div>
                                <ul class="blog-details__meta list-unstyled">
                                    <li>
                                        <a href="blog-details.html">
                                            <span class="fas fa-eye"></span>View ( {{ $postDetail->views }} )
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="fas fa-clock"></span>{!!
                                            read_time($postDetail->description) !!}</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="blog-details__title">{{ $postDetail->title ?? 'No Title' }}
                            </h3>
                            <p class="blog-details__text-1">{!! $postDetail->description ?? 'No Description' !!}</p>



                            <div class="blog-details__tag-and-share">
                                <div class="blog-details__share-box">
                                    <h3 class="blog-details__share-title">Share :</h3>
                                    <div class="blog-details__share">
                                        {{-- Facebook --}}
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                            target="_blank" rel="noopener">
                                            <span class="icon-facebook-app-symbol"></span>
                                        </a>

                                        {{-- Twitter --}}
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($postDetail->title) }}"
                                            target="_blank" rel="noopener">
                                            <span class="icon-twitter"></span>
                                        </a>

                                        {{-- LinkedIn --}}
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($postDetail->title) }}"
                                            target="_blank" rel="noopener">
                                            <i class="fab fa-linkedin"></i>
                                        </a>

                                        {{-- WhatsApp --}}
                                        <a href="https://api.whatsapp.com/send?text={{ urlencode($postDetail->title . ' ' . request()->fullUrl()) }}"
                                            target="_blank" rel="noopener">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--Start Sidebar-->

                 @include('website.layouts.pages.blog-page.sidebar')

                <!--End Sidebar-->
            </div>
        </div>
    </section>



</div><!-- /.page-wrapper -->
@endsection
