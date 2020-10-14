<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Order;
use Illuminate\Http\Request;

class MainUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $orders = Order::all();
        // $countTotal = $orders->groupBy('employee_id');
        $countTotal = Order::groupBy('employee_id')
        ->selectRaw('count(*) as total, employee_id')
        ->get();
        return view('welcome',[
        'orders'=> $orders,'employees'=>$employees,'countTotal'=>$countTotal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $orders = Order::all();
        return view('mainuser.details',[
        'employees'=> $employees,'orders'=>$orders
        ]);
    }
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $employees = Employee::all();
        $orders = Order::all();
        return view('mainuser.details',[
        'employees'=> $employees,'orders'=>$orders
        ]);
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function show(MainUser $mainUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function edit(MainUser $mainUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainUser $mainUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainUser $mainUser)
    {
        //
    }
}
