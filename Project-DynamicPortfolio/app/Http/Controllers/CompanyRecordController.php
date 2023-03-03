<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IncomeRecord;
use App\Models\ExpenseRecord;

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
            if($IncomeType == "SalesIncome")
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
        if($ExpenseType == "SalaryExpense")
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
        elseif($ExpenseType == "UtilitiesExpense")
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

}

