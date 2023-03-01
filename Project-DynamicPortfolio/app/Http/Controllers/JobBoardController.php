<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobBoardController extends Controller
{
    public function ViewAvailableJobs()
    {
        return view('frontend.job_portal.available_jobs');
    }
}
