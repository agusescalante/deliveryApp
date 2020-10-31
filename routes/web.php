<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use App\Models\Order;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('details', function () {
        $employees = Employee::all();
        $orders = Order::all();
        return view('details',[
        'orders'=> $orders,'employees'=>$employees
        ]);
})->name('details');


Route::get('/', function () {
        $employees = Employee::all();
        $orders = Order::all();
        return view('welcome',[
        'orders'=> $orders,'employees'=>$employees
        ]);
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::resource('orders',OrderController::class);
    Route::resource('employees',EmployeeController::class);
    
 });
