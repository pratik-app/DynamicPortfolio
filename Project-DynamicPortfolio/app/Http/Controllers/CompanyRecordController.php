<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IncomeRecord;

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

}

