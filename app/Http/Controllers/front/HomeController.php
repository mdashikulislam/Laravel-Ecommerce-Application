<?php

namespace App\Http\Controllers\front;

use App\admin\setting\Footer;
use App\admin\setting\HeaderTop;
use App\admin\setting\partner;
use App\admin\TestiMonial;
use App\Setting;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::all()->first();
        $headerTop = HeaderTop::all()->first();
        $slider = Slider::all();
        $testimonial = TestiMonial::all();
        $partner = partner::all();
        $footer = Footer::all()->first();
        return view('front.index')->with([
            'setting'=>$setting,
            'headerTop'=>$headerTop,
            'sliders'=>$slider,
            'testimonials'=>$testimonial,
            'partners'=>$partner,
            'footer'=>$footer
        ]);
    }
}
