<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LandingController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
Route::get('/', [LandingController::class, 'index']);


//campanies

Route::get('companies',[CompanyController::class,'index'])->middleware(Authenticate::class);;

Route::get('companies/create',[CompanyController::class,'create'])->middleware(Authenticate::class);;

Route::post('companies/create',[CompanyController::class,'store'])->middleware(Authenticate::class);;

Route::get('companies/{id}/edit',[CompanyController::class,'edit'])->middleware(Authenticate::class);;

Route::put('companies/{id}/edit',[CompanyController::class,'update'])->middleware(Authenticate::class);;

Route::get('companies/{id}/delete',[CompanyController::class,'destroy'])->middleware(Authenticate::class);;


//announcements

Route::get('announcements', [AnnouncementController::class, 'index'])->middleware(Authenticate::class);;

Route::get('announcements/create', [AnnouncementController::class, 'create'])->middleware(Authenticate::class);;

Route::post('announcements/create', [AnnouncementController::class, 'store'])->middleware(Authenticate::class);;

Route::get('announcements/{id}/edit', [AnnouncementController::class, 'edit'])->middleware(Authenticate::class);;

Route::put('announcements/{id}/edit', [AnnouncementController::class, 'update'])->middleware(Authenticate::class);;

Route::get('announcements/{id}/delete', [AnnouncementController::class, 'destroy'])->middleware(Authenticate::class);;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');