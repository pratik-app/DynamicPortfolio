<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\LeadStat;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class ClientController extends Controller
{
    public function getClientContact(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        
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
        // $clients = Contact::all();
        if(Auth::guest())
        {
            return redirect('/login');
        }
        return view('admin.client_contact.all_client_contacts');
    }
    public function viewEmail(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }

        $id = $request->id;
        // echo $id;
        $clientId = Contact::find($id);
        // echo "This is Client ID".$clientId;
        Contact::findOrFail($clientId['id'])->update([
            'status'=>'1'
        ]);
        // echo "Data Updated Successfully";
        return view('admin.client_contact.display_email_message',compact('clientId'));
    }
    public function DeleteLead(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $id = $request->id;
        $clientId = Contact::find($id);
        Contact::findOrFail($id)->delete();
        LeadStat::where('client_Email', '=', $clientId['client_Email'])->delete();
        $notification = array(
            'message' => 'Lead Deleted Successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
