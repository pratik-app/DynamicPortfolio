<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\LeadStat;
use Symfony\Component\Console\Input\Input;

class ClientController extends Controller
{
    public function getClientContact(Request $request){
        
        $clientEmail = $request->client_email;
        
        if(Contact::where('client_Email', '=', $clientEmail)->exists())
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
                'client_fullName'=>$request->fullName,
                'client_Email'=>$request->client_email,
                'client_Mobile'=> $request->client_mobile,
                'client_Message'=> $request->client_message,
            ]);
            LeadStat::insert([
                'lead_status' =>'1',
                'lead_assigned_to'=>'Unassigned',
                'client_Email'=>$request->client_email
            ]);
            
            $notification = array(
                'message' => 'Your Email Sent Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
        
    }
    public function getallClients()
    {
        $clients = Contact::all();
        return view('admin.client_contact.all_client_contacts', compact('clients'));
    }
    public function viewEmail(Request $request)
    {
        $id = $request->id;
        $clientId = Contact::find($id);
        Contact::findOrFail($id)->update([
            'status'=>'1'
        ]);
        return view('admin.client_contact.display_email_message',compact('clientId'));
    }
    
}
