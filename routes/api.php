<?php

use Crm\Base\ApiAuth\AuthController;
use Crm\Companies\Controllers\Api\CompanyController;
use Crm\Contacts\Controllers\Api\ContactController;
use Illuminate\Support\Facades\Route;

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

/**
 * AUTHENTICATION
 */
//Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

/**
 * PROTECTED ROUTES
 */
Route::group(['middleware' => ['auth:sanctum']], function () {

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

    /**
     * Logout Function
     */
    Route::post('logout', [AuthController::class, 'logout']);

});

