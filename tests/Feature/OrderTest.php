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
        //El usuario que creo la order la puede editar

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
    
    public function testCanSeeDashboardAsUser()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
    }
    
    // public function testCanSeeOrderAsUser()
    // {
    //     $user = User::factory()->create(['role'=>'boss']);
    //     $order = Order::factory()->create();
    //     $employee = Employee::factory()->create();


    //     $response = $this->actingAs($user)
    //         ->put('orders.create',[
    //             'description'=>'Papas fritas',
    //             'price'=>'123.40',
    //             'received'=>false,
    //             'employee_id'=>$employee->id
    //         ]);
        

    //     $response->assertStatus(200);
    // }
    
    public function testViewMyOrders()
    {
    
        $user1 = User::factory()->create(['role'=>'user']);
        $user2 = User::factory()->create(['role'=>'user']);

        $order1 = Order::factory()->create(['user_id'=>$user1->id]);
        $order2 = Order::factory()->create(['user_id'=>$user2->id]);

        $response = $this->actingAs($user1)->get('orders');
        $this->assertEquals($user2->id,$order2->user->id);
        $response->assertSee($order1->description);
    }

    public function testNotViewOtherOrders()
    {
    
        $user1 = User::factory()->create(['role'=>'user']);
        $user2 = User::factory()->create(['role'=>'user']);

        $order1 = Order::factory()->create(['description'=>'Mayonesa Natura','user_id'=>$user1->id]);
        $order2 = Order::factory()->create(['user_id'=>$user2->id]);

        $response = $this->actingAs($user1)->get('orders');
        $this->assertEquals($user1->id,$order1->user->id);
        $response->assertDontSeeText($order2->description);
    
    }
}
