<?php

namespace Tests\Feature;

use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order;

class OrderApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
  
 
    public function test_user_can_read_assigned_order()
    {
       $user= User::factory()->create();
       $order = Order::factory()->create(['user_id'=>$user->id]);
        $response = $this->actingAs($user)->getJson('/api/orders');
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment([
            "user_id" => $user->id
        ]);
        $response->assertJsonFragment([
            "description" => $order->description
        ]);
    }
    


    public function test_user_cant_read_unassigned_order()
    {
          $orderuser = User::factory()->create();
        $order  = Order::factory()->create(
            [
                "user_id" =>  $orderuser->id
            ]
        );

        $apiUser = User::factory()->create();

        $response = $this->actingAs( $apiUser)->getJson('/api/orders');
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonMissing([
            "description" => $order->description
        ]);
    }
}


//new  test

