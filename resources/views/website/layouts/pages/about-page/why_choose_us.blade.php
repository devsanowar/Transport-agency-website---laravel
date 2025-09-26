<section class="why-choose-two"
    style="background-image: url('{{ asset($whyChooseUs->why_choose_us_bg_image ?? 'default.jpg') }}');">


    <div class="why-choose-two__bg-box">
        <div class="why-choose-two__shape-bg" style="
              background-image: url({{ asset($whyChooseUs->why_choose_us_shape_image) }});
            "></div>
    </div>

    <div class="why-choose-two__client-box">
        <ul class="why-choose-two__review-list">
            @foreach ($reviews as $review)
            <li>
                <div class="why-choose-two__review-img">
                    <img src="{{ $review->client_image }}" alt="" />
                </div>
            </li>
            @endforeach
        </ul>
        <div class="why-choose-two__client-content">
            <div class="why-choose-two__client-count">
                <h3 class="odometer" data-count="2500">00</h3>
                <span>+</span>
            </div>
            <p class="why-choose-two__client-text">Happy Clients</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="why-choose-two__left">
                    <div class="why-choose-two__title-box">
                        <div class="section-title text-left sec-title-animation animation-style1">
                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline-border"></span>
                                <div class="section-title__shape-1">
                                    <i class="fas fa-plane"></i>
                                </div>
                                <h6 class="section-title__tagline" style="color: rgba(var(--tanspot-white-rgb), .70);">
                                    {{ $whyChooseUs->why_choose_us_title }}</h6>
                                <span class="section-title__tagline-border"></span>
                                <div class="section-title__shape-2">
                                    <i class="fas fa-plane"></i>
                                </div>
                            </div>
                            @php
                            $subtitle = $whyChooseUs->why_choose_us_subtitle ?? 'Reason For Choosing|Logistics
                            Solution!';
                            $parts = explode('|', $subtitle);
                            @endphp

                            <h3 class="section-title__title">
                                {{ $parts[0] ?? '' }}
                                <span>{{ $parts[1] ?? '' }}</span>
                            </h3>

                        </div>
                        <p class="why-choose-two__text">
                            {{ $whyChooseUs->why_choose_us_description }}
                        </p>
                    </div>
                    <div class="why-choose-two__point-box">

                        @foreach($whyChooseUs->features->chunk(2) as $index => $chunk)
                        <ul class="why-choose-two__point {{ $index > 0 ? 'why-choose-two__point--two' : '' }}">
                            @foreach($chunk as $feature)
                            <li>
                                <div class="why-choose-two__icon">
                                    <span><img src="{{ $feature->icon }}" alt="" width="40"></span>
                                </div>
                                <div class="why-choose-two__content">
                                    <h4>{!! $feature->title !!}</h4>
                                    <p>{!! $feature->description !!}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endforeach

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
