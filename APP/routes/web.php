<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ToolsController;
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

Route::get('/', [IndexController::class, 'index'])->name('/');
Route::post('/signin', [IndexController::class, 'signin'])->name('signin');
Route::post('/signup', [IndexController::class, 'signup'])->name('signup');
Route::get('/logout', [IndexController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'tools', 'as' => 'tools'], function () {
    Route::get('/calculator', [ToolsController::class, 'calculator'])->name('.calculator');
    Route::get('/damage', [ToolsController::class, 'damage'])->name('.damage');
    Route::get('/wish', [ToolsController::class, 'wish'])->name('wish');
});

Route::get('/character/{label}', [CharacterController::class, 'index'])
    ->where('label', '[A-Za-z0-9]*')
    ->name('character');

Route::get('/resources', [IndexController::class, 'resources'])->name('resources');
