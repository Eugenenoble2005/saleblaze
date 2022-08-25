<?php

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

Route::get('/register', function () {
    return \Inertia\Inertia::render("Authentication/signup",["logo"=>asset("images/saleblaze-logo.png")]);
});
Route::get("login",function(){
    return \Inertia\Inertia::render("Authentication/signin",["logo"=>asset("images/saleblaze-logo.png")]);
});
Route::post("/register","AuthenticationController@signup")->name("register");
Route::post("login","AuthenticationController@signin")->name("login");
Route::prefix("dashboard")->middleware("auth")->group(function(){
    Route::get("","DashboardController@index")->name("dashboard.index");
    Route::prefix("/inventory")->group(function(){
        Route::get("","InventoriesController@index");
        Route::post("/create","InventoriesController@create");
    });
    Route::prefix("staff")->group(function(){
        Route::get('create',"StaffController@create");
    });
    Route::get("/staff","DashboardController@staff");
    Route::get("/credit","DashboardController@credit");


});


