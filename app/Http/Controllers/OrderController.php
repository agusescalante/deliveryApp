<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $employees = Employee::all();
        $orders = Order::all();

        $userCurrent = User::find(Auth::user()->id); 

        $userRole= $request->user()->role;

        $pending = DB::table('orders')->where([['received', '=', '0'],
        ['user_id', '=', $userCurrent->id],
        ])->get()->count();

        $pendingTotal = DB::table('orders')->where([['received', '=', '0']])->get()->count();

         $pendingTotal;
        return view('orders.index',[
                'orders'=> $orders,'employees'=>$employees,
                'pending'=>$pending , 'userRole'=>$userRole , 'pendingTotal'=>$pendingTotal
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
        return view('orders.create',[
        'employees'=> $employees
        ]);
       //return view('orders.create');

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

        $request->validate([
            'description'=>'required',
            'employee_id'=>'required',  
            'price'=>'required'

        ]);

        $input = $request->all();
        $input['received'] = false;
        $input['user_id'] = $request->user()->id;

        Order::create($input);
        return redirect('orders');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $this->authorize('update',$order);
        $employees = Employee::all();
        return view('orders.edit',[
                    'order'=> $order,
                    'employees'=>$employees
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Order $order)
    {
        $this->authorize('update',$order);
        $input = $request->all();

        $order->update($input);
        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('orders');
    }
}
