<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Schema;
use App\Models\Employee;
use App\Models\User;
use App\Models\Order;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    public function testOrder()
    {
        $employee = Employee::factory()->create();
        $order = Order::factory()->create(['employee_id' => $employee->id]);
        $this->assertEquals($employee->id, $order->employee->id);
    }

    public function testEmployeesDatabaseHasColumns()
    {
        $this->assertTrue( 
          Schema::hasColumns('employees', [
            'id', 'name', 'surname', 'created_at', 'email', 'born_date'
        ]));
    }

}