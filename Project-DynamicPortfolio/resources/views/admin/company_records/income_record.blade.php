@extends('admin.admin_master')
@section('admin')
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center" style="padding:25px">Create New Job opportunity</h4>
                        <form action="#" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="Job title" class="col-sm-2 col-form-label">Job Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "JobTitle" alt="Enter Job Title" type="text" id="JobTitle" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Job Location" class="col-sm-2 col-form-label">Job Location</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name = "JobLocation" alt="Job Location" id="JobLocation" required>
                                        <option name="JobLocation" value="">Please Select Location</option>
                                        <option name="JobLocation" value="Inoffice">At Office Address</option>
                                        <option name="JobLocation" value="Remote"> Remote In Canada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Job Type" class="col-sm-2 col-form-label">Job Type</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name = "JobType" alt="Job Type" id="JobType" required>
                                        <option name="JobType" value="">Please Select Job Type</option>
                                        <option name="JobType" value="FullTime">Full Time</option>
                                        <option name="JobType" value="PartTime">Part Time</option>
                                        <option name="JobType" value="VoluntaryWork">Voluntary Work</option>
                                        <option name="JobType" value="Contract">Contract</option>
                                        <option name="JobType" value="Temporary">Temporary</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Job Description" class="col-sm-2 col-form-label">Job Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="JobDescription" name="JobDescription" alt="Job Description" rows="5" col="50" placeholder="Write Job Description Here">
                                    </textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="JobPayRange" class="col-sm-2 col-form-label">Job Pay Range</label>
                                <div class="col-sm-10">
                                    <small style="color:red">*Describe Yearly Salary Range for Job</small>
                                    <input class="form-control" name = "JobPayRange" id="JobPayRange" alt="Salaray Range Yearly" type="text" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Job Application Dead Line" class="col-sm-2 col-form-label">Job Application Dead Line</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name ="JobApplicationDL" id="JobApplicationDL" alt="Job Application Dead Line" type="date" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Today Date" class="col-sm-2 col-form-label">Today Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "JobDate" id="JobDate" alt="Today's Date" type="date" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Job Status" class="col-sm-2 col-form-label">Job Status</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name = "jobstatus" alt="Job Status" type="text" value="Active" readonly/>
                                </div>
                            </div>
                            <input type="submit" class="form-control btn btn-primary" name="submit" value="Post Job on Portal"/>

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
            
        </div> <!-- end row -->
    </div>
</div>

@endsection