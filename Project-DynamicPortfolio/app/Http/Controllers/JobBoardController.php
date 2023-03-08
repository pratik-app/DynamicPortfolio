<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOpenings;
use App\Models\JobApplicants;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;


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
        if(Auth::guest())
        {
            return redirect('/login');
        }
        return view('admin.job_portal.create_new_opportunity');
    }

    // Creating Function to add new job in Database

    public function AddJob(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
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

    // Creating Function to Update Job Posting
    
    public function UpdateJobPosting(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $job_id = $request->JobID;
        JobOpenings::where('job_id','=',$job_id)->update(
            [
                'job_title'=>$request->JobTitle,
                'job_location'=> $request->JobLocation,
                'job_type'=>$request->JobType,
                'job_description'=>$request->JobDescription,
                'job_pay_range'=>$request->JobPayRange,
                'job_application_deadline'=>$request->JobApplicationDL,
                'job_posted_date'=>$request->JobDate,
                'job_status'=>$request->jobstatus
            ]
        );
        $notification = array(
            'message' => 'Job Updated and Posted!',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
        
        
    }
    
    // Creating function to Get Job Application from Frontend

    public function GetJobApplication(Request $request)
    {
        $applicant_Name = $request->applicant_name;
        $applicant_Email = $request->applicant_email;
        $applicant_Mobile = $request->applicant_mobile;
        $applicant_application_for = $request->applicationfor;
        $applicant_resume = $request->file('applicant_resume');
        $applicant_message = $request->applicant_message;
        $get_resume_name = hexdec(uniqid()).'.'.$applicant_resume->getClientOriginalExtension(); 
        $store_resume = $applicant_resume->move('upload\job_applicants',$get_resume_name);
        JobApplicants::insert(
            [
                'applicant_name' => $applicant_Name,
                'applicant_email' => $applicant_Email,
                'applicant_mobile'=> $applicant_Mobile,
                'applicant_applying_for' =>$applicant_application_for,
                'applicant_resume'=>$store_resume,
                'applicant_message'=>$applicant_message
            ]
            );
            $notification = array(
                'message' => 'Application Submitted Successfully!',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);

    }
    
    // Creating funtion that download resume uploaded by user

    public function DownloadApplicantResume(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $applicant_id = $request->id;
            $applicant = JobApplicants::findOrfail($applicant_id)->first();
            
            return redirect($applicant->applicant_resume);

            
            
        } 
    }

    // Developing Function to View all Job Postings

    public function ViewAllJobPostings()
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $allJobs = JobOpenings::all();
        return view('admin.job_portal.view_all_job_postings', compact('allJobs'));
    }

    // Creating function to deactivate the Job

    public function DeactivateJobPosting(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $id= $request->job_id;
        JobOpenings::where('job_id','=',$id)->update(
            [
                'job_status'=>'Deactivated'
            ]
            );
            $notification = array(
                'message' => 'Job Deactivated Successfully!',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
    }

    // Creating function to Delete Job Posting

    public function DeleteJobPosting(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $id = $request->job_id;
        JobOpenings::where('job_id','=',$id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully!',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    // Creating function to view all Job Applications received from FrontEnd

    public function ViewJobApplications()
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $allJobApplicants = JobApplicants::all();
        return view('admin.job_portal.view_all_Job_applicants', compact('allJobApplicants'));
    }
}
