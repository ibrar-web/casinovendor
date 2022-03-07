<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VendorHomeController;
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
Route::get('/logoutselfv', function () {
    Auth::logout();
    return view('auth.login');
});
Auth::routes();
Route::post('/login',[App\Http\Controllers\Auth\LoginController::class,'login']);
Route::middleware('auth:web')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/vendor/userslist/init', [VendorHomeController::class, 'userslist']);
Route::post('/vendor/usersregister', [VendorHomeController::class, 'usersregister']);
Route::post('/vendor/userhistory', [VendorHomeController::class, 'usershistory']);
Route::post('/vendor/history', [VendorHomeController::class, 'vendorhistory']);
Route::post('/vendor/transctionhistory/init', [VendorHomeController::class, 'transctionhistory']);
Route::post('/vendor/vendorhistory/init', [VendorHomeController::class, 'accounthistory']);
Route::post('/vendor/vendorreport/init', [VendorHomeController::class, 'vendorreport']);
Route::post('/vendor/vendordisputes/init', [VendorHomeController::class, 'vendordisputes']);

Route::post('/vendor/sendsms',[VendorHomeController::class, 'sendsms']);
});

