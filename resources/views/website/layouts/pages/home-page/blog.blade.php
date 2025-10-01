<section class="blog-two">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline-border"></span>
                <div class="section-title__shape-1">
                    <i class="fas fa-plane"></i>
                </div>
                <h6 class="section-title__tagline">ব্লগ এবং নিউজ</h6>
                <span class="section-title__tagline-border"></span>
                <div class="section-title__shape-2">
                    <i class="fas fa-plane"></i>
                </div>
            </div>
            <h3 class="section-title__title">
               ইনসাইট-এর <span>সর্বশেষ</span>সংবাদ
            </h3>
        </div>
        <div class="row">
            <!-- Blog Two Single Start -->
            @foreach ($posts as $post)
            <div class="col-xl-4 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
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
                                    <span class="fas fa-calendar-alt"></span>{{ $post->created_at->format('M d, Y') }}
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
                                        <img src="{{ asset($post->author->image) }}"
                                            alt="" />
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
            </div>
             @endforeach
            <!-- Blog Two Single End -->
        </div>
    </div>
</section>
