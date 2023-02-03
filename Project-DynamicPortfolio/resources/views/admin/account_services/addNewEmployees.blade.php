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
                        <h4 class="card-title">Add Staff</h4>
                        <!-- Always use enctype multipart/form-data when dealing with Images -->
                        <form method="post" action="#">
                            <!-- CSRF Token is used for active user session  -->
                        @csrf
                            <!-- NOTE: This token is used to verify the authenticated user -->

                            <input type="hidden" name="id" value="#"/>
                            <div class="row mb-3">
                                <label for="Employee Name" class="col-sm-2 col-form-label">Employee Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empName" alt="Employee Name" type="text"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Employee Postion" class="col-sm-2 col-form-label">Employee Postion</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empPosition" alt="Employee Position" type="text"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Employee Address" class="col-sm-2 col-form-label">Employee Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empAddress" alt="Employee Address" type="text"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Employee Mobile" class="col-sm-2 col-form-label">Employee Mobile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empMobile" alt="Employee Mobile" type="text"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Employee Email" class="col-sm-2 col-form-label">Employee Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "empMobile" alt="Employee Mobile" type="email"/>
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
                            <div class="row mb-3" id = "FullTimeEmp">
                                <label for="Offer Letter" class="col-sm-2 col-form-label">Upload OfferLetter</label>
                                <div class="col-sm-10">
                                    <input type="file" name="FTOfferLetter" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3" id = "PartTimeEmp">
                                <label for="Offer Letter" class="col-sm-2 col-form-label">Upload OfferLetter</label>
                                <div class="col-sm-10">
                                    <input type="file" name="PTOfferLetter" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3" id = "VoluntaryEmp">
                                <label for="Voluntary Discloser" class="col-sm-2 col-form-label">Upload Voluntary Discloser</label>
                                <div class="col-sm-10">
                                    <input type="file" name="VoluntaryDiscloser" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3" id = "ContractEmp">
                                <label for="Employement Contract" class="col-sm-2 col-form-label">Upload Contract</label>
                                <div class="col-sm-10">
                                    <input type="file" name="EmpContract" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3" id = "TempEmp">
                                <label for="Temporary Contract" class="col-sm-2 col-form-label">Upload Temporary Contract</label>
                                <div class="col-sm-10">
                                    <input type="file" name="TempContract" class="form-control"/>
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
                            <div class="row mb-3" id = "WorkPermitSelection">
                                <label for="Work Permit Authorization" class="col-sm-2 col-form-label">Upload Proof of Work Authorization</label>
                                <div class="col-sm-10">
                                    <input type="file" name="WorkPermitProof" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3" id = "StudyPermitSelection">
                                <label for="Study Permit Authorization" class="col-sm-2 col-form-label">Upload Proof of Study Authorization</label>
                                <div class="col-sm-10">
                                    <input type="file" name="StudyPermitProof" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3" id = "CoopPermitSelection">
                                <label for="Coop Permit Authorization" class="col-sm-2 col-form-label">Upload Proof of Coop Permit</label>
                                <div class="col-sm-10">
                                    <input type="file" name="CoopPermitProof" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3" id = "CitizenPermitSelection">
                                <label for="Citizen Authorization" class="col-sm-2 col-form-label">Upload Proof of Citizenship</label>
                                <div class="col-sm-10">
                                    <input type="file" name="CitizenShipProof" class="form-control"/>
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
                                    <input type="text" name="allocatedSalary" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Allocated Salary" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                        <input type="text" class="form-control" name="startDate" placeholder="Select Start Date" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                <input type="submit" class="btn btn-rounded btn-primary" value="Update Slide"/></br></br>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        
    </div>
</div>
<!-- hidding elements -->
<script>
    // for WorkPermit
    $("#WorkPermitSelection").hide();
    $("#StudyPermitSelection").hide();
    $("#CoopPermitSelection").hide();
    $("#CitizenPermitSelection").hide();
    $("#WorkAuth").change(function(){
        switch($("#WorkAuth").val())
        {
            case "none":
                alert("Employee is not Authorized to Work")
                $("#WorkPermitSelection").hide();
                $("#StudyPermitSelection").hide();
                $("#CoopPermitSelection").hide();
                $("#CitizenPermitSelection").hide();
                break;
            case "StudyPermit":
                $("#StudyPermitSelection").show()
                $("#WorkPermitSelection").hide();
                $("#CoopPermitSelection").hide();
                $("#CitizenPermitSelection").hide();
                break;
            case "WorkPermit":
                $("#WorkPermitSelection").show()
                $("#StudyPermitSelection").hide();
                $("#CoopPermitSelection").hide();
                $("#CitizenPermitSelection").hide();
                break;
            case "CoopPermit":
                $("#CoopPermitSelection").show();
                $("#WorkPermitSelection").hide();
                $("#StudyPermitSelection").hide();
                $("#CitizenPermitSelection").hide();
                break;
            case "Citizen":
                $("#CitizenPermitSelection").show();
                $("#WorkPermitSelection").hide();
                $("#StudyPermitSelection").hide();
                $("#CoopPermitSelection").hide();
                break;
            case Default:
                $("#WorkPermitSelection").hide();
                $("#StudyPermitSelection").hide();
                $("#CoopPermitSelection").hide();
                $("#CitizenPermitSelection").hide();
                break;
                
        }
        
        
    })
    // for Storing Offere letter or any employement related Document
    $("#FullTimeEmp").hide();
    $("#PartTimeEmp").hide();
    $("#VoluntaryEmp").hide();
    $("#ContractEmp").hide();
    $("#TempEmp").hide();
    $("#EmpType").change(function(){
        switch($("#EmpType").val())
        {
            case "none":
                $("#FullTimeEmp").hide();
                $("#PartTimeEmp").hide();
                $("#VoluntaryEmp").hide();
                $("#ContractEmp").hide();
                $("#TempEmp").hide();
                break;
            case "FullTime":
                $("#FullTimeEmp").show();
                $("#PartTimeEmp").hide();
                $("#VoluntaryEmp").hide();
                $("#ContractEmp").hide();
                $("#TempEmp").hide();
                break;
            case "PartTime":
                $("#FullTimeEmp").hide();
                $("#PartTimeEmp").show();
                $("#VoluntaryEmp").hide();
                $("#ContractEmp").hide();
                $("#TempEmp").hide();
                break;
            case "Voluntary":
                $("#FullTimeEmp").hide();
                $("#PartTimeEmp").hide();
                $("#VoluntaryEmp").show();
                $("#ContractEmp").hide();
                $("#TempEmp").hide();
                break;
            case "Contract":
                $("#FullTimeEmp").hide();
                $("#PartTimeEmp").hide();
                $("#VoluntaryEmp").hide();
                $("#ContractEmp").show();
                $("#TempEmp").hide();
                break;
            case "Temporary":
                $("#FullTimeEmp").hide();
                $("#PartTimeEmp").hide();
                $("#VoluntaryEmp").hide();
                $("#ContractEmp").hide();
                $("#TempEmp").show();
                break;
            case Default:
                $("#FullTimeEmp").hide();
                $("#PartTimeEmp").hide();
                $("#VoluntaryEmp").hide();
                $("#ContractEmp").hide();
                $("#TempEmp").hide();
                break;
                
        }
        
        
    })
    

    
</script>
@endsection