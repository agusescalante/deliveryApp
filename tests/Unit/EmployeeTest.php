<?php

namespace Tests\Unit;
use App\Models\Employee;
use App\Models\User;
use App\Models\Order;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    // public function testUserEditOrder()
    // {
    //     $user = User::factory()->create();
    //     $order = Order::factory()->create(['user_id'=>$user->id]);


    //     $user = $order->user_id;

    //     $response = $this->actingAs($user)->put('orders/'.$order->id, 
    //     ['price' => '123.32', 
    //     'description' => 'Pizza Muzzarella x 1',
    //     'user_id' => $user,
    //     ]);
    //     $order = Order::first();
    //     $this->assertEquals($task->price, '123.32');
    //     $this->assertEquals($task->description, 'Pizza Muzzarella x 1');
    //     $this->assertEquals($task->user_id, $user->id);
    // }

    public function testOrder()
    {
        $employee = Employee::factory()->create();
        $order = Order::factory()->create(['employee_id' => $employee->id]);
        $this->assertEquals($employee->id, $order->employee->id);
    }

}