
@extends('frontend.main_master')
@section('main')
@php
    $jobs = App\Models\JobOpenings::All()
@endphp
    
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Available Jobs</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Join Us! We value our Customers and our employees</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon01.png')}}" alt=""></li>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon02.png')}}" alt=""></li>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon03.png')}}" alt=""></li>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon04.png')}}" alt=""></li>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon05.png')}}" alt=""></li>
                <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon06.png')}}" alt=""></li>
            </ul>
        </div>
    </section>
            <!-- breadcrumb-area-end -->
            <section class="services__style__one">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="services__style__two__wrap">
                                <div class="row gx-0">
                                    @foreach($jobs as $job)
                                    <div class="col-xl-5 col-lg-6 col-md-8">
                                        <div class="services__style__two__item" style="border:none">
                                            <div class="services__style__two__content">
                                                <h3 class="title">{{$job->job_title}}</h3>
                                                <p>Job Location: {{$job->job_location}}</p>
                                                <p>Job Type: {{$job->job_type}}</p>
                                                <p>Salary Range: {{$job->job_pay_range}}</p>
                                                <p>Job Description: {{$job->job_description}}</p>
                                                <p>Job Application Dead Line: {{$job->job_application_deadline}}</p>
                                                <p>Job Posted On: {{$job->job_posted_date}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <aside class="services__sidebar">
                                <div class="widget">
                                    <h5 class="title">Send Your Resume Now!</h5>
                                    <form action="#" class="sidebar__contact">
                                        <input type="text" placeholder="Enter name*" required/>
                                        <input type="email" placeholder="Enter your mail*" required/>
                                        <input type="text" placeholder="Mobile Number*" required/>
                                            <select class="form-select" name = "applicationfor" alt="job application for" style="border:none" required>
                                                <option name="applicationfor" value=""><small>Select Job from Available Jobs</small></option>
                                                @foreach($jobs as $availableJobs)
                                                    <option name="applicationfor" value="{{$availableJobs->job_title}}">{{$availableJobs->job_title}}</option>
                                                @endforeach
                                            </select>
                                            </br>
                                        <textarea name="message" id="message" placeholder="Massage*" required></textarea>
                                        <button type="submit" class="btn">Send Application</button>
                                    </form>
                                </div>
                                <div class="widget">
                                    <h5 class="title">Contact Information</h5>
                                    <ul class="sidebar__contact__info">
                                        <li><span>Address :</span> 8638 Amarica Stranfod, <br> Mailbon Star</li>
                                        <li><span>Mail :</span> yourmail@gmail.com</li>
                                        <li><span>Phone :</span> +7464 0187 3535 645</li>
                                        <li><span>Fax id :</span> +9 659459 49594</li>
                                    </ul>
                                    <ul class="sidebar__contact__social">
                                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            
            </section>
            


            <!-- contact-area -->
            <section class="homeContact homeContact__style__two">
                <div class="container">
                    <div class="homeContact__wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section__title">
                                    <span class="sub-title">07 - Say hello</span>
                                    <h2 class="title">Any questions? Feel free <br> to contact</h2>
                                </div>
                                <div class="homeContact__content">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="homeContact__form">
                                    <form action="#">
                                        <input type="text" placeholder="Enter name*">
                                        <input type="email" placeholder="Enter mail*">
                                        <input type="number" placeholder="Enter number*">
                                        <textarea name="message" placeholder="Enter Massage*"></textarea>
                                        <button type="submit">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- contact-area-end -->

            @endsection