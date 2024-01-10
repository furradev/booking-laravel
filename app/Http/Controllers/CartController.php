<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $user= Auth()->user();
        $orders = $user->orders()->where('status', 'pending')->get();

        $totalPendingPrice = $user->orders()->where('status', 'pending')->sum('price');
        // $totalPrice = DB::Table('orders')
        // ->where('user_id', $user->id)
        // ->where('status', 'pending')
        // ->sum('price');

        return view('order.cart', compact('orders', 'totalPendingPrice'));

       
    }
}
