<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class OrderController extends Controller {
    public function index() {
        $user= Auth()->user();
        $orders = $user->orders()->whereIn('status', ['unverified', 'verified', 'rejected'])->get();
        $totalOrderPrice = $user->orders()->where('status', 'unverified')->sum('price');

        return view('order.order', compact('orders', 'totalOrderPrice'));
    }

    // public function order() {
    //     disini return viewny ke order.order lalu yang di filter dengan status unverified
    // }
}