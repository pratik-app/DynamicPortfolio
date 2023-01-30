<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ClientController extends Controller
{
    public function getClientContact(Request $request){
        
        Contact::insert([
            'client_fullName'=>$request->fullName,
            'client_Email'=>$request->client_email,
            'client_Mobile'=> $request->client_mobile,
            'client_Message'=> $request->client_message,
        ]);
        $notification = array(
            'message' => 'Your Email is Sent Successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
