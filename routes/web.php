<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use App\Models\Order;
use App\Models\User;


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


Route::get('details', function () {
        $employees = Employee::paginate(10);
        $orders = Order::all();
        $users = DB::table('users')->count();

        return view('details',[
        'orders'=> $orders,'employees'=>$employees,'users'=>$users
        ]);
})->name('details');


Route::get('/', function () {
        
        $users = DB::table('users')->count();
        
        $employees = Employee::all();
       

        $orders = Order::all();
        return view('welcome',[
        'orders'=> $orders,'employees'=>$employees, 'users'=>$users
        ]);
})->name('welcome');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::resource('orders',OrderController::class);

    Route::resource('employees',EmployeeController::class);

    Route::get('/user', function () {
                $users = DB::table('users')
                        ->join('orders', function ($join) {
                                $join->on('users.id', '=', 'orders.user_id')
                                        ->groupBy('orders.user_id')->get();  

        return view('user',['users'=>$users]);
    })->name('user');
    });

});