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
    public function EditEmp(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $empID =  $request->id;
        $empDetails = EmpRecord::findOrFail($empID);
        return view('admin.account_services.editEmployees',compact('empDetails'));
    }
    public function UpdateEmployee(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        if($request->file('empLetter'))
        {
            // Getting all Data from Add new Form
            $empid = $request->id;
            $empName = $request->empName;
            $empPostion = $request->empPosition;
            $empAddress = $request->empAddress;
            $empMobile  = $request->empMobile;
            $empEmail = $request->empEmail;
            $empType = $request->empType;
            $empWorkAuth = $request->empAuthorization;
            $empExp = $request->empExperience;
            $empSalary = $request->allocatedSalary;
            $empstartDate = $request->startDate;
            // checking which file is selected
                $empTypeproof = $request->file('empLetter');
                //    Storing PDF and Image on specific Location
                $emp_contractL = hexdec(uniqid()).'.'.$empTypeproof->getClientOriginalExtension(); 
                $emp_contractL = $empTypeproof->move('upload\emp_contracts',$emp_contractL); 
                EmpRecord::findOrFail($empid)->update(
                    [
                        'emp_name' => $empName,
                        'emp_position' => $empPostion,
                        'emp_address' => $empAddress,
                        'emp_mobile' => $empMobile,
                        'emp_email' => $empEmail,
                        'emp_type' => $empType,
                        'emp_letter' => $emp_contractL,
                        'emp_work_permit' =>$empWorkAuth,
                        'emp_experience'=>$empExp,
                        'emp_salary'=>$empSalary,
                        'emp_start_date' => $empstartDate
                    ]
                    );
                    // Creating Notification 
                    $notification = array(
                        'message' => 'Data Update With Offer Letter successfully',
                        'alert-type' =>'success'
                    );
                    // redirecting back with notification
                    return redirect('accountServices/viewUpdatePage')->with($notification);
                }
        elseif($request->file('WorkAuth'))
        {
        // Getting all Data from Add new Form
            $empid = $request->id;
            $empName = $request->empName;
            $empPostion = $request->empPosition;
            $empAddress = $request->empAddress;
            $empMobile  = $request->empMobile;
            $empEmail = $request->empEmail;
            $empType = $request->empType;
            $empWorkAuth = $request->empAuthorization;
            $empExp = $request->empExperience;
            $empSalary = $request->allocatedSalary;
            $empstartDate = $request->startDate;
            // checking which file is selected
            
                $empWorkAuthproof = $request->file('WorkAuth');
                //    Storing PDF and Image on specific Location
                $WorkAuthName = hexdec(uniqid()).'.'.$empWorkAuthproof->getClientOriginalExtension(); 
                Image::make($empWorkAuthproof)->resize(636, 852)->save('upload/emp_work_proof/'.$WorkAuthName); 
                $saveUrl2 = 'upload/emp_work_proof/'.$WorkAuthName;
                EmpRecord::findOrFail($empid)->update(
                    [
                        'emp_name' => $empName,
                        'emp_position' => $empPostion,
                        'emp_address' => $empAddress,
                        'emp_mobile' => $empMobile,
                        'emp_email' => $empEmail,
                        'emp_type' => $empType,
                        'emp_work_permit' =>$empWorkAuth,
                        'emp_work_proof' => $saveUrl2,
                        'emp_experience'=>$empExp,
                        'emp_salary'=>$empSalary,
                        'emp_start_date' => $empstartDate
                    ]
                    );
                    // Creating Notification 
                    $notification = array(
                        'message' => 'Data Update with Work Authorization successfully',
                        'alert-type' =>'success'
                    );
                    // redirecting back with notification
                    return redirect('accountServices/viewUpdatePage')->with($notification);
        }
        elseif($request->file('empLetter') && $request->file('WorkAuth'))
        {
            // Getting all Data from Add new Form
            $empid = $request->id;
            $empName = $request->empName;
            $empPostion = $request->empPosition;
            $empAddress = $request->empAddress;
            $empMobile  = $request->empMobile;
            $empEmail = $request->empEmail;
            $empType = $request->empType;
            $empWorkAuth = $request->empAuthorization;
            $empExp = $request->empExperience;
            $empSalary = $request->allocatedSalary;
            $empstartDate = $request->startDate;
            // checking which file is selected
            
                $empTypeproof = $request->file('empLetter');
                $empWorkAuthproof = $request->file('WorkAuth');
                //    Storing PDF and Image on specific Location
                $emp_contractL = hexdec(uniqid()).'.'.$empTypeproof->getClientOriginalExtension(); 
                $emp_contractL = $empTypeproof->move('upload\emp_contracts',$emp_contractL); 
                $WorkAuthName = hexdec(uniqid()).'.'.$empWorkAuthproof->getClientOriginalExtension(); 
                Image::make($empWorkAuthproof)->resize(636, 852)->save('upload/emp_work_proof/'.$WorkAuthName); 
                $saveUrl2 = 'upload/emp_work_proof/'.$WorkAuthName;
                EmpRecord::findOrFail($empid)->update(
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
                        'message' => 'Data with Work Authorization and Offer Letter successfully',
                        'alert-type' =>'success'
                    );
                    // redirecting back with notification
                    return redirect('accountServices/viewUpdatePage')->with($notification);
        }
        else
        {
            // Getting all Data from Add new Form
            $empid = $request->id;
            $empName = $request->empName;
            $empPostion = $request->empPosition;
            $empAddress = $request->empAddress;
            $empMobile  = $request->empMobile;
            $empEmail = $request->empEmail;
            $empType = $request->empType;
            $empWorkAuth = $request->empAuthorization;
            $empExp = $request->empExperience;
            $empSalary = $request->allocatedSalary;
            $empstartDate = $request->startDate;
            // checking which file is selected
            
                EmpRecord::findOrFail($empid)->update(
                    [
                        'emp_name' => $empName,
                        'emp_position' => $empPostion,
                        'emp_address' => $empAddress,
                        'emp_mobile' => $empMobile,
                        'emp_email' => $empEmail,
                        'emp_type' => $empType,
                        'emp_work_permit' =>$empWorkAuth,
                        'emp_experience'=>$empExp,
                        'emp_salary'=>$empSalary,
                        'emp_start_date' => $empstartDate
                    ]
                    );
                    // Creating Notification 
                    $notification = array(
                        'message' => 'Data without Work Authorization and Offer Letter successfully',
                        'alert-type' =>'success'
                    );
                    // redirecting back with notification
                    return redirect('accountServices/viewUpdatePage')->with($notification);
        }
    }
    public function DeleteEmp(Request $request)    
    {
        $id = $request->id;
        if(Auth::guest())
        {
            return redirect('/login');
        }
        EmpRecord::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' =>'success'
        );
        // redirecting back with notification
        return redirect()->back()->with($notification);
    }
    public function DisplayEmpUpdatePage(){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $allempRecord = EmpRecord::all();
        return view('admin.account_services.displayEmpUpdate',compact('allempRecord'));
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
        $empWorkAuth = $request->empAuthorization;
        $empExp = $request->empExperience;
        $empSalary = $request->allocatedSalary;
        $empstartDate = $request->startDate;
        // checking which file is selected
        
            $empTypeproof = $request->file('empLetter');
            $empWorkAuthproof = $request->file('WorkAuth');
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
    public function EmpDesk(){
        $allempRecord = EmpRecord::all();
        
        return view('admin.account_services.employeeDesk',compact('allempRecord'));
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
