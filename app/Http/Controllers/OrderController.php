<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class OrderController extends Controller {
    public function index() {
        $user= Auth()->user();
        $orders = $user->orders;
        return view('order.order', compact('orders'));
    }
}