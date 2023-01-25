@php

$aboutslide = App\Models\AboutSlide::find(1);
$modelImages = App\Models\MultipleImage::all();
@endphp
<div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <ul class="about__icons__wrap">
                                
                               
                                <li>
                                    <img class="light" src="{{asset($aboutslide->about_exp_img)}}" alt="XD">
                                </li>
                                <li>
                                    <img class="light" src="{{asset($aboutslide->about_exp_img)}}" alt="XD">
                                </li>
                                <li>
                                    <img class="light" src="{{asset($aboutslide->about_exp_img)}}" alt="XD">
                                </li>
                                <li>
                                    <img class="light" src="{{asset($aboutslide->about_exp_img)}}" alt="XD">
                                </li>
                                <li>
                                    <img class="light" src="{{asset($aboutslide->about_exp_img)}}" alt="XD">
                                </li>
                                <li>
                                    <img class="light" src="{{asset($aboutslide->about_exp_img)}}" alt="XD">
                                </li>
                                <li>
                                    <img class="light" src="{{asset($aboutslide->about_exp_img)}}" alt="XD">
                                </li>



                                
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="about__content">
                                <div class="section__title">
                                    <span class="sub-title">01 - About me</span>
                                    <h2 class="title">{{$aboutslide->title }}</h2>
                                </div>
                                <div class="about__exp">
                                    <div class="about__exp__icon">
                                    <img class="rounded-circle avatar-xl" src="{{(!empty($aboutslide->about_exp_img))? url($aboutslide->about_exp_img):url('upload/no_image.jpg')}}" name= "about_img_disp" alt="Current Profile Image/Selected Profile Image" id="about_img_disp">
                                    </div>
                                    <div class="about__exp__content">
                                        <p>{{$aboutslide->short_title}}</p>
                                    </div>
                                </div>
                                <p class="desc">{{$aboutslide->about_description}}</p>
                                <a href="https://pratikmore.com" class="btn">{{$aboutslide->aboutme_btn}}</a>
                            </div>
                        </div>
                    </div>
                </div>