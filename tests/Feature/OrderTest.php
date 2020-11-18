<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
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
            ->get('/orders');

        $response->assertStatus(200);
    }
    
    public function testCanSeeOrderAsUser()
    {
        $user = User::factory()->create(['role'=>'boss']);
        $employee = Employee::factory()->create();


        $response = $this->actingAs($user)
                    ->post('orders',[
                            'description'=>'Papas fritas',
                            'price'=>'123.40',
                            'received'=>false,
                            'employee_id'=>$employee->id
                    ]);
        

        // $response->assertRedirect('/orders');
        $response = $this->get('/orders');
        $response->assertSee('Papas fritas');
    }
    
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

    public function testCanCreateOrders()
    {
    
        $user1 = User::factory()->create(['role'=>'user']);
        $user2 = User::factory()->create(['role'=>'boss']);

        $response = $this->actingAs($user1)->get('orders/create');
        $response->assertSee('Create new order');
        $response = $this->actingAs($user2)->get('orders/create');
        $response->assertSee('Create new order');
    }

    public function testDestroyOrder()
    {
        $user = User::factory()->create(['role' => 'boss']);
        $order = Order::factory()->create();
        $response = $this->actingAs($user)->delete('orders/'.$order->id);
        $response = $this->actingAs($user)
                ->get('orders/'.$order->id);
                $response->assertStatus(404);
        $orderDelete = Order::where('id','=',$order->id);
        $this->assertEquals($orderDelete->count(), 0);
    }
}
