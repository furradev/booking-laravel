<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class OrderController extends Controller {
    public function index() {
        $user= Auth()->user();
        $orders = $user->orders;

        $totalPrice = DB::Table('orders')
        ->where('user_id', $user->id)
        ->sum('price');

        return view('order.order', compact('orders', 'totalPrice'));
    }
}