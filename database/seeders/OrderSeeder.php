<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $employee = Employee::where('name','Tomas')->first();

       $order = Order::create([
           'price'=>'230.50',
           'description'=>'Papas Lays',
           'received'=>'false'
       ]);

       $order->employee()->associate($employee)->save();
    }
}
