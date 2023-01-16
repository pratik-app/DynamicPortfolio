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
                        <h4 class="card-title">Update Password</h4>
                        <!-- Creating Alert to display errors -->
                        @if(count($errors))
                        
                            @foreach ($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
                            @endforeach
                        
                        @endif
                        <!-- Always use enctype multipart/form-data when dealing with Images -->
                        <form method="post" action="{{ route('update.password')}}">
                            <!-- CSRF Token is used for active user session  -->
                        @csrf
                            <!-- NOTE: This token is used to verify the authenticated user -->
                        <div class="row mb-3">
                            <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "OldPassword" type="password" placeholder="Enter Old Password">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="New Password" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "NewUpdatedPassword" type="password" placeholder="Enter New Password">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="Re-enter New Password" class="col-sm-2 col-form-label">Re-Enter New Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name = "confirm_password" type="password" placeholder="Re-Enter New Password">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-rounded btn-primary" value="Update Password"/></br></br>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>


@endsection