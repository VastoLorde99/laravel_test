<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('main');
// });
Route::get('/', [PostController::class, 'index']);
Route::post('/msg', [PostController::class, 'store']);

Route::delete('/delete', [PostController::class, 'delete']);

Route::get('/debug', [PostController::class, 'debug']);

Route::put('/update', [PostController::class, 'update']);

Route::post('/up', [UserController::class, 'store']);
Route::post('/in', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
