<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\ScenarioController;
use App\Http\Controllers\UserController;
use App\Models\Scenario;
use Illuminate\Support\Facades\Auth;
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
    return view('welcomenew');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function (){
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth', 'PreventBackHistory']], function(){
    Route::get('index',[AdminController::class,'index'])->name('admin.index');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('matlab', [AdminController::class, 'matlab'])->name('admin.matlab');
    Route::get('genetic', [AdminController::class, 'genetic'])->name('admin.genetic');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');

    Route::post('update-profile-info', [AdminController::class, 'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture', [AdminController::class, 'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password', [AdminController::class, 'changePassword'])->name('adminChangePassword');
});

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SideBarController ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// ~~~ Graps Pages ~~~
Route::get('table-view', [DashboardController::class, 'tableView'])->name('tableView');
//Route::get('table-view_2', [DashboardController::class, 'tableView_2'])->name('tableView_2');

Route::get('table-view_2', [TableController::class, 'index'])->name('tableView_2');
Route::get('insidetableView_1', [DashboardController::class, 'insidetableView_1'])->name('insidetableView_1');

// ~~~~ BAR CHARTS PAGES ~~~~
Route::get('chart-view', [BarController::class, 'chartView'])->name('chartView');
Route::get('bar-chart-view', [BarController::class, 'barChartView'])->name('bar-chart-view');
Route::get('bar-cost_effective', [BarController::class, 'barChartView_1'])->name('bar-cost_effective');


Route::get('chart-viewPie', [DashboardController::class, 'chartViewPie'])->name('chartViewPie');
Route::get('chart-viewLine', [DashboardController::class, 'chartViewLine'])->name('chartViewLine');

// ~~~ /Graps Pages ~~~

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth', 'PreventBackHistory']], function(){
    Route::get('index',[UserController::class,'index'])->name('user.index');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
});


//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ ScenarioController ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Route::get('scenarios/index', [ScenarioController::class, 'index'])->name('scnario.index');
// Scenario Creation
Route::get('scenarios/create', [ScenarioController::class, 'create'])->name('scnario.create');
// Add Scenario (μετά την Ολοκλήρωση)
Route::post('add_scenario', [ScenarioController::class, 'add_scenario'])->name('add_scenario');
// Lesson Status (Enable/Disable)
Route::get('/scenarios/scenario_display/{id}/{display}', [ScenarioController::class, 'lesson_display'])->name('scenario_display');
