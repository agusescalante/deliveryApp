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

    
    

}
