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
                        <h4 class="card-title">Edit Home and Navigation Bar</h4>
                        <!-- Always use enctype multipart/form-data when dealing with Images -->
                        <form method="post" action="{{route('update.slider')}}" enctype="multipart/form-data">
                            <!-- CSRF Token is used for active user session  -->
                        @csrf
                            <!-- NOTE: This token is used to verify the authenticated user -->

                            <input type="hidden" name="id" value="{{ $homeslide->id}}"/>
                        <div class="row mb-3">
                            <label for="Portfolio Image" class="col-sm-2 col-form-label">Portfolio Logo</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "portfolio_Logo" alt="Select Image" type="file" id= "portfolio_Logo"/>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="showSelectedImg" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded-circle avatar-xl" src="{{(!empty($homeslide->portfolio_img))? url($homeslide->portfolio_img):url('upload/no_image.jpg')}}" name= "portfolioImg" alt="Current Profile Image/Selected Profile Image" id="portfolioImg">
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="NavTab1" class="col-sm-2 col-form-label">Nav Tab 1</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "navTab1" alt="Navigation Tab 1" type="text" value="{{$homeslide->nav_tab1}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="NavTab2" class="col-sm-2 col-form-label">Nav Tab 2</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "navTab2" alt="Navigation Tab 2" type="text" value="{{$homeslide->nav_tab2}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="NavTab3" class="col-sm-2 col-form-label">Nav Tab 3</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "navTab3" alt="Navigation Tab 3" type="text" value="{{$homeslide->nav_tab3}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="NavTab4" class="col-sm-2 col-form-label">Nav Tab 4</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "navTab4" alt="Navigation Tab 4" type="text" value="{{$homeslide->nav_tab4}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="NavTab5" class="col-sm-2 col-form-label">Nav Tab 5</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "navTab5" alt="Navigation Tab 5" type="text" value="{{$homeslide->nav_tab5}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="NavTab6" class="col-sm-2 col-form-label">Nav Tab 6</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "navTab6" alt="Navigation Tab 6" type="text" value="{{$homeslide->nav_tab6}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="NavTab7" class="col-sm-2 col-form-label">Nav Tab 7</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "navTab7" alt="Navigation Tab 7" type="text" value="{{$homeslide->nav_tab7}}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="reCallbtn" class="col-sm-2 col-form-label">Re Call Button</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "reCallbtn" alt="Navigation Tab 7" type="text" value="{{$homeslide->reCallbtn}}">
                            </div>
                        </div>
                        <!-- end row -->
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
                                <img class="rounded-circle avatar-xl" src="{{(!empty($homeslide->home_slide))? url($homeslide->home_slide):url('upload/no_image.jpg')}}" name= "currentImage" alt="Current Profile Image/Selected Profile Image" id="showSelectedImg">
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
        $('#portfolio_Logo').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#portfolioImg').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>
@endsection