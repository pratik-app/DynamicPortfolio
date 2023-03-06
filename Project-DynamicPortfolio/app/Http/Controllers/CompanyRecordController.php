<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IncomeRecord;
use App\Models\ExpenseRecord;
use App\Models\InvestmentRecord;
use App\Models\Projects;
use App\Models\ASC\EmpRecord;
use App\Models\LibilitiesRecord;
use App\Models\EquityRecord;
use Dompdf\Dompdf;
class CompanyRecordController extends Controller
{
    // Creating function to view Income Record

    public function ViewIncomeRecord()
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            return view('admin.company_records.income_record');
        }
    }

    // Creating function to view Expense Record

    public function ViewExpenseRecord()
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            return view('admin.company_records.expense_record');
        }
    }

    // Creating function to view Investment Record
    
    public function ViewInvestmentRecord()
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            return view('admin.company_records.investment_record');
        }
    }
    
    // Creating function to Delete Income Record

    public function DeleteIncomeRecord(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $id = $request->id;
            IncomeRecord::findOrfail($id)->delete();
            $notification = array(
                'message' => 'Record Deleted Successfully!',
                'alert-type' =>'success'
            );
            // redirecting back with notification
            return redirect()->back()->with($notification);
        }
        
    }

    // Creating function to Delete the Expense Record

    public function DeleteExpenseRecord(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $id = $request->id;
            ExpenseRecord::findOrfail($id)->delete();
            $notification = array(
                'message' => 'Record Deleted Successfully!',
                'alert-type' =>'success'
            );
            // redirecting back with notification
            return redirect()->back()->with($notification);
        }
        
    }

    // Creating function to Delete the Investment Record

    public function DeleteInvestmentRecord(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $id = $request->id;
            InvestmentRecord::findOrfail($id)->delete();
            $notification = array(
                'message' => 'Record Deleted Successfully!',
                'alert-type' =>'success'
            );
            // redirecting back with notification
            return redirect()->back()->with($notification);
        }
        
    }

    // Creating new function to delete Libilities Record

    public function DeleteLibilitiesRecord(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $id = $request->id;
            LibilitiesRecord::findOrfail($id)->delete();
            $notification = array(
                'message' => 'Record Deleted Successfully!',
                'alert-type' =>'success'
            );
            // redirecting back with notification
            return redirect()->back()->with($notification);
        }
        
    }

    // Creating function to Delete Equity Record 

    public function DeleteEquityRecord(Request $request)
    {
        
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $id = $request->id;
            EquityRecord::findOrfail($id)->delete();
            $notification = array(
                'message' => 'Record Deleted Successfully!',
                'alert-type' =>'success'
            );
            // redirecting back with notification
            return redirect()->back()->with($notification);
        }
        
    }

    // Creating function to save new Income Record

    public function SaveNewIncomeRecord(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $IncomeType = $request->IncomeRecord;
            if($IncomeType == "Sales Income")
            {
                $SalesIncome = $request->BusinessIncome;
                IncomeRecord::insert([
                    'type_of_income'=>$IncomeType,
                    'amount'=>$SalesIncome
                ]);
                $notification = array(
                    'message' => 'Saved to Income Record!',
                    'alert-type' =>'success'
                );
                // redirecting back with notification
                return redirect()->back()->with($notification);
            }
            else
            {
                $OtherIncomeAmount = $request->otherIncomeAmount;
                IncomeRecord::insert([
                    'type_of_income'=>$IncomeType,
                    'amount'=>$OtherIncomeAmount
                ]);
                $notification = array(
                    'message' => 'Saved to Income Record!',
                    'alert-type' =>'success'
                );
                // redirecting back with notification
                return redirect()->back()->with($notification);
            }
        }
    }
    
    // Creating function to store Expense Record

   public function SaveNewExpenseRecord(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $ExpenseType = $request->ExpenseRecord;
            if($ExpenseType == "Salary Expense")
            {
                $SalaryExp = $request->SalaryExpense;
                ExpenseRecord::insert([
                    'type_of_expense'=>$ExpenseType,
                    'amount'=>$SalaryExp
                ]);
                $notification = array(
                    'message' => 'Saved to expense Record!',
                    'alert-type' =>'success'
                );
                // redirecting back with notification
                return redirect()->back()->with($notification);
            }
            elseif($ExpenseType == "Utilities Expense")
            {
                $lightexp = $request->Electricity;
                $gasexp = $request->Gas;
                $Water = $request->Water;
                $sumAmount = (preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $lightexp)) + (preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $gasexp)) + (preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $Water));
                ExpenseRecord::insert([
                    'type_of_expense' => $ExpenseType,
                    'amount' => '$'.$sumAmount
                ]);
                $notification = array(
                    'message' => 'Saved to expense Record!',
                    'alert-type' =>'success'
                );
                return redirect()->back()->with($notification);
            }
            else
            {
                $otherExpenseAmount = $request->otherExpenseAmount;
                ExpenseRecord::insert([
                    'type_of_expense'=>$ExpenseType,
                    'amount'=>$otherExpenseAmount
                ]);
                $notification = array(
                    'message' => 'Saved to Income Record!',
                    'alert-type' =>'success'
                );
                // redirecting back with notification
                return redirect()->back()->with($notification);
            }
        }
    } 
    
    // Creating function to view Equity Record

    public function LibilitiesRecord()
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            return view('admin.company_records.libilities_record');
        }
    }

    // Creating function to view Libilities Record

    public function EquityRecord()
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            return view('admin.company_records.equity_record');
        }
    }
    // Creating function to save investment Record

    public function SaveNewInvestmentRecord(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $InvestmentType = $request->InvestmentRecord;
            $InvestedAmount = $request->InvestmentAmount;
            InvestmentRecord::insert([
                'type_of_investment' => $InvestmentType,
                'amount' =>$InvestedAmount
            ]);
            $notification = array(
                'message' => 'Saved to Investment Record!',
                'alert-type' =>'success'
            );
            // redirecting back with notification
            return redirect()->back()->with($notification);
        }
    }

    // Creating function to save Equity Record

    public function SaveNewEquityRecord(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $EquityType = $request->EquityRecord;
            $EquityAmount = $request->EquityAmount;
            EquityRecord::insert([
                'type_of_equity' => $EquityType,
                'amount' =>$EquityAmount
            ]);
            $notification = array(
                'message' => 'Saved to Equity Record!',
                'alert-type' =>'success'
            );
            // redirecting back with notification
            return redirect()->back()->with($notification);
        }
    }

    // Creating function for Libilities

    public function SaveNewLibilitiesRecord(Request $request)
    {
        if(Auth::guest())
        {
            return redirect('/login');
        }
        else
        {
            $LibilitiesType = $request->LibilitiesRecord;
            if($request->LibilitiesRecord == "Unearned Revenue")
            {
                $unearnedRevenue = $request->UnearnedRevenue;
                LibilitiesRecord::insert([
                    'type_of_libilities' => $LibilitiesType,
                    'amount' =>$unearnedRevenue
                ]);
                $notification = array(
                    'message' => 'Saved to Libilities Record!',
                    'alert-type' =>'success'
                );
                // redirecting back with notification
                return redirect()->back()->with($notification);
            }
            else
            {
                $LibilitiesAmount = $request->LibilitiesAmount;
                
                LibilitiesRecord::insert([
                    'type_of_libilities' => $LibilitiesType,
                    'amount' =>$LibilitiesAmount
                ]);
                $notification = array(
                    'message' => 'Saved to Libilities Record!',
                    'alert-type' =>'success'
                );
                // redirecting back with notification
                return redirect()->back()->with($notification);
            }
            
        }
    }

    // Creating function to Create Account Summary in PDF Format

    public function AccountSummaryPDF()
    {
        $incomeRecordData = IncomeRecord::all();
        $expenseRecordData = ExpenseRecord::all();
        $investmentRecordData = InvestmentRecord::all();
        $projectOutstandings = Projects::all();
        $liabilitiesRecordData = LibilitiesRecord::all();
        $equityRecordData = EquityRecord::all();
        $html = view('accountSummary', compact(
            'incomeRecordData',
            'expenseRecordData',
            'investmentRecordData',
            'projectOutstandings',
            'liabilitiesRecordData',
            'equityRecordData'
            ));
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4','portrait');
            $dompdf->render();
            $filename = 'Account Summary.pdf';
            return $dompdf->stream($filename);
    }
}

