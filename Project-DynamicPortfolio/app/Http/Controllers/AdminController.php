<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Method to destroy the session and logout the user
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // Used to fetch existing user data from Database 
    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }
    // Used to render to Edit Page where user can edit their details in database
    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        
        return view('admin.admin_profile_edit', compact('editData'));
    }
    // Used to update data in Database that user had inserted
    public function UpdateProfile(Request $request)
    {
        $id = Auth::user()->id; // fetching the existing user
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        // If profile image is selected then then below code will run
        if($request->file('profile_image')){
            $file = $request->file('profile_image'); // storing the image name in variable that is inserted in form by user
            $filename = date('YmdHi').$file->getClientOriginalName(); // adding datetime with original file name
            $file->move(public_path('upload/admin_images'),$filename); // Moving the file to upload/admin_images folder
            $data['profile_image'] = $filename; // giving the file name to $data['profile_image']
        }
        $data->save(); //Saving whatever is stored in $data to database
        // Providing Notification to user
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification); //Returning user to profile page 
    }
    // Creating new function to Change Password
    public function ChangePassword(){
        return view('admin.admin_change_password');
    }
    // Creating function to Update the password in Database
    public function UpdatePassword(Request $request){
        // Creating Variable to check whether files have a value or not all fields are mendatory
        $validateData = $request->validate([
            'OldPassword' => 'required',
            'NewUpdatedPassword'=> 'required',
            're-enterNewPassword'=>'required|same:NewUpdatedPassword',
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->OldPassword, $hashedPassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->NewUpdatedPassword);
            $users->save();
            session()->flush('message','Password Updated Successfully');
             return redirect('login');
        }else
        {
            session()->flush('message', 'Old Password is not Match');
            return redirect()->back();
        }

    }
}
