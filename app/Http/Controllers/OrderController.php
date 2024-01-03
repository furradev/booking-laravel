<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller {
    public function index() {
        return view('order.order')
            ->with('judul', 'Pesanan Anda');
    }
}