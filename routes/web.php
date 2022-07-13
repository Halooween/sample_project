<?php

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin'], function () {
//     Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// });

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix'=>'admin'], function() { 
    // Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard.index');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('backend.user.index');
    Route::get('/dashboard/create', [App\Http\Controllers\DashboardController::class, 'create'])->name('backend.user.create');
    Route::post('/dashboard/store', [App\Http\Controllers\DashboardController::class, 'store'])->name('backend.user.store');
    Route::get('/dashboard/show/{id}', [App\Http\Controllers\DashboardController::class, 'show'])->name('backend.user.show');
    Route::get('/dashboard/edit/{id}', [App\Http\Controllers\DashboardController::class, 'edit'])->name('backend.user.edit');
    Route::delete('/dashboard/destroy/{id}', [App\Http\Controllers\DashboardController::class, 'destroy'])->name('backend.user.destroy');

 
    // Route::get('/logout', [App\Http\Controllers\DashboardController::class, 'logout']);


    // route for role
    Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('backend.role.index');
    Route::get('/role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('backend.role.create');
    Route::post('/role/store', [App\Http\Controllers\RoleController::class, 'store'])->name('backend.role.store');
    Route::get('/role/show/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('backend.role.show');
    Route::get('/role/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('backend.role.edit');
    Route::delete('/role/destroy/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('backend.role.destroy');
    Route::post('/role/destroyAll', [App\Http\Controllers\RoleController::class, 'destroyAll'])->name('backend.role.destroyAll');

   // route for post
   Route::get('/post', [App\Http\Controllers\backend\PostController::class, 'index'])->name('backend.post.index');
   Route::get('/post/create', [App\Http\Controllers\backend\PostController::class, 'create'])->name('backend.post.create');
   Route::post('/post/store', [App\Http\Controllers\backend\PostController::class, 'store'])->name('backend.post.store');
   Route::get('/post/show/{id}', [App\Http\Controllers\backend\PostController::class, 'show'])->name('backend.post.show');
   Route::get('/post/edit/{id}', [App\Http\Controllers\backend\PostController::class, 'edit'])->name('backend.post.edit');
   Route::post('/post/update/{id}', [App\Http\Controllers\backend\PostController::class, 'update'])->name('backend.post.update');
   Route::delete('/post/destroy/{id}', [App\Http\Controllers\backend\PostController::class, 'destroy'])->name('backend.post.destroy');
});


Route::group(['middleware' => ['auth']], function() {
   
    Route::get('/logout', 'App\Http\Controllers\LogoutController@logout')->name('logout');
 });
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('index');

});

Route::group(['middleware' => ['auth', 'role:editor']], function() { 
    Route::get('/editor', [App\Http\Controllers\EditorController::class, 'index'])->name('index');
});


