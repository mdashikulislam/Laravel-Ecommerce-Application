@if($setting->slider == 1)
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        @foreach($sliders as $slider)
            <div class="slider-item" style="background-image: url({{Storage::disk('local')->url($slider->image)}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">{{$slider->heading}}</h1>
                        <h2 class="subheading mb-4">{{$slider->paragraph}}</h2>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
    @endif