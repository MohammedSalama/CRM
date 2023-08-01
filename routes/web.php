<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

/*
 * Authentications
 */
Route::get('/', function () {
    return view('auth.login');
});

/**
 * PROTECTED ROUTES
 */
Route::group(['middleware' => ['web']], function () {
    /*
     * Admin Dashboard
     */
    Route::get('/admin_dashboard', function () {
        return view('layouts.admin.admin_dashboard');
    })->name('admin_dashboard');
    /*
     *  CRUD For Companies
     */
    Route::get('admin_dashboard/companies',[CompanyController::class,'index'])->name('companies');
    Route::post('admin_dashboard/companies/store',[CompanyController::class,'store'])->name('companies.store');
    Route::post('admin_dashboard/companies/destroy',[CompanyController::class,'destroy'])->name('companies.destroy');
    Route::post('admin_dashboard/companies/{id}',[CompanyController::class,'update'])->name('companies.update');
    /*
     * CRUD For Contacts Persons
     */
    Route::get('admin_dashboard/contacts',[ContactController::class,'index'])->name('contacts');
    Route::post('admin_dashboard/contacts/store',[ContactController::class,'store'])->name('contacts.store');
    Route::post('admin_dashboard/contacts/destroy',[ContactController::class,'destroy'])->name('contacts.destroy');
    Route::post('admin_dashboard/contacts/{id}',[ContactController::class,'update'])->name('contacts.update');
  });

require __DIR__.'/auth.php';
