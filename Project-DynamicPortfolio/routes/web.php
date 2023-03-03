<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\About\AboutSliderController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\ASC\AccountServicesController;
use App\Http\Controllers\clientsController;
use App\Http\Controllers\CompanyRecordController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\JobBoardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});


// Creating Route for Home Redirection

Route::get('/',function(){
    return view('frontend.index');
})->middleware(['auth', 'verified'])->name('home.view');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes 
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'UpdateProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/Update/password', 'UpdatePassword')->name('update.password');
})->middleware(['auth', 'verified'])->name('dashboard');


// Leads Routes
Route::controller(LeadsController::class)->group(function(){
    Route::post('/lead/updatestatus','updateStatus')->name('lead.status');
    Route::post('/lead/updateAction','updateAction')->name('lead.action');
    Route::post('/lead/leadAssigned','assignLead')->name('lead.userAssigned');
    Route::post('/admin/leads', 'getleadContact')->name('contact.me');
    Route::get('/admin/inbox', 'getallleads')->name('contact.inbox');
    Route::get('/admin/lead/{id}', 'viewEmail')->name('contact.display');
    Route::get('/admin/deletelead/{id}', 'DeleteLead')->name('contact.deleteLead');
});

// Account Services Routes

Route::controller(AccountServicesController::class)->group(function(){
    Route::get('accountServices/employeesdashboard', 'GetAllEmpData')->name('accountservices.empdashboard');
    Route::get('accountServices/addEmployes','AddEmployees')->name('accountservices.addnewEmp');
    Route::get('accountServices/manageTeams','ManageTeams')->name('accountservices.manageTeam');
    Route::post('accountServices/addNewEmployee', 'AddNewEMP')->name('accountservices.storeempdetials');
    Route::get('accountServices/employeesDesk','EmpDesk')->name('accountservices.empdesk');
    // Creating Route To Download all Employees Record in Excel Sheet
    Route::get('accountServices/exportEmployeeRecord','expEmployeesRecord')->name('accountservices.exportEmp');
    // Creating Route to download Employee Contract
    Route::get('accountServices/downloadEmpContract/{empName}', 'downloadEmpContract')->name('accountservices.downloadEmpContract');
    // Creating Route to Add Employee to The Team
    Route::get('accountServices/addEmpToTeam/{empID}', 'AddEMPtoTEAM')->name('accountservices.addthisemptoteam');
    // update employee Starts Here
    Route::get('accountServices/viewUpdatePage','DisplayEmpUpdatePage')->name('accountservices.displayUpdatePage');
    Route::get('accountServices/DisplayUpdatePage/{id}','EditEmp')->name('accountservices.editEmp');
    Route::post('accountServices/UpdateEmployee','UpdateEmployee')->name('accountservices.updateEmp');
    Route::get('accountServices/DeleteEmployee','DeleteEmp')->name('accountservice.deleteEmp');
    Route::post('accountServices/AddEmployeeToTeam','AddToTeam')->name('accountservices.addToTeam');
    // Payroll Redirection Starts Here
    Route::get('accountServices/PayrollDashboard','ViewPayrollDash')->name('accountservices.payrollDashboard');
    Route::post('accountServices/GenratePayroll','GeneratePayRoll')->name('accountservices.generatePayroll');
});

// All Clients Route

Route::controller(clientsController::class)->group(function(){
    Route::post('client/convertToClient', 'AddNewClient')->name('convert.leadToclient');
    Route::get('client/clientsDashboard','ShowAllClients')->name('clients.showclientshub');
});

// Home Slide All Routes 
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/home/Updateslider', 'UpdateSlider')->name('update.slider');    
});

// Home Slide All Routes 
Route::controller(AboutSliderController::class)->group(function(){
    Route::get('/about/slide', 'AboutSlider')->name('about.slide');
    Route::post('/about/edit', 'EditAbout')->name('about.editme');
});

// All Project Routes
Route::controller(ProjectController::class)->group(function(){
    Route::post('projects/CreateProject','CreateProject')->name('project.createProject');
    Route::get('projects/ProjectHub','ViewProjectHub')->name('projects.showprojecthub');
});

// Job Routes
Route::controller(JobBoardController::class)->group(function(){
    Route::get('CompanyJobs/AvailableJobs','ViewAvailableJobs')->name('companyjobs.jobpostings');
    Route::get('CompanyJobs/CreateNewOpportunity','NewOpportunityPage')->name('compnayjobs.createnewopp');
    Route::post('CompanyJobs/AddNewOpportunity','AddJob')->name('compnayjobs.newJobPost');
    Route::get('CompanyJobs/ViewAllJobPostings','ViewAllJobPostings')->name('companyjobs.viewalljobs');
    Route::post('CompanyJobs/UpdateJobPosting','UpdateJobPosting')->name('companyjobs.UpdateJobPosting');
    Route::get('CompanyJobs/DeactivateJobPosting/{job_id}','DeactivateJobPosting')->name('companyjobs.deactivateJob');
    Route::get('CompanyJobs/DeleteJobPosting/{job_id}','DeleteJobPosting')->name('companyjobs.deleteJobPosting');
    Route::post('CompanyJobs/ApplyforJob','GetJobApplication')->name('companyjobs.applyforjob');
    Route::get('CompanyJobs/ApplicantsHub','ViewJobApplications')->name('companyjobs.viewalljobapplications');
    Route::get('CompanyJobs/DownloadApplicantResume/{id}', 'DownloadApplicantResume')->name('companyjobs.downloadapplicantResume');
    
});

// Company Record Routes

Route::controller(CompanyRecordController::class)->group(function(){
    Route::get('CompnayRecord/IncomRecord','ViewIncomeRecord')->name('companyrecord.viewincomerecord');
    Route::get('CompnayRecord/ExpenseRecord','ViewExpenseRecord')->name('companyrecord.viewexpenserecord');
    Route::get('CompnayRecord/InvestmentRecord','ViewInvestmentRecord')->name('companyrecord.viewinvestmentrecord');
    Route::post('CompanyRecord/NewIncomeRecord','SaveNewIncomeRecord')->name('companyrecord.savenewIncomeRecord');
    Route::get('CompanyRecord/DeleteIncomeRecord/{id}','DeleteIncomeRecord')->name('companyrecord.deleteIncomeRecord');
    Route::post('CompanyRecord/NewExpenseRecord','SaveNewExpenseRecord')->name('companyrecord.savenewExpenseRecord');
    Route::get('CompanyRecord/DeleteExpenseRecord/{id}','DeleteExpenseRecord')->name('companyrecord.deleteExpenseRecord');
    Route::post('CompanyRecord/NewInvestmentRecord','SaveNewInvestmentRecord')->name('companyrecord.savenewInvestmentRecord');
    Route::get('CompanyRecord/DeleteInvestmentRecord/{id}','DeleteInvestmentRecord')->name('companyrecord.deleteInvestmentRecord');
    Route::get('CompanyRecord/GenrateAccountSummary','AccountSummaryPDF')->name('companyrecord.viewaccountSummary');
});


// Login Route

Route::get('/login', function () {
    return view('admin.logout');
})->middleware(['auth', 'verified'])->name('dashboard');


// Authentication Route

Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
});

require __DIR__.'/auth.php';
