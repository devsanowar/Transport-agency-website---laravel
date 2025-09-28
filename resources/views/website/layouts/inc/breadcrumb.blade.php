<section class="page-header">
    @if($website_breadcrumb->breadcrumb_bg_image)
        <div
          class="page-header__bg"
          style="
            background-image: url({{ asset($website_breadcrumb->breadcrumb_bg_image) }});
          "
        ></div>
    @else
        <div
          class="page-header__bg"
          style="
            background-image: url({{ asset('frontend') }}/assets/images/backgrounds/page-header-bg.jpg);
          "
        ></div>
    @endif

        <div class="container">
          <div class="page-header__inner">
            <div class="page-header__img-1">
                @if($website_breadcrumb->page_header_image)
                    <img src="{{ asset($website_breadcrumb->page_header_image) }}" alt="" />
                @else
                    <img src="{{ asset('frontend') }}/assets/images/resources/page-header-img-1.png" alt="" />

                @endif
            </div>
            <div class="page-header__shape-1 float-bob-y">
                @if($website_breadcrumb->container_box_image)
                    <img src="{{ asset($website_breadcrumb->container_box_image) }}" alt="" />
                @else
                    <img src="{{ asset('frontend') }}/assets/images/shapes/page-header-shape-1.png" alt="" />
                @endif
            </div>
            <h3>{{ $page_name }}</h3>
            <div class="thm-breadcrumb__inner">
              <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span class="fas fa-angle-right"></span></li>
                <li>{{ $page_title }}</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
