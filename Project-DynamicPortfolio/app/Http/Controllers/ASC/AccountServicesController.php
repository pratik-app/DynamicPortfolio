<?php

namespace App\Http\Controllers\ASC;

use App\Exports\ExportEmpRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ASC\EmpRecord;
use Intervention\Image\ImageManagerStatic as Image;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ProvincialTaxes;
use Dompdf\Dompdf;
use Illuminate\Support\Arr;


class AccountServicesController extends Controller
{
    // Getting All Employees Details
    
    public function GetAllEmpData(){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        return view('admin.account_services.employee_dashboard');
    }

    // Sending user to Edit Page 
    
    public function EditEmp(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $empID =  $request->id;
        $empDetails = EmpRecord::findOrFail($empID);
        return view('admin.account_services.editEmployees',compact('empDetails'));
    }
    
    // Code to Update specific Employee Details

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
            $empStatus = $request->empStatus;
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
                        'emp_status'=>$empStatus,
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
            $empStatus = $request->empStatus;
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
                        'emp_start_date' => $empstartDate,
                        'emp_status' => $empStatus
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
            $empStatus = $request->empStatus;
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
                        'emp_start_date' => $empstartDate,
                        'emp_status'=> $empStatus
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
            $empStatus = $request->empStatus;
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
                        'emp_start_date' => $empstartDate,
                        'emp_status'=> $empStatus
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

    // Hard Delete Specific Employee

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

    // Displaying all Employees Record to Update and Delete the employee from the Company

    public function DisplayEmpUpdatePage(){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $allempRecord = EmpRecord::all();
        return view('admin.account_services.displayEmpUpdate',compact('allempRecord'));
    }

    // Creating new function to download the Contract

    public function downloadEmpContract(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $empName = $request->empName;
        $emprecord = EmpRecord::where('emp_name','=',$empName)->first();
        header('Content-Type: application/pdf');
        header('Content-Disposition:attachment;filename=$emprecord->emp_letter');
        return readfile($emprecord->emp_letter);
    }

    // Code to Add New Employee to The Company

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

    // Generating the Excel Sheet of All Employees

    public function expEmployeesRecord(Request $request)
    {
        return Excel::download(new ExportEmpRecord, 'AllEmployeesRecord.xlsx');
    }

    // Displaying all Employees Desk To user (EMPLOYEE HUM)

    public function EmpDesk(){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $allempRecord = EmpRecord::all();
        
        return view('admin.account_services.employeeDesk',compact('allempRecord'));
    }

    // Displaying Add New Employee Page

    public function AddEmployees(){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        return view('admin.account_services.addNewEmployees');
    }

    // Displaying Manage Teams Page

    public function ManageTeams(){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        return view('admin.account_services.manageTeams');
    }

    // Getting Request To Add Employee to Specific Team
    public function AddEMPtoTEAM(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $empID = $request->empID;
        $empRequest = EmpRecord::findorfail($empID);
        return view('admin.account_services.addEmptoTeam',compact('empRequest'));
    }

    // Adding Employee To The Team

