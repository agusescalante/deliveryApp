<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderAPIController extends Controller
{
    public function index(Request $request){
        $order = Order::where('user_id', $request->user()->id)->get();
        return response()->json([$order]);

    }
}
