<?php

use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerAvailableServices;
use App\Http\Controllers\Customer\CustomerBookingServices;
use App\Http\Controllers\Customer\CustomerDashboardController;
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


//owner_register
Route::get('/signup', [RegisterOwnerController::class, 'showSignupForm'])->name('signup');

Route::post('/signup', [RegisterOwnerController::class, 'signup']);

//owner_login
Route::get('/', [RegisterOwnerController::class, 'showLoginform'])->name('login');

Route::post('/', [RegisterOwnerController::class, 'login']);


//only access after logged in (i.e use middleware= 'owner.auth')
// Route::group(['middleware' => 'owner.auth'], function () {

// });


//owner dashboard
Route::get('/dashboard', [OwnerDashboardController::class, 'showDashboard'])->name('dashboard');


//owner logout
Route::get('/logout', [RegisterOwnerController::class, 'logout'])->name('owner.logout');

//post new room
Route::get('/post_service', [OwnerDashboardController::class, 'showpostservice'])->name('post.service');

//view booked serices on owner side
Route::get('/view_booked_service', [OwnerDashboardController::class, 'show_booked_service'])->name('view.booked.services');

//view each booked services
Route::get('/view_booked_service/{id}/view', [OwnerDashboardController::class, 'view_each_service'])->name('view.each.service');

//view and change change status on owner side
Route::get('/view_booked_status',[OwnerDashboardController::class,'show_booking_status'])->name('owner.booking.status');


//display the post service form
Route::get('/post_service/create_new_services', [OwnerServiceController::class, 'show_service_form'])->name('service.form');

Route::post('/post_service/create_new_services', [OwnerServiceController::class, 'create_service']);

//Delete the services
Route::get('/post_service/{id}/delete', [OwnerServiceController::class, 'Deleteservice'])->name('delete_ser');

//Edit the service
Route::get('/post_service/{id}/edit', [OwnerServiceController::class, 'Editservice'])->name('edit_ser');

Route::put('/post_service/{id}/edit', [OwnerServiceController::class, 'Updateservice'])->name('update_ser');


//Customers signup
Route::get('/customer_signup', [CustomerAuthController::class, 'ShowCustomer_signup_page'])->name('customer.signup');

Route::post('/customer_signup', [CustomerAuthController::class, 'signup']);

//Customers login
Route::get('/customer_login', [CustomerAuthController::class, 'showCustomer_login_page'])->name('customer.login');

Route::post('/customer_login', [CustomerAuthController::class, 'login']);


//customer dashboard
Route::get('/customer_dashboard', [CustomerDashboardController::class, 'showDashboard'])->name('customer.dashboard');

//Available services on customers
Route::get('/Available_services', [CustomerAvailableServices::class, 'Show_services'])->name('Available.services');

//Customer booking services
Route::get('/book_service/{id}', [CustomerBookingServices::class, 'book_service']);

//services booked history
Route::get('/services_booked_history', [CustomerAvailableServices::class, 'show_booked_history'])->name('booked.history');

//services booked status
Route::get('/services_booked_status', [CustomerAvailableServices::class, 'show_booked_status'])->name('booked.status');

//owner logout
Route::get('/customer_logout', [CustomerDashboardController::class, 'logout'])->name('customer.logout');
