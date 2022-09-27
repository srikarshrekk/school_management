<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;


use App\Http\Controllers\backend\ProfileController;

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

// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');

//User Management

route::prefix('users')->group(function(){
    route::get('/view',[UserController::class,'userview'])->name('user.view');
    route::get('/add',[UserController::class,'useradd'])->name('user.add');
    route::post('/store',[UserController::class,'userstore'])->name('user.store');
    route::get('/edit/{id}',[UserController::class,'useredit'])->name('user.edit');
    route::post('/update/{id}',[UserController::class,'userupdate'])->name('user.update');
    route::get('/delete/{id}',[UserController::class,'userdelete'])->name('user.delete');


});

//profile management
route::prefix('profile')->group(function(){
    route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
    route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('profile.edit');
    route::post('/store',[ProfileController::class,'ProfileStore'])->name('profile.store');
    route::get('/password_view',[ProfileController::class,'ProfilePasswordview'])->name('password.view');
    route::post('/password_update',[ProfileController::class,'ProfilePasswordupdate'])->name('password.update');


});