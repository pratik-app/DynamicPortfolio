@extends('admin.admin_master')
@section('admin')
<!-- Jquery 3.6 -->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Staff</h4>
                        <!-- Always use enctype multipart/form-data when dealing with Images -->
                        <form method="post" action="#">
                            <!-- CSRF Token is used for active user session  -->
                        @csrf
                            <!-- NOTE: This token is used to verify the authenticated user -->

                            <input type="hidden" name="id" value="#"/>
                            <div class="row mb-3">
                                <label for="Portfolio Image" class="col-sm-2 col-form-label">Employee Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empName" alt="Employee Name" type="text"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Portfolio Image" class="col-sm-2 col-form-label">Employee Postion</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empPosition" alt="Employee Position" type="text"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Portfolio Image" class="col-sm-2 col-form-label">Employee Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empAddress" alt="Employee Address" type="text"/>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-rounded btn-primary" value="Update Slide"/></br></br>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
    </div>
</div>

@endsection