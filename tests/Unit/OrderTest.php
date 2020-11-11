<?php

namespace Tests\Unit;
use App\Models\Employee;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{

    public function testEmployee()
    {
        $employee = Employee::factory()->create();
        $order = Order::factory()->create(['employee_id' => $employee->id]);
        $this->assertEquals($employee->id, $order->employee->id);
    }

    public function testUser()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id'=>$user->id]);
        $order2 = Order::factory()->create(['user_id'=>$user->id]);        
        $this->assertEquals($user->id,$order->user->id);
        $this->assertEquals($user->id,$order2->user->id);

    }

    public function testOrdersDatabaseHasColumns()
    {
        $this->assertTrue( 
          Schema::hasColumns('orders', [
            'id', 'description', 'price', 'employee_id', 'created_at', 'user_id', 'received'
        ]), 1);
    }

}