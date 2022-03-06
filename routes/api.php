<?php

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('submit-form', [HomeController::class, 'store']);
Route::get('users', [HomeController::class, 'getUsers']);
Route::get('user/edit/{id}', [HomeController::class, 'indexById']);
Route::post('user/update/{id}', [HomeController::class, 'update']);
