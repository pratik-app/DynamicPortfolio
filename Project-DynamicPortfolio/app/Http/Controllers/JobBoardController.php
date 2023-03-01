<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
