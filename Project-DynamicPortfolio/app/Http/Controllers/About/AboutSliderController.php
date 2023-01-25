<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\AboutSlide;
use App\Models\MultipleImage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $aboutslide = $request->id; //Getting ID
        if($request->file('about_exp_img'))
        {
            // Experience Icon Code
            $about_exp_image = $request->file('about_exp_img'); //getting the selected image
            $about_exp_img_name = hexdec(uniqid()).'.'.$about_exp_image->getClientOriginalExtension(); // Creating unique image name to store in db and avoid duplication
            Image::make($about_exp_image)->resize(100, 100)->save('upload/about_img/'.$about_exp_img_name); //Using Image inetervention class to resize the selected image
            $save_url = 'upload/about_img/'.$about_exp_img_name;
            // Updating content
            AboutSlide::findOrFail($aboutslide)->update([
                'title'=>$request->title,
                'short_title'=>$request->short_title,
                'about_description'=> $request->about_description,
                'about_exp_img'=>$save_url,
                'aboutme_btn'=> $request->aboutme_btn,
            ]);
            $notification = array(
                'message' => 'About Slide updated with Images successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
        elseif($request->file('multiple_img'))
        {
            $editID = $request->id; //Getting ID
            // Experience Icon Code
            $mul_img = $request->file('multiple_img'); //getting the selected image

            foreach ($mul_img as $multipleImages)
            {
                $mul_img_name = hexdec(uniqid()).'.'.$multipleImages->getClientOriginalExtension(); // Creating unique image name to store in db and avoid duplication
                Image::make($multipleImages)->resize(220, 220)->save('upload/about_img/Collections/'.$mul_img_name); //Using Image inetervention class to resize the selected image
                $store_imgs = 'upload/about_img/Collections/'.$mul_img_name;
                // Updating content
                MultipleImage::insert([
                    'edit_id'=>$aboutslide,
                    'multiple_images'=>$store_imgs,
                    'created_at'=>Carbon::now()
                ]);
                
                
            };
            $notification = array(
                'message' => 'All Icons Added Successfully',
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
                'message' => 'About Slide updated without Images successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
        
        
    }
}
