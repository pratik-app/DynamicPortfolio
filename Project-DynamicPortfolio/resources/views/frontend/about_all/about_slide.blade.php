@php

$aboutslide = App\Models\AboutSlide::find(1);

@endphp
<div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <ul class="about__icons__wrap">
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/xd_light.png')}}" alt="XD">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/xd.png')}}" alt="XD">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/skeatch_light.png')}}" alt="Skeatch">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/skeatch.png')}}" alt="Skeatch">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/illustrator_light.png')}}" alt="Illustrator">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/illustrator.png')}}" alt="Illustrator">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/hotjar_light.png')}}" alt="Hotjar">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/hotjar.png')}}" alt="Hotjar">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/invision_light.png')}}" alt="Invision">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/invision.png')}}" alt="Invision">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/photoshop_light.png')}}" alt="Photoshop">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/photoshop.png')}}" alt="Photoshop">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/figma_light.png')}}" alt="Figma">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/figma.png')}}" alt="Figma">
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