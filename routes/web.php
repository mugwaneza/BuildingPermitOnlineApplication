<?php

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

use Illuminate\Support\Facades\Route;

//admin route
Route::get('/admin/dashboard', 'AdministratorsController@Welcome');
Route::get('/admin/new/applicant', 'AdministratorsController@Myapplicants');
Route::get('/register/admin', 'AdministratorsController@RegisterAdmin');
Route::get('/all/admin', 'AdministratorsController@AllAdmin');
Route::get('/getapp', 'Functions@globalFunction');

Route::post('/register/admin', 'AdministratorsController@CreateAdmin');
Route::post('/admin/update', 'AdministratorsController@UpdateAdmin');
Route::post('admin/delete', 'AdministratorsController@DeleteAdmin');
Route::post('/admin/village/approval/{id}', 'AdministratorsController@ApproveVillageApplications');
Route::post('/admin/cell/approval/{id}', 'AdministratorsController@ApproveCellApplications');
Route::post('/admin/sector/approval/{id}', 'AdministratorsController@ApproveSectorApplications');
Route::post('/admin/sector/reject/{id}', 'AdministratorsController@RejectSectorApplications');

//Main Home route
Route::get('/', 'WelcomeController@Home');

// Login and register route + signout
Route::get('/register', 'WelcomeController@Register');
Route::post('/register', 'WelcomeController@CitizenRegister');
Route::get('/login', 'WelcomeController@Login');
Route::post('/login', 'WelcomeController@CreateLogin');
Route::get('/signout', 'WelcomeController@destroy');

Route::post('/apply','WelcomeController@CitizenApply' );

// Access Citizen dashboard
Route::get('/citizen', 'WelcomeController@CitizenDashboard');
Route::get('/citizen/satus', 'WelcomeController@CitizenStatus');







