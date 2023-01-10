@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile Page</h4>
                        <form>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "name" type="text" placeholder="{{$editData->name}}" value="{{$editData->name}}" disabled>
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
                                <input class="form-control" name = "profile_image" type="file"/>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="selected_profile_image" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img class="rounded-circle avatar-xl" src="{{asset('backend/assets/images/users/avatar-4.jpg')}}" alt="Card image cap" >
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

@endsection