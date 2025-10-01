@extends('website.layouts.app')
@section('title', 'Blog Page')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/module-css/page-header.css" />
<style>
    .custom-pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        gap: 10px;
        padding: 0;
    }

    .custom-pagination li a {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 50px;
        border: 1px solid var(--tanspot-base);
        color: var(--tanspot-black);
        text-decoration: none;
        transition: 0.3s;
    }

    .custom-pagination li a:hover {
        background-color: var(--tanspot-black);
        color: #fff;
        transform: scale(1.1);
    }

    .custom-pagination li.active a {
        background-color: var(--tanspot-black);
        color: #fff;
        font-weight: bold;
    }

    .custom-pagination li.disabled a {
        pointer-events: none;
        color: #ccc;
        border-color: #ccc;
    }

    .page-item.active .page-link {
	z-index: 3;
	color: #fff;
	background-color: var(--tanspot-black);
	border-color: var(--tanspot-black);
}
</style>
@endpush
@section('website_content')
<!-- Start sidebar widget content -->


<div class="page-wrapper">

    <!-- /.stricky-header -->

    @include('website.layouts.inc.breadcrumb', ['page_name' => 'Blog', 'page_title' => 'Our Latest News & Articles'])

    <!--Blog Right Sidebar Start -->
    <section class="blog-right-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="blog-right-sidebar__left">
                        <div class="row">
                            <!-- Blog Two Single Start -->
                            @foreach($posts as $post)
                            <div class="col-md-6 col-xl-6 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                                <div class="blog-two__single">
                                    <div class="blog-two__img">
                                        <img src="{{ asset($post->thumbnail) }}" alt="" />
                                        <div class="blog-two__plus">
                                            <a href="{{ route('blog.details.page', $post->slug) }}"><i class="icon-plus"></i></a>
                                        </div>
                                        <div class="blog-two__tag">
                                            <a href="#">{{ $post->category->post_category_name }}</a>
                                        </div>
                                    </div>
                                    <div class="blog-two__content">
                                        <ul class="blog-two__meta list-unstyled">
                                            <li>
                                                <a href="{{ route('blog.details.page', $post->slug) }}">
                                                    <span class="fas fa-calendar-alt"></span>{{
                                                    $post->created_at->format('M d, Y') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('blog.details.page', $post->slug) }}">
                                                    <span class="fas fa-eye"></span>View ( {{ $post->views }} )
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="blog-two__title">
                                            <a href="{{ route('blog.details.page', $post->slug) }}">{{ $post->title ?? 'No Title' }}</a>
                                        </h3>
                                        <div class="blog-two__author-and-btn">
                                            <div class="blog-two__author-info">
                                                <div class="blog-two__author-img-box">
                                                    <div class="blog-two__author-img">
                                                        <img src="{{ asset($post->author->image) }}" alt="" />
                                                    </div>
                                                </div>
                                                <div class="blog-two__author-content">
                                                    <h5>{{ $post->author->name }}</h5>
                                                    <p>{{ $post->created_at->format('M d, Y') }}</p>
                                                </div>
                                            </div>
                                            <div class="blog-two__arrow-box">
                                                <a href="{{ route('blog.details.page', $post->slug) }}" class="blog-two__arrow"><span
                                                        class="icon-right-arrow"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Blog Two Single End -->

                            </div>

                        @endforeach
                        </div>
                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $posts->links('website.layouts.pages.blog-page.pagination') }}
                        </div>


                    </div>
                </div>
                <!--Start Sidebar-->
                @include('website.layouts.pages.blog-page.sidebar')
                <!--End Sidebar-->
            </div>
        </div>
    </section>
    <!--Blog Right Sidebar End-->

</div>
<!-- /.page-wrapper -->
@endsection
