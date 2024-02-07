<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
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

Route::get('companies', [CompanyController::class, 'index'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;

Route::get('companies/create', [CompanyController::class, 'create'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;

Route::post('companies/create', [CompanyController::class, 'store'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;

Route::get('companies/{id}/edit', [CompanyController::class, 'edit'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;

Route::put('companies/{id}/edit', [CompanyController::class, 'update'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;

Route::get('companies/{id}/delete', [CompanyController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;


//announcements

Route::get('announcements', [AnnouncementController::class, 'index'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;

Route::get('announcements/create', [AnnouncementController::class, 'create'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;

Route::post('announcements/create', [AnnouncementController::class, 'store'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;

Route::get('announcements/{id}/edit', [AnnouncementController::class, 'edit'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;

Route::put('announcements/{id}/edit', [AnnouncementController::class, 'update'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;

Route::get('announcements/{id}/delete', [AnnouncementController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');
;
Auth::routes();


//skills

Route::get('skills', [SkillController::class, 'index'])->middleware(Authenticate::class);
;

Route::get('skills/create', [SkillController::class, 'create'])->middleware(Authenticate::class);
;

Route::post('skills/create', [SkillController::class, 'store'])->middleware(Authenticate::class);
;

Route::get('skills/{id}/edit', [SkillController::class, 'edit'])->middleware(Authenticate::class);
;

Route::put('skills/{id}/edit', [SkillController::class, 'update'])->middleware(Authenticate::class);
;

Route::get('skills/{id}/delete', [SkillController::class, 'destroy'])->middleware(Authenticate::class);
;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');
;
;