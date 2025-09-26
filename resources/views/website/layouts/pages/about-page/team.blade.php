<section class="team-two" style="padding-bottom: 100px">
    <div class="container">
        <div class="section-title text-center sec-title-animation animation-style1">
            <div class="section-title__tagline-box">
                <span class="section-title__tagline-border"></span>
                <div class="section-title__shape-1">
                    <i class="fas fa-plane"></i>
                </div>
                <h6 class="section-title__tagline">Our Team Members</h6>
                <span class="section-title__tagline-border"></span>
                <div class="section-title__shape-2">
                    <i class="fas fa-plane"></i>
                </div>
            </div>
            <h3 class="section-title__title title-animation">
                Our Talented <span>Team</span> <br />
                <span>Member</span> Behind Tanspot
            </h3>
        </div>
        <div class="team-two__carousel owl-carousel owl-theme">
            <!-- Team Two Single Start -->
            @foreach ($teams as $team)
            <div class="item">
                <div class="team-two__single">
                    <div class="team-two__img-box">
                        <div class="team-two__img">
                            @if($team->team_member_image)
                                <img src="{{ asset($team->team_member_image) }}" alt="{{ $team->team_member_name }}" />
                            @else
                                <img src="{{ asset('frontend') }}/assets/images/team/team-2-1.jpg" alt="" />
                            @endif
                            <div class="team-two__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-two__content">
                        <h3 class="team-two__name">
                            <a href="#">{{ $team->team_member_name ?? '' }}</a>
                        </h3>
                        <p class="team-two__sub-title">{{ $team->team_member_designation ?? '' }}</p>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Team Two Single End -->
        </div>
    </div>
</section>
