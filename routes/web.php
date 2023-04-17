<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\LinkedinController;

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
    return view('pages.index');
});
Route::get('/business', function () {
    return view('pages.business');
});
Route::get('/privacy-policy', function () {
    return view('pages.privacy');
});
Route::get('/terms-of-service', function () {
    return view('pages.terms');
});
Route::get('/pending', 'App\http\controllers\TalentProfileController@showPendingPage')->name('talent.pending');


Route::get('/job-details/{id}', 'App\http\controllers\JobController@jobDetails')->name('talent.job.details');
Route::get('/job-details', 'App\http\controllers\JobController@jobDetail')->name('talent.job.detail');
Route::get('/view-profile/{id}', 'App\http\controllers\TalentProfileController@show')->name('show.profile');
Route::get('/build-profile', 'App\http\controllers\TalentProfileController@index')->name('build.profile');
Route::post('/submit-profile','App\http\controllers\TalentProfileController@store')->name('submit.profile');
Route::post('/submit-contract','App\http\controllers\ContractController@store')->name('submit.contract');


Route::prefix('/client')->as('client.')->group(function () {
    
    Route::post('/auth/register','App\http\controllers\Client\AuthController@register')->name('register');    
    Route::post('/auth/login','App\http\controllers\Client\AuthController@login')->name('login');
});

Route::prefix('/client')->as('client.')->middleware('auth')->group(function () {
    
    Route::get('/dashboard','App\http\controllers\Client\JobController@jobsPage')->name('dashboard');   
    Route::get('/job-request/new','App\http\controllers\Client\JobController@create')->name('job.new'); 
    Route::post('/job-request/create','App\http\controllers\Client\JobController@store')->name('job.create'); 
    Route::get('/job-details/{id}','App\http\controllers\Client\JobController@jobDetails')->name('job.details'); 
    Route::get('/job-detail','App\http\controllers\Client\JobController@jobDetail')->name('job.detail');    
});


Route::domain('admin.' . env('APP_URL'))->middleware('auth')->group(function () {
    
    Route::get('/talent-profile/{id}', 'App\http\controllers\Admin\AdminController@userDetails')->name('admin.show.profile');
    Route::get('/dashboard','App\http\controllers\Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/users','App\http\controllers\Admin\AdminController@users')->name('admin.users');
    Route::get('/clients','App\http\controllers\Admin\AdminController@clients')->name('admin.clients');
    Route::get('/projects','App\http\controllers\Admin\AdminController@projects')->name('admin.projects');
    Route::post('/users/status/update','App\http\controllers\Admin\AdminController@updateStatus')->name('admin.update.users.status');
    Route::get('/categories','App\http\controllers\Admin\SkillController@index')->name('admin.categories');
    Route::post('/category/insert','App\http\controllers\Admin\SkillController@storeCategory')->name('admin.category.insert');
    Route::get('/skills','App\http\controllers\Admin\SkillController@skills')->name('admin.skills');
    Route::post('/skill/insert','App\http\controllers\Admin\SkillController@store')->name('admin.skill.insert');
    Route::get('/feedbacks','App\http\controllers\Admin\AdminController@feedbacks')->name('admin.feedbacks');
});

Route::prefix('/admin')->as('admin.')->middleware('auth')->group(function () {
    
    Route::get('/talent-profile/{id}', 'App\http\controllers\Admin\AdminController@userDetails')->name('admin.show.profile');
    Route::get('/dashboard','App\http\controllers\Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/users','App\http\controllers\Admin\AdminController@users')->name('admin.users');
    Route::get('/clients','App\http\controllers\Admin\AdminController@clients')->name('admin.clients');
    Route::get('/projects','App\http\controllers\Admin\AdminController@projects')->name('admin.projects');
    Route::post('/users/status/update','App\http\controllers\Admin\AdminController@updateStatus')->name('admin.update.users.status');
    Route::get('/categories','App\http\controllers\Admin\SkillController@index')->name('admin.categories');
    Route::post('/category/insert','App\http\controllers\Admin\SkillController@storeCategory')->name('admin.category.insert');
    Route::get('/skills','App\http\controllers\Admin\SkillController@skills')->name('admin.skills');
    Route::post('/skill/insert','App\http\controllers\Admin\SkillController@store')->name('admin.skill.insert');
    Route::get('/feedbacks','App\http\controllers\Admin\AdminController@feedbacks')->name('admin.feedbacks');
});

Route::domain('admin.' . env('APP_URL'))->group(function () {
    
    Route::get('/login','App\http\controllers\Admin\AuthController@index')->name('admin.login.form');
    Route::post('/auth/login','App\http\controllers\Admin\AuthController@login')->name('admin.login');
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Admin/Dashboard');
//     })->name('dashboard');
// });


//Feedback

Route::post('feedback','App\http\Controllers\FeedbackController@store')->name('feedback.store');
Route::post('email/isexist','App\http\Controllers\Client\AuthController@isEmailExist')->name('email.isexist');

 
Route::get('auth/linkedin', [LinkedinController::class, 'linkedinRedirect']);
Route::get('auth/linkedin/callback', [LinkedinController::class, 'linkedinCallback']);
require __DIR__ . '/auth.php';
