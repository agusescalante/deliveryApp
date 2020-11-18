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

    public function testUserRoleCantEditEmployee()
    {
        //Usuarios con role "user" no pueden crear ni editar en la seccion "Employee"
        
        $user = User::factory()->create(['role'=>'user']);
        $employee = Employee::factory()->create();
        $response = $this->actingAs($user)
            ->get('employees/'.$employee->id.'/edit');
        $response->assertForbidden();    
        
    }

    public function testUserRoleCantAddEmployee()
    {
        //Usuarios con role "user" no pueden crear ni editar en la seccion "Employee"
        
        $user = User::factory()->create(['role'=>'user']);
        $response = $this->actingAs($user)
            ->get('employees/create');
        $response->assertForbidden();    
        
    }

    public function testBossDestroyEmployee()
    {
        $user = User::factory()->create(['role' => 'boss']);
        $employee = Employee::factory()->create();
        $response = $this->actingAs($user)->delete('employees/'.$employee->id);
        $response = $this->actingAs($user)
                ->get('employees/'.$employee->id);
                $response->assertStatus(404);
        $employeeDelete = Employee::where('id','=',$employee->id);
        $this->assertEquals($employeeDelete->count(), 0);
    }
    
    public function testBossRoleCanEditEmployee()
    {
        $employee = Employee::factory()->create();
        $user = User::factory()->create(['role' => 'boss']);
        $response = $this->actingAs($user)->put('employees/'.$employee->id,
            [
                'name' => 'Name',
                'surname' => 'Surname',
                'email' => 'email@email.com',
                'born_date' => '2-12-1998'
            ]);
        $response->assertRedirect('employees');
        $employee = Employee::first();
        $this->assertNotEquals($employee->name, 'Name');
    }

}
