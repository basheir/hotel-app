<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth' ]], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminControler::class, 'profile'])->name('profile.dashboard');
    Route::get('setting', [AdminControler::class, 'setting'])->name('setting.dashboard');
});

Route::group(['prefix'=>'agent','middleware'=>['isAgent','auth' ] ], function(){
    Route::get('dashboard', [AgentController::class, 'index'])->name('agent.dashboard');
    Route::get('profile', [AgentController::class, 'profile'])->name('agent.profile');
    Route::get('setting', [AgentController::class, 'setting'])->name('agent.setting');
});