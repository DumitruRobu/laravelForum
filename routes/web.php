<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AllControllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [App\Http\Controllers\HomeController::class, "index"])->name("MainController.main");
//Route::get('/', 'App\Http\Controllers\AllControllers\IndexController')->name("MainController.main");

Route::group(['namespace' => 'App\Http\Controllers\AllControllers'], function(){


    Route::get('/items', 'DisplayItemsController')->name("MainController.items");
    Route::get('/items/{id}', 'DisplayItemController')->name("MainController.displayItem");
    Route::get('/items/{idElDeEditat}/edit', 'EditItemController')->name("MainController.editItem");
    Route::post('/items/{idElDeEditat}/edit', 'EditamFinalController')->name("MainController.editamFinal");

    //Create routes:
    Route::get('/create', 'CreateController')->name("MainController.create");
    Route::post('/items', 'StoreController')->name("MainController.store");
//Delete routes:
    Route::get('/delete/{idElDeSters}', 'DestroyController')->name("MainController.deleteItem");
//Show all moderators:
    Route::get('/moderators', 'ShowAllModeratorsController')->name("MainController.showAllModerators");
    Route::get('/admins', 'ShowAllAdminsController')->name("ShowAllModeratorsController.showAllAdmins");

    Auth::routes();

    //    Route::get('/home', 'IndexController')->name('home');

});

//Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
//    Route::group(['namespace' => 'Users'], function () {
//        Route::get('/users', 'IndexController')->name('admin.users.index');
//    });
//});
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware'=>'admin'], function () {
    Route::group(['namespace' => 'Users'], function () {
        Route::get('/users', 'IndexController')->name('admin.users.index');
    });
});//asta e admin/users page

//Route::get('/admin', 'AdminController')->name("admin.main");


//Route::get('/', [MainController::class, 'main'])->name("MainController.main");
//Route::get('/items', [MainController::class, 'displayItems'])->name("MainController.items");
//Route::get('/items/{id}', [MainController::class, 'displayItem'])->name("MainController.displayItem");
//Route::get('/items/{idElDeEditat}/edit', [MainController::class,'editItem'])->name("MainController.editItem");
//Route::post('/items/{idElDeEditat}/edit', [MainController::class,'editamFinal'])->name("MainController.editamFinal");
//
//Route::get('/create', [MainController::class,'create'])->name("MainController.create");
//Route::post('/items/create', [MainController::class,'store'])->name("MainController.store");
//
//Route::get('/delete/{idElDeSters}', [MainController::class,'destroy'])->name("MainController.deleteItem");
////Show all moderators:
//Route::get('/moderators', [MainController::class,'showAllModerators'])->name("MainController.showAllModerators");
//Auth::routes();
//Route::get('/home', [MainController::class,'home'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
