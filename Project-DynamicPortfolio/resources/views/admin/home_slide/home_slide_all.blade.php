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
                        <h4 class="card-title">Home Slide Page</h4>
                        <!-- Always use enctype multipart/form-data when dealing with Images -->
                        <form method="post" action="{{route('store.profile')}}" enctype="multipart/form-data">
                            <!-- CSRF Token is used for active user session  -->
                        @csrf
                            <!-- NOTE: This token is used to verify the authenticated user -->
                        <div class="row mb-3">
                            <label for="Title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "title" alt="Heading Title" type="text" value="{{$homeslide->title}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="ShortTitle" class="col-sm-2 col-form-label">Short Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "short_title" alt="Sub Heading" type="text" value="{{$homeslide->short_title}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="Video Url" class="col-sm-2 col-form-label">Video URL</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "video_url" alt="Video URL" type="text" value="{{$homeslide->video_url}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="Banner Image" class="col-sm-2 col-form-label">Banner Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "home_slide" alt="Select Image" type="file" id= "home_slide"/>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="showSelectedImg" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded-circle avatar-xl" src="{{(!empty($homeslide->home_slide))? url('upload/home_slide/'.$homeslide->home_slide):url('upload/no_image.jpg')}}" name= "currentImage" alt="Current Profile Image/Selected Profile Image" id="showSelectedImg">
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
        $('#home_slide').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showSelectedImg').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>
@endsection