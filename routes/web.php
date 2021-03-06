<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Models\Company;
use App\Models\Contact;

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

/*
 * Admin Dashboard
 */
Route::get('/admin_dashboard', function () {
    return view('layouts.admin.admin_dashboard');
})->middleware(['auth'])->name('admin_dashboard');

Route::group(['middleware' => ['web']], function () {
/*
 *  CRUD For Company
 */
Route::get('admin_dashboard/companies',[CompanyController::class,'index'])->name('companies');
Route::post('admin_dashboard/companies/store',[CompanyController::class,'store'])->name('companies.store');
Route::post('admin_dashboard/companies/destroy',[CompanyController::class,'destroy'])->name('companies.destroy');
Route::post('admin_dashboard/companies/{id}',[CompanyController::class,'update'])->name('companies.update');
/*
 * CRUD For Contact Persons
 */
Route::get('admin_dashboard/contacts',[ContactController::class,'index'])->name('contacts');
Route::post('admin_dashboard/contacts/store',[ContactController::class,'store'])->name('contacts.store');
Route::post('admin_dashboard/contacts/destroy',[ContactController::class,'destroy'])->name('contacts.destroy');
Route::post('admin_dashboard/contacts/{id}',[ContactController::class,'update'])->name('contacts.update');
});

require __DIR__.'/auth.php';
