<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
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
Route::get('/test',function(){
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
})->name('dashboard.index');

Route::group(['prefix'=>'dashboard','as'=>'dashboard.','middleware'=>['auth','CheckUser']],function(){

    // Route::get('/', [SettingController::class,'index'])->name('index');
    Route::get('/home', function(){
        return view('dashboard.index');
    })->name('index');


    Route::get('/setting', [SettingController::class,'edit'])->name('setting');

    Route::post('/setting/update/{setting}',[SettingController::class,'update'])->name('setting.update');

    Route::get('/users/all',[UserController::class,'getUserDataTable'])->name('users.all');
    Route::post('/users/delete',[UserController::class,'delete'])->name('users.delete');
    Route::get('/users/addUser',[UserController::class,'addUser'])->name('users.addUser');


    Route::get('/category/all',[CategoryController::class,'getCategoriesDataTable'])->name('category.all');
    Route::post('/category/delete',[CategoryController::class,'delete'])->name('category.delete');

    Route::resources([
        'users' => UserController::class,
        'category' => CategoryController::class,
    ]);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
