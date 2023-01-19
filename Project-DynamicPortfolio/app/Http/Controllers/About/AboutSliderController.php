<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\AboutSlide;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class AboutSliderController extends Controller
{
    public function AboutSlider()
    {
        $aboutslide = AboutSlide::find(1); //Finding ID
        return view('admin.about_slide.about_slide_all', compact('aboutslide')); //Sending Object to the page

    }
}
