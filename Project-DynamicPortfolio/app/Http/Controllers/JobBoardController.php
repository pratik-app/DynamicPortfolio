<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOpenings;

class JobBoardController extends Controller
{
    // Creating view to display available jobs in frontend

    public function ViewAvailableJobs()
    {
        return view('frontend.job_portal.available_jobs');
    }

    // Creating view to insert new opportunity in Company

    public function NewOpportunityPage()
    {
        return view('admin.job_portal.create_new_opportunity');
    }

    // Creating Function to add new job in Database

    public function AddJob(Request $request){
        $jobTitle = $request->JobTitle;
        $jobLocation = $request->JobLocation;
        $jobType = $request->JobType;
        $jobDescription = $request->JobDescription;
        $jobPayRange = $request->JobPayRange;
        $jobapplicationDL = $request->JobApplicationDL;
        $jobpostingDate= $request->JobDate;
        $jobStatus = $request->jobstatus;

        JobOpenings::insert([
            'job_title'=>$jobTitle,
            'job_location'=> $jobLocation,
            'job_type'=>$jobType,
            'job_description'=>$jobDescription,
            'job_pay_range'=>$jobPayRange,
            'job_application_deadline'=>$jobapplicationDL,
            'job_posted_date'=>$jobpostingDate,
            'job_status'=>$jobStatus
        ]);
        $notification = array(
            'message' => 'Job Added To Job Listing!',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    // Developing Function to View all Job Postings

    public function ViewAllJobPostings()
    {
        $allJobs = JobOpenings::all();
        return view('admin.job_portal.view_all_job_postings', compact('allJobs'));
    }
}
