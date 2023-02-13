<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\About\AboutSliderController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\ASC\AccountServicesController;
use App\Http\Controllers\clientsController;

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
});

// All Clients Route

Route::controller(clientsController::class)->group(function(){
    Route::post('client/convertToClient', 'AddNewClient')->name('convert.leadToclient');
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

Route::get('/login', function () {
    return view('admin.logout');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
});

require __DIR__.'/auth.php';
