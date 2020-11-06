<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Order;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        
        $employees = Employee::all();
        $employee = Employee::with(['role'=>'boss']);
        $orders = Order::all();

        $search = $request->surname;
        if(($search != null) && !(is_int($search))){
            $employees = Employee::where('surname','LIKE','%'. $search .'%')
                                                    ->get();
            return view('employees.index',[
                'employees'=> $employees,'employee'=> $employee,'orders'=>$orders]);                                            
        }else{

        return view('employees.index',[
        'employees'=> $employees,'employee'=> $employee,'orders'=>$orders]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.create',[
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
        
        $request->validate([
            'name'=>'required',
            'email'=>'required'  
            // 'bord_date'=>'required'

        ]);

        $input = $request->all();

        Employee::create($input);
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit',[
            
                'employee'=> $employee
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $input = $request->all();

        $employee->update($input);
        return redirect('employees');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {

        $employee->delete();
        return redirect('employees');

    }
}
