<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*

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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Auth::routes(['register'=> false]);


Route::resource('requests','App\Http\Controllers\RequestsController');

Route::get('/edit_request/{id}', 'App\Http\Controllers\RequestsController@edit');

Route::get('/Status_show/{id}', 'App\Http\Controllers\RequestsController@show')->name('Status_show')   ;

Route::post('/Status_Update/{id}', 'App\Http\Controllers\RequestsController@Status_Update')->name('Status_Update');


Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    // Route::resource('roles', 'App\Http\Controllers\RoleController');

    Route::resource('users', App\Http\Controllers\UserController::class);

});





Route::get('/{page}', 'App\Http\Controllers\AdminController@index');




