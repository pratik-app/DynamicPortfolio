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
                                        <a href="#"><button class="btn btn-warning"> Update Posting</button></a>
                                        <!-- Send ID with Link using route'accountservices.editEmp',['id' =>$record->id] -->
                                        <a href="#"><button class="btn btn-warning"> De-Activate Posting</button></a>
                                        <a href="#"><button class="btn btn-danger"> Delete Posting</button></a>
                                    </div>
                                </div>        
                            </div>
                            @else
                            <div class="col-4">
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
                                            <i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2">{{$job->job_status}}
                                            </div>
                                        </div>
                                        <a href="#"><button class="btn btn-danger"> Delete Posting</button></a>
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