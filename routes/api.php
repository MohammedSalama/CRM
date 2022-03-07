<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

/*
 * CRUD API Companies
 */
Route::get('admin_dashboard/companies',[CompanyController::class,'index']);
Route::get('admin_dashboard/companies/{id}',[CompanyController::class,'show']);
Route::post('admin_dashboard/companies/store',[CompanyController::class,'store']);
Route::post('admin_dashboard/companies/destroy/{id}',[CompanyController::class,'destroy']);
Route::post('admin_dashboard/companies/{id}',[CompanyController::class,'update']);
/*
 * CRUD API Contacts
 */
Route::get('admin_dashboard/contacts',[ContactController::class,'index']);
Route::get('admin_dashboard/contacts/{id}',[ContactController::class,'show']);
Route::post('admin_dashboard/contacts/store',[ContactController::class,'store']);
Route::post('admin_dashboard/contacts/{id}',[ContactController::class,'update']);
Route::post('admin_dashboard/contacts/destroy/{id}',[ContactController::class,'destroy']);


