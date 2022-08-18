<?php

use App\Http\Controllers\CallLogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});
Route::get('/admin/logout' , [AdminController::class, 'destroy'])->name('admin.logout');

Route::middleware(['auth:admin'])->group(function (){

    Route::middleware(['auth:sanctum,admin', 'verified'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('backend.index');
        })->name('dashboard')->middleware('auth:admin');
    });

    Route::prefix('call-logs')->group(function (){
        Route::get('/view' , [CallLogController::class, 'view'])->name('all_call_logs');
        Route::post('/view/filter' , [CallLogController::class, 'filetLogsByDate'])->name('search_by_date');
    });

});



Route::middleware(['auth:sanctum', 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
