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
                        <h4 class="card-title">Add Staff / Update Staff</h4>
                        <!-- Always use enctype multipart/form-data when dealing with Images -->
                        <form method="post" action="{{route('accountservices.storeempdetials')}}" enctype="multipart/form-data">
                            <!-- CSRF Token is used for active user session  -->
                        @csrf
                            <!-- NOTE: This token is used to verify the authenticated user -->

                            <input type="hidden" name="id" value="#"/>
                            <div class="row mb-3">
                                <label for="Employee Name" class="col-sm-2 col-form-label">Employee Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empName" alt="Employee Name" type="text" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Employee Postion" class="col-sm-2 col-form-label">Employee Postion</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empPosition" alt="Employee Position" type="text" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Employee Address" class="col-sm-2 col-form-label">Employee Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empAddress" alt="Employee Address" type="text" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Employee Mobile" class="col-sm-2 col-form-label">Employee Mobile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empMobile" alt="Employee Mobile" type="text" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Employee Email" class="col-sm-2 col-form-label">Employee Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empEmail" alt="Employee Mobile" type="email" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Employee Type" class="col-sm-2 col-form-label">Type of Employement</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name = "empType" alt="Employee Type" id="EmpType">
                                        <option name="empType" value="none" selected>Select Employement Type</option>
                                        <option name="empType" value="FullTime">Full Time</option>
                                        <option name="empType" value="PartTime">Part Time</option>
                                        <option name="empType" value="Voluntary">Voluntary Work</option>
                                        <option name="empType" value="Contract">Contract</option>
                                        <option name="empType" value="Temporary">Temporary</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Offer Letter" class="col-sm-2 col-form-label">Upload OfferLetter</label>
                                <div class="col-sm-10">
                                    <small>Please select PDF only*</small>
                                    <input type="file" name="empLetter" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Work Authorization" class="col-sm-2 col-form-label">Work Authorization</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name = "empAuthorization" alt="Work Authorization" id="WorkAuth">
                                        <option name="empAuthorization" value="none" selected>None</option>
                                        <option name="empAuthorization" value="WorkPermit">Work Permit</option>
                                        <option name="empAuthorization" value="StudyPermit">Study Permit</option>
                                        <option name="empAuthorization" value="CoopPermit">Co-Op Work Permit</option>
                                        <option name="empAuthorization" value="Citizen">Citizen of Country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3" >
                                <label for="Work Permit Authorization" class="col-sm-2 col-form-label">Upload Proof of Work Authorization</label>
                                <div class="col-sm-10">
                                    <small>Please select image file only*</small>
                                    <input type="file" name="WorkAuth" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Employee Experience" class="col-sm-2 col-form-label">Employee Experience</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name = "empExperience" alt="Employee Status">                                        
                                        <option name="empExperience" value="LessThenOne" selected> Less Then < 1</option>
                                        <option name="empExperience" value="OneToThree">1 to 3+</option>
                                        <option name="empExperience" value="FourToFive">4 to 5+</option>
                                        <option name="empExperience" value="SixToTen">6 to 10+</option>
                                        <option name="empExperience" value="GreaterThenTen">10+</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="Allocated Salary" class="col-sm-2 col-form-label">Allocated Salary</label>
                                <div class="col-sm-10">
                                    <input type="text" name="allocatedSalary" class="form-control" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Allocated Salary" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                        <input type="text" class="form-control" name="startDate" placeholder="Select Start Date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                <input type="submit" class="btn btn-rounded btn-primary" value="Add New Employee"/></br></br>
                                </div>
                            </div>
                        </form>
                        <a href="{{route('accountservices.displayUpdatePage')}}"><button class="btn btn-warning btn-rounded">Update Employee Details</button></a>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
    </div>
</div>
<!-- hidding elements -->
<script>
    // for WorkPermit
    

    
</script>
@endsection