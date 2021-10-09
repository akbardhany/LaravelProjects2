<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentsController;
 
Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('search', [ContentsController::class, 'search']);
//Route::get('/livesearcha', [AuthController::class, 'selectSearch']);
// Route::get('/contents/action', 'AuthController@selectSearch')->name('selectSearch');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
 
Route::group(['middleware' => 'auth'], function () {
 
    // Route::get('admin', [AdminController::class, 'index'])->name('admin');
    // Route::post('/admin/store', [AdminController::class, 'store']);
    Route::resource('admin', ContentsController::class);
    Route::get('admin/delete/{id}', [ContentsController::class, 'destroy']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
});