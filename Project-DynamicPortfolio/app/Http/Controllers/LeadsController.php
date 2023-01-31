<?php

namespace App\Http\Controllers;

use App\Models\LeadStat;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    
    public function updateStatus(Request $request){
        $client_currentEmail = $request->client_Email;
        $id = LeadStat::where('client_Email', '=',$client_currentEmail)->first()->id;
        LeadStat::find($id)->update([
            'client_id' => $request->client_id,
            'lead_status' => $request->client_status,
        ]);
        $notification = array(
            'message' => 'Updated successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function updateAction(Request $request){
        $client_currentEmail = $request->client_Email;
        $id = LeadStat::where('client_Email', '=',$client_currentEmail)->first()->id;
        LeadStat::find($id)->update([
            'lead_action' => $request->lead_action,
        ]);
        $notification = array(
            'message' => 'Updated successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function assignLead(Request $request)
    {
        $client_currentEmail = $request->client_Email;
        $id = LeadStat::where('client_Email', '=',$client_currentEmail)->first()->id;
        LeadStat::find($id)->update([
            'lead_assigned_to' => $request->available_user,
        ]);
        $notification = array(
            'message' => 'Updated successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
