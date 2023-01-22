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
        if($request->file('about_exp_img'))
        {
            
            $about_exp_image = $request->file('about_exp_img'); //getting the selected image
            $about_exp_img_name = hexdec(uniqid()).'.'.$about_exp_image->getClientOriginalExtension(); // Creating unique image name to store in db and avoid duplication
            Image::make($about_exp_image)->resize(100, 100)->save('upload/about_img/'.$about_exp_img_name); //Using Image inetervention class to resize the selected image
            $save_url = 'upload/about_img/'.$about_exp_img_name;
            AboutSlide::findOrFail($aboutslide)->update([
                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'about_description'=> $request->about_description,
                'about_exp_img'=>$save_url,
                'aboutme_btn'=> $request->aboutme_btn,
            ]);
            $notification = array(
                'message' => 'About Slide updated with Image successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
        else
        {
            AboutSlide::findOrFail($aboutslide)->update([
                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'about_description'=> $request->about_description,
                'aboutme_btn'=> $request->aboutme_btn,
            ]);
            $notification = array(
                'message' => 'About Slide updated without Image successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
        
    }
}
