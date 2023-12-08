<?php

use App\Http\Controllers\Dashboard\SettingController;
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
    return view('dashboard.index');
})->name('dashboard.index');

Route::group(['prefix'=>'dashboard','as'=>'dashboard.'],function(){


    Route::get('/setting', function (){
        return view('dashboard.settings');
    })->name('setting');

    Route::post('/setting/update',[SettingController::class,'update'])->name('setting.update');

});
