<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        $user= Auth()->user();
        $orders = $user->orders()->get();
        $getOrderData = \DB::Table('orders')->get();
        $totalOrder = \DB::Table('orders')->count();
        $totalUser = \DB::Table('users')->count();

        $orderRejected = \DB::Table('orders')
            ->where('status', 'rejected')->get();

        $orderVerified = \DB::Table('orders')
            ->where('status', 'verified')->get();

        $orderMultiple = \DB::Table('orders')
                ->whereIn('status', ['pending', 'unverified'])
                ->get();

        return view('layouts.adminpanel', compact('getOrderData', 'totalOrder', 'totalUser', 'orderRejected', 'orderVerified', 'orderMultiple'));
    }

    public function edit($id_order) {
        $rec =\DB::table('orders')
        ->where('id_order', $id_order)
        ->update(['status' => 'rejected',
                  'start_booking' => '00:00',
                  'end_booking' => '00:00' ]);

        return redirect()->route('admin.index');
    }

    public function show($id_order) {
        $rec =\DB::table('orders')
        ->where('id_order', $id_order)
        ->update(['status' => 'verified']);

        return redirect()->route('admin.index');
    }
}
