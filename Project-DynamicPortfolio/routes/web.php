<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\About\AboutSliderController;
use App\Http\Controllers\ClientController;
use App\Models\Contact;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
});

// Contact Me Routes
Route::controller(ClientController::class)->group(function(){
    Route::post('/contact/admin', 'getClientContact')->name('contact.me');
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
