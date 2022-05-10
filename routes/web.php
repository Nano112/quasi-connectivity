<?php

use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', function() {
    return view('mainpage');
})->name('home');


Route::group(['prefix' => 'admin'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::resource('users', UserController::class, [
            'names' => [
                'index' => 'admin.users.index',
                'show' => 'admin.user.show',
                'create' => 'admin.user.create',
                'edit' => 'admin.user.edit',
                'destroy' => 'admin.user.destroy',
            ]
        ]);
    });
});

