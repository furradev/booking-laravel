<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $orderMultiple = \DB::Table('orders')
                ->whereIn('status', ['pending', 'unverified', 'verified'])
                ->orderBy('start_booking', 'asc')
                ->get();
        
                return view('layouts.dashboard', compact('orderMultiple'));
    }
}
