@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-6" style="display: flex; flex-direction:row; flex-wrap:wrap; flex-shrink:3; padding:20px;">
                <!-- Simple card -->
                <div class="card" style="display: flex; flex-direction:row; flex-wrap:wrap; flex-shrink:3; padding:20px;">
                    <img class="rounded-circle avatar-xl" src="{{(!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg')}}" alt="Card image cap" >
                    <div class="card-body">
                        <h4 class="card-title">{{$adminData->name}}</h4>
                        <p class="card-text">{{$adminData->email}}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <a href="{{ route('edit.profile')}}" class="btn btn-primary btn-rounded waves-effect waves-light"> Edit Profile</a>
                    </div>
                </div>

            </div><!-- end col -->
        </div>
    </div>
</div>

@endsection