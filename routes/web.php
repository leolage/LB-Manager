<?php

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

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
});


Route::get('/login', 'App\Http\Controllers\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');

use App\Http\Controllers\DomainController;

Route::get('/add_domain_form', [DomainController::class, 'showAddDomainForm'])->name('add_domain_form');
Route::post('/add_domain', [DomainController::class, 'addDomain'])->name('add_domain');
Route::post('/delete_domain/{id}', [DomainController::class, 'deleteDomain'])->name('delete_domain');

Route::get('/edit_domain/{id}', [DomainController::class, 'showEditDomainForm'])->name('edit_domain_form');
Route::post('/update_domain/{id}', [DomainController::class, 'updateDomain'])->name('update_domain');


use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
	
	
});

//use Illuminate\Support\Facades\Route;

Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
