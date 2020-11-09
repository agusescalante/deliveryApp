<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Order;
use App\Models\Employee;
use Tests\TestCase;



class EmployeeTest extends TestCase
{



    public function testGuestCantCreateOrder()
    {
        $response = $this->get(route('employees.create'));
        $response->assertRedirect('login');
    }

    public function testNotEditEmployeeUser()
    {
        //Usuarios con role "user" no pueden crear ni editar en la seccion "Employee"
        
        $user = User::factory()->create(['role'=>'user']);
        $employee = Employee::factory()->create();
        $response = $this->actingAs($user)
            ->get('employees/'.$employee->id.'/edit');
        $response->assertForbidden();    
        
    }

    public function testNotCreateEmployeeUser()
    {
        //Usuarios con role "user" no pueden crear ni editar en la seccion "Employee"
        
        $user = User::factory()->create(['role'=>'user']);
        $employee = Employee::factory()->create();
        $response = $this->actingAs($user)
            ->get('employees/create');
        $response->assertForbidden();    
        
    }
    
    

}
