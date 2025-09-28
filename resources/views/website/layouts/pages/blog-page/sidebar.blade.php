<div class="col-xl-4">
    <div class="sidebar sidebar--three">
        <!--Start Sidebar Single-->
        <div class="sidebar__single sidebar__search wow fadeInUp" data-wow-delay=".1s">
            <form action="#" class="sidebar__search-form">
                <input type="search" placeholder="Search..." />
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!--End Sidebar Single-->

        <!--Start Sidebar Single-->
        <div class="sidebar__single sidebar__category wow fadeInUp" data-wow-delay=".1s">
            <h3 class="sidebar__title">Categories</h3>
            <ul class="sidebar__category-list list-unstyled">
                @foreach ($postCategories as $category)
                <li>
                    <a href="#">{{ $category->post_category_name }} <span>({{ str_pad($category->posts_count,2,'0', STR_PAD_LEFT) }})</span></a>
                </li>
                @endforeach
            </ul>
        </div>
        <!--End Sidebar Single-->

        <!--Start Sidebar Single-->
        <div class="sidebar__single sidebar__post wow fadeInUp" data-wow-delay=".1s">
            <h3 class="sidebar__title">Recent Post</h3>
            <div class="sidebar__post-box">

                @foreach ($recentPosts as $recentPost)
                <div class="sidebar__post-single">
                    <div class="sidebar-post__img">
                        @if($recentPost->thumbnail)
                        <img src="{{ asset($recentPost->thumbnail) }}" alt="" />
                        @else
                        <img src="{{ asset('frontend') }}/assets/images/blog/recent-post-img-2.jpg" alt="" />
                        @endif
                    </div>
                    <div class="sidebar__post-content-box">
                        <h3>
                            <a href="#">{{ $recentPost->title }}</a>
                        </h3>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!--End Sidebar Single-->

        <!--Start Sidebar Single-->
        <div class="sidebar__single sidebar__tags wow fadeInUp" data-wow-delay=".1s">
            <h3 class="sidebar__title">Tags Cloud</h3>
            <ul class="sidebar__tags-list clearfix list-unstyled">
                <li><a href="#">Carpet</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Agent</a></li>
                <li><a href="#">Room</a></li>
                <li><a href="#">Love</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Project</a></li>
                <li><a href="#">Corporate</a></li>
            </ul>
        </div>
        <!--End Sidebar Single-->
    </div>
</div>
