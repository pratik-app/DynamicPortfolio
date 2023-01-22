@extends('admin.admin_master')
@section('admin')
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit About Section</h4>
                        <!-- Always use enctype multipart/form-data when dealing with Images -->
                        <form method="post" action="{{route('about.editme')}}" enctype="multipart/form-data">
                            <!-- CSRF Token is used for active user session  -->
                            @csrf
                            <!-- NOTE: This token is used to verify the authenticated user -->

                            <input type="hidden" name="id" value="{{$aboutslide->id}}"/>
                        
                        <div class="row mb-3">
                            <label for="Title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "title" alt="Heading Title" type="text" value="{{$aboutslide->title}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ShortTitle" class="col-sm-2 col-form-label">Short Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "short_title" alt="Short Title" type="text" value="{{$aboutslide->short_title}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="about_description" class="col-sm-2 col-form-label">About Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="about_description" name = "about_description" alt="Descritption for About US" rows="5" col="50" >{{$aboutslide->about_description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="aboutbtn" class="col-sm-2 col-form-label">About Button</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "aboutme_btn" alt="Short Title" type="text" value="{{$aboutslide->aboutme_btn}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="About Experience Image" class="col-sm-2 col-form-label">About Experience Icon</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "about_exp_img" alt="About Experience Icon" type="file" id= "about_exp_img"/>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="About Image display" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded-circle avatar-xl" src="{{(!empty($aboutslide->about_exp_img))? url($aboutslide->about_exp_img):url('upload/no_image.jpg')}}" name= "about_img_disp" alt="Current Profile Image/Selected Profile Image" id="about_img_disp">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-rounded btn-primary" value="Update Slide"/></br></br>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
    </div>
</div>

<script type="text/javascript">    
$(document).ready(function(){
        $('#about_exp_img').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#about_img_disp').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>
@endsection