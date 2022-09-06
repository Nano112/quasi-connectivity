<?php

use App\Models\Post;
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

Route::get('/help', function() {
    return view('mainpage', ['post' => false]);
})->name('help');

Route::get('/json-dump', function(){
    $posts = Post::all();
    return response()->json($posts);
})->name('json-dump');


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

