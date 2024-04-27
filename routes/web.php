<?php

use App\Http\Controllers\OwnerDashboardController;
use App\Http\Controllers\OwnerServiceController;
use App\Http\Controllers\RegisterOwnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//owner_register
Route::get('/signup', [RegisterOwnerController::class, 'showSignupForm'])->name('signup');

Route::post('/signup', [RegisterOwnerController::class, 'signup']);

//owner_login
Route::get('/', [RegisterOwnerController::class, 'showLoginform'])->name('login');

Route::post('/', [RegisterOwnerController::class, 'login']);

//owner dashboard
Route::get('/dashboard', [OwnerDashboardController::class, 'showDashboard'])->name('dashboard');

//owner logout
Route::get('/logout', [RegisterOwnerController::class, 'logout'])->name('owner.logout');

//post new room
Route::get('/post_service',[OwnerDashboardController::class,'showpostservice'])->name('post.service');

//display the post service form
Route::get('/post_service/create_new_services',[OwnerServiceController::class,'show_service_form'])->name('service.form');

Route::post('/post_service/create_new_services',[OwnerServiceController::class,'create_service']);
