<?php

use App\Http\Controllers\CompanyController;
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

Route::get('/', function () {
    return view('welcome');
});

//campanies

Route::get('companies',[CompanyController::class,'index']);

Route::get('companies/create',[CompanyController::class,'create']);

Route::post('companies/create',[CompanyController::class,'store']);

Route::get('companies/{id}/edit',[CompanyController::class,'edit']);

Route::put('companies/{id}/edit',[CompanyController::class,'update']);

Route::get('companies/{id}/delete',[CompanyController::class,'destroy']);



// Route::get('/posts/{id}', function ($id) {
//     return response('post'. $id);
// })->where('id', '[0-9]+');