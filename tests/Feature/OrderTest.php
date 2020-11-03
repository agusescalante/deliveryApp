<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Order;
use App\Models\Employee;
use Tests\TestCase;



class OrderTest extends TestCase
{



    public function testGuestCantCreateOrder()
    {
        $response = $this->get(route('orders.create'));
        $response->assertRedirect('login');
    }


    public function testEditOrderUser()
    {
        //El usuario que creo la orden la puede editar

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id'=>$user->id]);
        $response = $this->actingAs($user)
            ->get('orders/'.$order->id.'/edit');
        $response->assertSee('Edit order');      
    }

    public function testNotEditOrderUser()
    {
        //Usuario que no creo el pedidio o no no tiene role "boss" no puede editar
        
        $user = User::factory()->create();
        $order = Order::factory()->create();
        $response = $this->actingAs($user)
            ->get('orders/'.$order->id.'/edit');
        $response->assertForbidden();    
        
    }
    
    public function testCasSeeDashboardAsUser()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
    }

    

}
