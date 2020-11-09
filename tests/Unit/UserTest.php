<?php

namespace Tests\Unit;
use Illuminate\Support\Facades\Schema;
use App\Models\Employee;
use App\Models\User;
use App\Models\Order;
use Tests\TestCase;

class UserTest extends TestCase
{
    
    public function testIsBoss()
    {
        $user = User::factory()->create(['role' => 'boss']);
        $userIsBoss =$user->isBoss();
        $this->assertTrue($userIsBoss);
    }

    public function testIsNotBoss()
    {
        $user = User::factory()->create(['role' => 'user']);
        $userIsBoss =$user->isBoss();
        $this->assertFalse($userIsBoss);
    }

    public function testUserNotBossEdit()
    {
        $user = User::factory()->create(['role' => 'user']);
        $employee = Employee::factory()->create();
        $response = $this->actingAs($user)->put('employees/'.$employee->id);
        $response->assertForbidden();
    }

    public function testUserNotBossCreate()
    {
        $user = User::factory()->create(['role' => 'user']);
        $employee = Employee::factory()->create();
        $response = $this->actingAs($user)->get('employees/create');
        $response->assertForbidden();
    }

    public function testUsersDatabaseHasColumns()
    {
        $this->assertTrue( 
          Schema::hasColumns('users', [
            'id', 'name', 'role', 'last_name', 'created_at', 'email', 'email_verified_at', 'password'
        ]));
    }

}