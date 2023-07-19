<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);

route::get('/',[HomeController::class,'index']);

route::get('/add_doctor',[AdminController::class,'add_doctor']);

route::get('/add_staff',[AdminController::class,'add_staff']);

Route::post('/upload_staff',[AdminController::class,'upload_staff']);

Route::post('/upload_doctor',[AdminController::class,'upload_doctor']);

Route::get('/doctor_view',[AdminController::class,'doctor_view']);

Route::get('/doctor_delete/{lid}/{id}',[AdminController::class,'doctor_delete']);

Route::get('/doctor_reject/{lid}',[AdminController::class,'doctor_reject']);

Route::get('/doctor_approve/{lid}',[AdminController::class,'doctor_approve']);

Route::get('/staff_view',[AdminController::class,'staff_view']);

Route::get('/staff_delete/{id}',[AdminController::class,'staff_delete']);

Route::get('/staff_reject/{lid}',[AdminController::class,'staff_reject']);

Route::get('/staff_approve/{lid}',[AdminController::class,'staff_approve']);

Route::get('/patient_view',[AdminController::class,'patient_view']);

Route::get('/patient_delete/{id}',[AdminController::class,'patient_delete']);

Route::get('/patient_reject/{id}',[AdminController::class,'patient_reject']);

Route::get('/patient_approve/{id}',[AdminController::class,'patient_approve']);

route::get('/view_category',[AdminController::class,'view_category']);

route::post('/add_category',[AdminController::class,'add_category']);

route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

route::get('/edit_category/{id}',[AdminController::class,'edit_category']);

route::post('/category_edit/{id}',[AdminController::class,'category_edit']);

Route::get('/contact_view',[AdminController::class,'contact_view']);

Route::get('/contact_reply_view/{id}', [AdminController::class, 'contact_reply_view']);

Route::post('/contact_reply/{id}', [AdminController::class,'contact_reply']);

Route::get('/contact_reply_view/{id}', [AdminController::class, 'contact_reply_view']);

route::get('/doctor',[HomeController::class,'doctor']);

route::get('/doctor_dr',[HomeController::class,'doctor_dr']);

route::get('/consultation',[HomeController::class,'consultation']);

route::post('/add_consultation',[HomeController::class,'add_consultation']);

route::get('/bookings_view/{id}',[HomeController::class,'bookings_view']);

route::get('/book_now/{id}',[HomeController::class,'book_now']);

route::get('/booking_delete/{id}',[HomeController::class,'booking_delete']);

route::get('/view_profile',[HomeController::class,'view_profile']);

route::post('/add_profile/{id}',[HomeController::class,'add_profile']);

route::get('/stripe/{fee}/{id}',[HomeController::class,'stripe']);

Route::post('stripe/{fee}/{id}', [HomeController::class,'stripePost'])->name('stripe.post');

route::get('/appoinments_view',[HomeController::class,'appoinments_view']);

route::get('/consultation_schedule/{bkey}',[HomeController::class,'consultation_schedule']);

route::post('/consultation_schedule_upload/{bkey}',[HomeController::class,'consultation_schedule_upload']);

route::get('/bookings_view_today',[HomeController::class,'bookings_view_today']);

route::get('/user_videocall_join/{url}',[HomeController::class,'user_videocall_join']);

route::get('/videocall_join/{url}',[HomeController::class,'videocall_join']);

route::get('/registration',[HomeController::class,'registration']);

route::post('/upload_patient',[HomeController::class,'upload_patient']);

route::get('/patient',[HomeController::class,'patient']);

route::get('/patient_booking/{reg_id}',[HomeController::class,'patient_booking']);

route::get('/contact',[HomeController::class,'contact']);

Route::post('/uploadcontact',[HomeController::class,'uploadcontact']);