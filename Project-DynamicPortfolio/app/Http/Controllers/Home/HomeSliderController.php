<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Intervention\Image\ImageManagerStatic as Image;


class HomeSliderController extends Controller
{
    public function HomeSlider()
    {
        $homeslide = HomeSlide::find(1); //Finding ID
        return view('admin.home_slide.home_slide_all', compact('homeslide')); //Sending Object to the page

    }
    //End of Home Slider Function
    public function UpdateSlider(Request $request)
    {
        $slide_id = $request->id; //Getting Hidden User ID

        // Condition that will check if image is selected or not

        if($request->file('home_slide') || $request->file('portfolio_Logo') || $request->file('home_slide') && $request->file('portfolio_Logo')  ){
            $image = $request->file('home_slide'); //getting the selected image
            $image2 = $request->file('portfolio_Logo'); //getting the Portfolio selected image
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // Creating unique image name to store in db and avoid duplication
            Image::make($image)->resize(636, 852)->save('upload/home_slide/'.$name_gen); //Using Image inetervention class to resize the selected image
            $img2name_gen = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension(); // Creating unique image name to store in db and avoid duplication
            Image::make($image2)->resize(636, 852)->save('upload/home_slide/navbarLogo/'.$img2name_gen); //Using Image inetervention class to resize the selected image
            $save_url = 'upload/home_slide/'.$name_gen;
            $saveUrl2 = 'upload/home_slide/navbarLogo/'.$img2name_gen;
            // finding the existing ID and updating it in Database
            HomeSlide::findOrFail($slide_id)->update([
                'portfolio_img'=> $saveUrl2,
                'nav_tab1'=> $request->navTab1,
                'nav_tab2'=> $request->navTab2,
                'nav_tab3'=> $request->navTab3,
                'nav_tab4'=> $request->navTab4,
                'nav_tab5'=> $request->navTab5,
                'nav_tab6'=> $request->navTab6,
                'nav_tab7'=> $request->navTab7,
                'reCallbtn'=>$request->reCallbtn,
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide'=> $save_url
            ]);
            // Passing message to the page using notification variable
            $notification = array(
                'message' => 'Home Slide updated with Image successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
        else 
        {
            // if image is not selected just update the rest of the field
            HomeSlide::findOrFail($slide_id)->update([
                'nav_tab1'=> $request->navTab1,
                'nav_tab2'=> $request->navTab2,
                'nav_tab3'=> $request->navTab3,
                'nav_tab4'=> $request->navTab4,
                'nav_tab5'=> $request->navTab5,
                'nav_tab6'=> $request->navTab6,
                'nav_tab7'=> $request->navTab7,
                'reCallbtn'=>$request->reCallbtn,
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);
            // passing message with the page
            $notification = array(
                'message' => 'Home Slide updated without Image successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);

        }

    }
    //End of Update Slider Function
    
}
