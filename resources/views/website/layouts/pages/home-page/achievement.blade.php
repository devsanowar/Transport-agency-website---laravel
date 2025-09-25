<section class="counter-two">
    <div class="container">
        <div class="row">

            @foreach ($achievements as $achievement)
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="500ms">
                <div class="counter-two__single">
                    <div class="counter-two__icon">
                        <span><img src="{{ asset($achievement->achievement_icon) }}"
                                alt="icon-image"></span>
                    </div>
                    <div class="counter-two__content">
                        <div class="counter-two__count">
                            <h3 class="odometer" data-count="{{ $achievement->achievement_count }}">{{ $achievement->achievement_count }}</h3>
                            <span>+</span>
                        </div>
                        <p class="counter-two__count-text">{{ $achievement->achievement_title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
