<?php

namespace App\Http\Controllers\ASC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountServicesController extends Controller
{
    public function GetAllEmpData(){
        return view('admin.account_services.employee_dashboard');
    }
}
