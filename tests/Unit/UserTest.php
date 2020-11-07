<?php

namespace Tests\Unit;
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

    public function testUserNotBossCreate()
    {
        $user = User::factory()->create(['role' => 'user']);
        $employee = Employee::factory()->create();
        $response = $this->actingAs($user)->put('employees/'.$employee->id);
        $response->assertForbidden();
    }

}