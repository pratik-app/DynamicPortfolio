<?php

namespace App\Http\Controllers\ASC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ASC\EmpRecord;

class AccountServicesController extends Controller
{
    public function GetAllEmpData(){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        return view('admin.account_services.employee_dashboard');
    }
    public function AddNewEMP(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        // $empName = $request;
        // $empPostion = $request;
        // $empAddress = $request;
        // $empMobile  = $request;
        // $empEmail = $request;
        // $empType = $request;
        // $empWorkAuth = $request;
        // $empExp = $request;
        // $empSalary = $request;
        // $empstartDate = $request;
        // EmpRecord::insert([
        //     'client_fullName'=>$request->fullName,
        //     'client_Email'=>$request->client_email,
        //     'client_Mobile'=> $request->client_mobile,
        //     'client_Message'=> $request->client_message,
        // ]);

        
    }
    public function AddEmployees(){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        return view('admin.account_services.addNewEmployees');
    }
    public function ManageTeams(){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        return view('admin.account_services.manageTeams');
    }
}
