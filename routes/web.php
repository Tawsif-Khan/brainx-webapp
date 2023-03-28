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

Route::get('/talent', function () {
    return view('pages.index');
});
Route::get('/', function () {
    return view('pages.business');
});
Route::get('/privacy-policy', function () {
    return view('pages.privacy');
});
Route::get('/terms-of-service', function () {
    return view('pages.terms');
});
Route::get('/pending', 'App\http\controllers\TalentProfileController@showPendingPage')->name('talent.pending');


Route::get('/view-profile', 'App\http\controllers\TalentProfileController@show')->name('show.profile');
Route::get('/build-profile', 'App\http\controllers\TalentProfileController@index')->name('build.profile');
Route::post('/submit-profile','App\http\controllers\TalentProfileController@store')->name('submit.profile');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard','App\http\controllers\Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/users','App\http\controllers\Admin\AdminController@users')->name('admin.users');
    Route::get('/categories','App\http\controllers\Admin\SkillController@index')->name('admin.categories');
    Route::post('/category/insert','App\http\controllers\Admin\SkillController@storeCategory')->name('admin.category.insert');
    Route::get('/skills','App\http\controllers\Admin\SkillController@skills')->name('admin.skills');
    Route::post('/skill/insert','App\http\controllers\Admin\SkillController@store')->name('admin.skill.insert');
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


Route::get('auth/linkedin', [LinkedinController::class, 'linkedinRedirect']);
Route::get('auth/linkedin/callback', [LinkedinController::class, 'linkedinCallback']);
require __DIR__ . '/auth.php';
