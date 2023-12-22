<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\SettingController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [PostController::class, 'index']);
Route::get('settings', [SettingController::class, 'index']);
Route::get('/category', [CategoryController::class, 'navbarCategories']);
