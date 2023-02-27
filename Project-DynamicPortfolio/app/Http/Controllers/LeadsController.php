<?php

namespace App\Http\Controllers;

use App\Models\LeadStat;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadsController extends Controller
{
    // Update Lead status 
    
    public function updateStatus(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $lead_currentEmail = $request->lead_Email;
        $id = LeadStat::where('lead_Email', '=',$lead_currentEmail)->first()->id;
        LeadStat::find($id)->update([
            'lead_id' => $request->lead_id,
            'lead_status' => $request->lead_status,
        ]);
        $notification = array(
            'message' => 'Updated successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    // Update Lead Action

    public function updateAction(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $lead_currentEmail = $request->lead_Email;
        $id = LeadStat::where('lead_Email', '=',$lead_currentEmail)->first()->id;
        LeadStat::find($id)->update([
            'lead_action' => $request->lead_action,
        ]);
        $notification = array(
            'message' => 'Updated successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    // Assgin Lead to Available Sales Person

    public function assignLead(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $lead_currentEmail = $request->lead_Email;
        $id = LeadStat::where('lead_Email', '=',$lead_currentEmail)->first()->id;
        LeadStat::find($id)->update([
            'lead_assigned_to' => $request->available_user,
        ]);
        $notification = array(
            'message' => 'Updated successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    // Geting Lead from Frontend and Storing it in DB

    public function getleadContact(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        
        $leadEmail = $request->lead_email;
        
        if(Contact::where('lead_Email', '=', $leadEmail)->exists())
        {
            $notification = array(
                'message' => 'Email Already Exists',
                'alert-type' =>'Danger'
            );
            return redirect()->back()->with($notification);
        }
        else
        {
            Contact::insert([
                'lead_fullName'=>$request->fullName,
                'lead_Email'=>$request->lead_email,
                'lead_Mobile'=> $request->lead_mobile,
                'lead_Message'=> $request->lead_message,
            ]);
            LeadStat::insert([
                'lead_status' =>'1',
                'lead_assigned_to'=>'Unassigned',
                'lead_Email'=>$request->lead_email
            ]);
            
            $notification = array(
                'message' => 'Your Email Sent Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
        
    }

    // Getting all Leads (Represents Inbox)

    public function getallleads()
    {
        $leads = Contact::all();
        if(Auth::guest())
        {
            return redirect('/login');
        }
        return view('admin.lead_contact.all_lead_contacts',compact('leads'));
    }

    // View Particular Message Generated from Frontend

    public function viewEmail(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }

        $id = $request->id;
        // echo $id;
        $leadId = Contact::find($id);
        // echo "This is lead ID".$leadId;
        Contact::findOrFail($leadId['id'])->update([
            'status'=>'1'
        ]);
        // echo "Data Updated Successfully";
        return view('admin.lead_contact.display_email_message',compact('leadId'));
    }

    // Delete functionality to Delete Lead if lead have no project
    
    public function DeleteLead(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $id = $request->id;
        $leadId = Contact::find($id);
        Contact::findOrFail($id)->delete();
        LeadStat::where('lead_Email', '=', $leadId['lead_Email'])->delete();
        $notification = array(
            'message' => 'Lead Deleted Successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
