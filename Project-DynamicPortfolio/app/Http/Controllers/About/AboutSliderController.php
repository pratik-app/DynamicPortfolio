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
    // End of AboutSlider

    // Creating function to edit about page
    public function EditAbout(Request $request)
    {
        $aboutslide = $request->id; //Finding ID
        AboutSlide::findOrFail($aboutslide)->update([
            'title'=>$request->title,
            'short_title'=>$request->short_title,
            'about_description'=> $request->about_description
        ]);
        $notification = array(
            'message' => 'About Slide updated without Image successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
