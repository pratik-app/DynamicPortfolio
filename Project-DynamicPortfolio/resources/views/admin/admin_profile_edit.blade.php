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
                        <h4 class="card-title">Edit Profile Page</h4>
                        <!-- Always use enctype multipart/form-data when dealing with Images -->
                        <form method="post" action="{{route('store.profile')}}" enctype="multipart/form-data">
                            <!-- CSRF Token is used for active user session  -->
                        @csrf
                            <!-- NOTE: This token is used to verify the authenticated user -->
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "name" type="text" placeholder="{{$editData->name}}" value="{{$editData->name}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "email" type="email" placeholder="{{$editData->email}}" value="{{$editData->email}}">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="profileImage" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "profile_image" alt="Select Profile Image" type="file" id= "profile_image"/>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="showSelectedImg" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded-circle avatar-xl" src="{{(!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg')}}" name= "currentImage" alt="Current Profile Image/Selected Profile Image" id="showSelectedImg">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-rounded btn-primary" value="Update Profile"/>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">    
$(document).ready(function(){
        $('#profile_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showSelectedImg').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>
@endsection