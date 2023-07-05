<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardJobController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\JobseekerProfileController;
use App\Http\Controllers\ProfileJobseekerController;

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
    return view('front.index');
});


Route::get('/jobs', [JobController::class, 'index']);
Route::get('/job/{job:slug}', [JobController::class, 'show']);
Route::post('/job/apply', [JobController::class, 'apply']);

Route::get('/company/{company:username}', [CompanyController::class, 'show']);

Route::get('/register/jobseeker', [RegisterController::class, 'indexJobseeker'])->middleware('guest');
Route::post('/register/storeJobseeker', [RegisterController::class, 'storeJobseeker']);
Route::get('/register/company', [RegisterController::class, 'indexCompany'])->middleware('guest');
Route::post('/register/storeCompany', [RegisterController::class, 'storeCompany']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::resource('/dashboard/profile/jobseeker', JobseekerProfileController::class)->only(['index', 'update', 'edit'])->parameters(['jobseeker' => 'jobseekerProfile'])->middleware('auth');
Route::resource('/dashboard/profile/company', CompanyProfileController::class)->only(['index', 'update', 'edit'])->parameters(['company' => 'companyProfile'])->middleware('auth');

Route::resource('/dashboard/jobs', DashboardJobController::class)->parameters(['jobs' => 'jobPost'])->middleware('auth');

Route::get('/dashboard/applied', [ApplicantController::class, 'applied'])->middleware('auth');
Route::get('/dashboard/applicants', [ApplicantController::class, 'applicants'])->middleware('auth');
Route::get('/dashboard/applicants/{job:slug}', [ApplicantController::class, 'applicantLists'])->middleware('auth');
Route::get('/dashboard/applicants/profile/{jobseeker:username}', [ApplicantController::class, 'applicantProfile'])->middleware('auth');
