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
Route::get("/",function (){
    return redirect()->route("dashboard.index");
});
Route::get('/register', function () {
    return \Inertia\Inertia::render("Authentication/signup",["logo"=>asset("images/saleblaze-logo.png")]);
});
Route::get("login",function(){
    return \Inertia\Inertia::render("Authentication/signin",["logo"=>asset("images/saleblaze-logo.png")]);
});
Route::get("/financial-report",function(){
    return view("report");
});
Route::post("/register","AuthenticationController@signup")->name("register");
Route::post("login","AuthenticationController@signin")->name("login");
Route::prefix("dashboard")->middleware("auth")->group(function(){
    Route::get("","DashboardController@index")->name("dashboard.index");
    Route::prefix("/inventory")->group(function(){
        Route::get("","InventoriesController@index");
        Route::post("/create","InventoriesController@create");
        Route::post("/record-purchase/{inventory}","InventoriesController@recordPurchase");
        Route::post("/add-unit/{inventory}","InventoriesController@addUnit");
    });
    Route::prefix("staff")->group(function(){
        Route::post('create',"StaffController@create");
        Route::get("","StaffController@index");
        Route::post("salary","StaffController@paySalary");
    });
    Route::prefix("loan")->group(function(){
        Route::post("/create","LoansController@create");
        Route::get("mark-as-paid/{loan}","LoansController@markAsPaid");
    });
    Route::prefix("purchases")->group(function(){
        Route::get("/","PurchasesController@index");
    });
    Route::get("/credit","LoansController@index");
});


