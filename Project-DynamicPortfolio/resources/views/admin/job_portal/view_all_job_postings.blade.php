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
                        <h4 class="card-title" style="padding:25px">All Job Postings</h4>
                        <div class="row">
                            @foreach($allJobs as $job)
                            @if($job->job_status == "Active")
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-center" style="padding:25px">!New Job Posting</h4>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job ID:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_id}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Title:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_title}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Location:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_location}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Type:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_type}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Description:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_description}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Pay Range:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_pay_range}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Appliocation Dead Line:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_application_deadline}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Postead ON:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_posted_date}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Status:</label>
                                            <div class="col-sm-10">
                                            <i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>{{$job->job_status}}
                                            </div>
                                        </div>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#UpdatePosting-{{$job->job_id}}"><button class="btn btn-warning"> Update Posting</button></a>
                                        <a href="{{route('companyjobs.deactivateJob',['job_id'=> $job->job_id])}}"><button class="btn btn-warning"> De-Activate Posting</button></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#ConfirmDelete-{{$job->job_id}}"><button class="btn btn-danger"> Delete Posting</button></a>
                                        <div id="ConfirmDelete-{{$job->job_id}}"class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Delete Posting {{$job->job_title}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <h5>Are you sure to delete this Job Posting?</h5>
                                                                        <h6 style="color:red">This can't be undone once deleted it's Hard Delete!</h6>
                                                                        <h6 style="color:red">It's not expired Yet!</h6>
                                                                    </div>
                                                                </div>
                                                                <a href="{{route('companyjobs.deleteJobPosting',['job_id'=> $job->job_id])}}"><button class="btn btn-danger" type="button" name="deletebtn">Yes Delete Job Posting</button></a>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                        </div>
                                        <div id="UpdatePosting-{{$job->job_id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Update Posting {{$job->job_title}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('companyjobs.UpdateJobPosting')}}" method="post">
                                                                <!-- CSRF Token is used for active user session  -->
                                                                @csrf
                                                                <!-- NOTE: This token is used to verify the authenticated user -->
                                                                <div class="row mb-3">
                                                                    <label for="Job title" class="col-sm-2 col-form-label">Job ID</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" name = "JobID" alt="Job ID" type="text" value="{{$job->job_id}}" readonly/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Job title" class="col-sm-2 col-form-label">Job Title</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" name = "JobTitle" alt="Enter Job Title" type="text" value="{{$job->job_title}}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Job Location" class="col-sm-2 col-form-label">Job Location</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-select" name = "JobLocation" alt="Job Location" >
                                                                            <option name="JobLocation" value="{{$job->job_location}}" selected>{{$job->job_location}}</option>
                                                                            <option name="JobLocation" value="Inoffice">At Office Address</option>
                                                                            <option name="JobLocation" value="Remote"> Remote In Canada</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Job Type" class="col-sm-2 col-form-label">Job Type</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-select" name = "JobType" alt="Job Type">
                                                                            <option name="JobType" value="{{$job->job_type}}" Selected>{{$job->job_type}}</option>
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
                                                                        <textarea class="form-control" id="JobDescription" name="JobDescription" alt="Job Description" rows="5" col="50">
                                                                            {{$job->job_description}}
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="JobPayRange" class="col-sm-2 col-form-label">Job Pay Range</label>
                                                                    <div class="col-sm-10">
                                                                        <small style="color:red">*Describe Yearly Salary Range for Job</small>
                                                                        <input class="form-control" name = "JobPayRange" id="JobPayRange" alt="Salaray Range Yearly" type="text" value="{{$job->job_pay_range}}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Job Application Dead Line" class="col-sm-2 col-form-label">Job Application Dead Line</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" name ="JobApplicationDL" alt="Job Application Dead Line" type="text" value="{{$job->job_application_deadline}}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Today Date" class="col-sm-2 col-form-label">Posted Date</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" name = "JobDate" id="JobDate" alt="Today's Date" type="text" value="{{$job->job_posted_date}}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Job Status" class="col-sm-2 col-form-label">Job Status</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" name = "jobstatus" alt="Job Status" type="text" value="Active" readonly/>
                                                                    </div>
                                                                </div>
                                                                <input type="submit" class="form-control btn btn-primary" name="submit" value="Update Job Posting"/>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <small style="color:red">*This Update will Re-Post The Job</small>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                    </div>
                                </div>        
                            </div>
                            @else
                            <div class="col-3">
                            <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-center" style="padding:25px">!Old Job Posting</h4>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job ID:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_id}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Title:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_title}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Location:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_location}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Type:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_type}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Description:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_description}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Pay Range:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_pay_range}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Appliocation Dead Line:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_application_deadline}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Postead ON:</label>
                                            <div class="col-sm-10">
                                                {{$job->job_posted_date}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Job Status:</label>
                                            <div class="col-sm-10">
                                            <i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>{{$job->job_status}}
                                            </div>
                                        </div>
                                        <a href="{{route('companyjobs.deleteJobPosting',['job_id'=> $job->job_id])}}"><button class="btn btn-danger"> Delete Posting</button></a>
                                    </div>
                                </div>         
                            </div>
                            @endif
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div> <!-- end col -->
            
            </div> 
        </div> <!-- end row -->
    </div>
</div>
<script>
    
</script>

@endsection