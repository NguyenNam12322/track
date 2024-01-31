<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class Homecontroller extends Controller
{
    public function index()
    {
        $order = Order::select('id', 'name', 'created_at', 'total_price')->where('active', 0)->get();
        return view('home.index', compact('order'));
    }
}
