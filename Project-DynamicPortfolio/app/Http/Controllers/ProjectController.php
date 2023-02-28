<?php

namespace App\Http\Controllers;
use App\Models\Projects;
use Illuminate\Support\Facades\Auth;
use App\Models\Clients;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{
    //Creating function to Create Project once Assigned to Developers Team
    public function CreateProject(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $client_id = $request->ProjectName;
            $clientData = Clients::where('client_id','=',$client_id)->first();
            $projectName = $clientData['client_Project_Name'];
            $projectPrice = $clientData['client_Project_Price'];
            $projectAdvancePaidAmount = $clientData['client_advanced_paid_amount'];
            $projectDeadLine = $clientData['client_project_deadline'];
            $projectNumber = $clientData['client_number_of_projects'];
            $lead_id = $clientData['lead_id'];
            $clientName = $clientData['client_name'];
            $clientEmail = $clientData['client_email'];
            $clientMobile = $clientData['client_mobile'];
            $clientOutStandingAmount = $clientData['client_outstanding_amount'];
            $projectAssignedTo = $clientData['client_assignedTo'];
            Projects::insert([
                'projectName' =>$projectName,
                'projectPrice'=>$projectPrice,
                'projectAdvancePaymentAmount'=> $projectAdvancePaidAmount,
                'projectNumber'=> $projectNumber,
                'client_outstandingAmount'=> $clientOutStandingAmount,
                'projectDeadLine'=> $projectDeadLine,
                'clientName'=>$clientName,
                'clientEmail'=>$clientEmail,
                'clientMobile'=>$clientMobile,
                'projectAssignedTo'=>$projectAssignedTo,
                'client_ID'=>$client_id,
                'leadID'=>$lead_id,
            ]);
            $notification = array(
                'message' => 'Project Assigned to Developers Team Successfully!',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
