<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashClosureController;

Route::resource('caja', CashClosureController::class);
Route::get('charts',[CashClosureController::class,"chartSales"])->name('charts');
Route::get('cash/filter',[CashClosureController::class,"filterView"])->name('filter-view');
Route::post('cash/filter',[CashClosureController::class,"filter"])->name('filter');


Route::get("/print",function(){
    return view('print');
});