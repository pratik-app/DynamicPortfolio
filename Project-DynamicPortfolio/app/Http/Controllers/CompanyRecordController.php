<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}

