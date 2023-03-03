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
                            @foreach($allJobApplicants as $applicant)
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-center" style="padding:25px">!New Applicant</h4>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Applicant Name:</label>
                                            <div class="col-sm-10">
                                                {{$applicant->applicant_name}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Applicant Email:</label>
                                            <div class="col-sm-10">
                                                {{$applicant->applicant_email}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Applicant Mobile:</label>
                                            <div class="col-sm-10">
                                                {{$applicant->applicant_mobile}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Applicant applying for:</label>
                                            <div class="col-sm-10">
                                                {{$applicant->applicant_applying_for}}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Download Resume:</label>
                                            <div class="col-sm-10">
                                                <a href="{{route('companyjobs.downloadapplicantResume',['id' =>$applicant->id])}}"><i class="fas fa-file-pdf" style="font-size: xxx-large;"></i></a>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Job title" class="col-sm-2 col-form-label">Applicant Message</label>
                                            <div class="col-sm-10">
                                                {{$applicant->applicant_message}}
                                            </div>
                                        </div>
                                        
                                       
                                    </div>
                                </div>        
                            </div>
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