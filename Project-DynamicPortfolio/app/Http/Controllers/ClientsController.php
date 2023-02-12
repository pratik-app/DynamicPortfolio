<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function AddNewClient(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $leadID = $request->lead_id;
            $clientName = $request->Client_Name;
            $clientEmail = $request->Client_Email;
            $clientMobile = $request->Client_Mobile;
            $clientAssignedTo = $request->client_assigned_to;
            $clientProjectName = $request->client_project_name;
            $clientProjectPrice = $request->client_project_price;
            $clientProjectDeadLine = $request->client_Project_deadLine;
            $clientAdvancePayment = $request->client_advance_payment;            
            $clientProjectNumber = $request->client_project_number;
            $outstandingAmount =  preg_replace("/\D/","",$request->client_project_price) - preg_replace("/\D/","",$request->client_advance_payment);
            Clients::insert([
                'lead_id'=>$leadID,
                'client_name'=>$clientName,
                'client_email'=> $clientEmail,
                'client_mobile'=> $clientMobile,
                'client_assignedTo'=>$clientAssignedTo,
                'client_Project_Name'=>$clientProjectName,
                'client_Project_Price'=> $clientProjectPrice,
                'client_advanced_paid_amount'=>$clientAdvancePayment,
                'client_number_of_projects'=>$clientProjectNumber,
                'client_outstanding_amount'=> $outstandingAmount,
                'client_project_deadline'=> $clientProjectDeadLine,
                'client_project_status'=>'initial Stage',
            ]);
            $notification = array(
                'message' => 'Lead Successfully Converted to Client',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
