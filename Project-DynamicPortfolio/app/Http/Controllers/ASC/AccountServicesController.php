<?php

namespace App\Http\Controllers\ASC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ASC\EmpRecord;
use Intervention\Image\ImageManagerStatic as Image;

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
        // Checking the User
        if(Auth::guest())
        {
            return redirect('/login');
        }
        // Getting all Data from Add new Form
        $empName = $request->empName;
        $empPostion = $request->empPosition;
        $empAddress = $request->empAddress;
        $empMobile  = $request->empMobile;
        $empEmail = $request->empEmail;
        $empType = $request->empType;
        $empTypeproof = "";
        // checking which file is selected
        switch($empType)
        {
            case "none":
                $notification = array(
                    'message' => 'Please select atleast one employeement Type',
                    'alert-type' => 'Danger'
                );
                return redirect()->back()->with($notification);
            break;
            case "FullTime":
                $empTypeproof = $request->file('FTOfferLetter');
            break;
            case "PartTime":
                $empTypeproof = $request->file('PTOfferLetter');
            break;
            case "Voluntary":
                $empTypeproof = $request->file('VoluntoryDiscloser');
            break;
            case "Contarct":
                $empTypeproof = $request->file('EmpContract');
            break;
            case "Temporary":
                $empTypeproof = $request->file('TempContract');
            break;
        }
        $empWorkAuth = $request->empAuthorization;

        $empWorkAuthproof = "";
        switch($empWorkAuth)
        {
            case "none":
                $notification = array(
                    'message' => 'Please select atleast one Authorization',
                    'alert-type' => 'Danger'
                );
                return redirect()->back()->with($notification);
            break;
            case "WorkPermit":
                $empWorkAuthproof = $request->file('WorkPermitProof');
            break;
            case "StudyPermit":
                $empWorkAuthproof = $request->file('StudyPermitProof');
            break;
            case "CoopPermit":
                $empWorkAuthproof = $request->file('CoopPermit');
            break;
            case "Citizen":
                $empWorkAuthproof = $request->file('CitizenShipProof');
            break;
        }

        $empExp = $request->empExperience;
        $empSalary = $request->allocatedSalary;
        $empstartDate = $request->startDate;
        //    Storing PDF and Image on specific Location
            $emp_contractL = hexdec(uniqid()).'.'.$empTypeproof->getClientOriginalExtension(); 
            $emp_contractL = $empTypeproof->move('upload\emp_contracts',$emp_contractL); 
            $WorkAuthName = hexdec(uniqid()).'.'.$empWorkAuthproof->getClientOriginalExtension(); 
            Image::make($empWorkAuthproof)->resize(636, 852)->save('upload/emp_work_proof/'.$WorkAuthName); 
            $saveUrl2 = 'upload/emp_work_proof/'.$WorkAuthName;
            EmpRecord::insert(
                [
                    'emp_name' => $empName,
                    'emp_position' => $empPostion,
                    'emp_address' => $empAddress,
                    'emp_mobile' => $empMobile,
                    'emp_email' => $empEmail,
                    'emp_type' => $empType,
                    'emp_letter' => $emp_contractL,
                    'emp_work_permit' =>$empWorkAuth,
                    'emp_work_proof' => $saveUrl2,
                    'emp_experience'=>$empExp,
                    'emp_salary'=>$empSalary,
                    'emp_start_date' => $empstartDate
                ]
                );
                // Creating Notification 
                $notification = array(
                    'message' => 'Data Inserted successfully',
                    'alert-type' =>'success'
                );
                // redirecting back with notification
                return redirect()->back()->with($notification);

        
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
