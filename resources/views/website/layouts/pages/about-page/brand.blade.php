<section class="brand-one">
    <div class="container">
        <div class="brand-one__carousel owl-carousel owl-theme">

            @foreach ($brands as $brand)
            <div class="brand-one__single">
                <div class="brand-one__single-inner">
                    <a href="#"><img src="{{ asset($brand->brand_image) }}" alt="{{ $brand->brand_name }}" /></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