    public function AddToTeam(Request $request){
        if(Auth::guest())
        {
            return redirect('/login');
        }
        $empID = $request->id;
        EmpRecord::findOrFail($empID)->update(
            [
                'allocated_in_team' => $request->teamAllocated
            ]
            );
            $notification = array(
                'message' => 'Employee Allocated To'.$request->teamAllocated,
                'alert-type' =>'success'
            );
            // redirecting back with notification
            return redirect()->back()->with($notification);
    }
    public function ViewPayrollDash()
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        return view('admin.account_services.payroll');
    }
    public function GeneratePayRoll(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else{
            
            // Taking Form Data

            $employeeID = $request->emp_id;
            $employeeName = $request->empName;
            $employeePostion = $request->empPosition;
            $employeeAddress = $request->empAddress;
            $employeeMobileNumber = $request->empMobile;
            $employeeEmail = $request->empEmail;
            $employeeSINNumber = $request->empSIN;
            $employeeWorkHrs = $request->empWorkedHours;
            $employeePayMethod = $request->paymentMethod;
            $employeePaymentChequeNumber = $request->chequeNumber;
            $employeeEIDR = $request->empEIDeduction;
            $employeeCPPR = $request->empCPPContribution;

            // This is Province that User Selects
            
            $employeeProvince = $request->provinceSelection;
            
            // This is the Gross Salary of Employee
            
            $employeeSalary = $request->empSalary;
            
            // Converting the Employee Salary to Float
            
            $salaryAmount = (float)filter_var(preg_replace('/\D/', '', $employeeSalary));
            
            // Calculating EI the formula used is EI fetched from Form and converted to float then divided by 100 and multiploed by Employee Salary
            
            $employeeEIDeduction = ((float)(preg_replace('/\D/', '.',$request->empEIDeduction)))/100 * $salaryAmount;
            
            // Now Calculating the CPP Contribution same formula used for EI

            $employeeCPPContribution = ((float)(preg_replace('/\D/', '.',$request->empCPPContribution)))/100 * $salaryAmount;
            
            // Finding Taxable Income from Gross Income Formula is Employee Salary - (EI Deduction + CPP Contribution)

            $taxableIncome = $salaryAmount-($employeeEIDeduction + $employeeCPPContribution);
            $generatedTaxableIncome = $taxableIncome;
            // Calculating Federal Tax 
            
            $federalTax = 0;
                $federalTaxBrackets = array(0.15, 0.205, 0.26, 0.29, 0.33);
                $federalTaxRates = array(0, 50978, 102040, 151978, 216511);
            
                for ($i = count($federalTaxBrackets) - 1; $i >= 0; $i--) {
                    if ($taxableIncome > $federalTaxRates[$i]) {
                        $federalTax += ($taxableIncome - $federalTaxRates[$i]) * $federalTaxBrackets[$i];
                        $taxableIncome = $federalTaxRates[$i];
                    }
                }

            // Getting Provincial Tax Rates From Database

            $ProvincialtaxRates = ProvincialTaxes::where('province_Name', $employeeProvince)->get(array('province_income_amount','province_tax_percent'));
            $closest = null;
            foreach ($ProvincialtaxRates as $i=>$compareSalary) {
                if ($closest === null || abs($salaryAmount - $closest['province_income_amount']) > abs($compareSalary['province_income_amount'] - $salaryAmount)) {
                    $closest = $compareSalary;
                }
            }

            // Generating provincial Tax after getting provincial tax from database dividing it by 100 as it is percentage  and multiplying it with taxable Income

            $provincialTax = ((float)$closest['province_tax_percent']/100) * $taxableIncome;

            // Total Tax after getting federalTax and Provincial Tax

            $totalTax = $federalTax + $provincialTax;
            
            // Adding the Data To Database before creating a pdf so it can be downloadable next time and can be reterive easily
            // *******************
            // *****************
            // *****************
            // *******************
            // *****************
            // *****************
            // *******************
            // *****************
            // *****************

            // Generating Payroll using HTML content for the PDF
            
            $html = view('pdf',compact(
              'employeeID',
              'employeeName',
              'employeePostion',
              'employeeAddress',
              'employeeMobileNumber',
              'employeeEmail',
              'employeeSINNumber',
              'employeeWorkHrs',
              'employeePayMethod',
              'employeePaymentChequeNumber',
              'employeeProvince',
              'employeeSalary',
              'employeeEIDR',
              'employeeCPPR',
              'generatedTaxableIncome',
              'federalTax',
              'provincialTax',
              'totalTax'  
            ));
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4','portrait');
            $dompdf->render();
            $filename = 'tax-info-'.date('Y-m-d_H:i:s').'.pdf';
            return $dompdf->stream($filename);
            
        }
    }
    
    
}
