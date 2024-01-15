<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Order;
use App\Models\Checkout;

class CartController extends Controller
{
    public function index() {
        $user= Auth()->user();
        $orders = $user->orders()->where('status', 'pending')->get();

        $totalCurrentPrice = $user->orders()->where('price')->get();

        return view('order.cart', compact('orders', 'totalCurrentPrice'));
    }

    public function store(Request $r) {

        ddd($r);
        $dataValidate = $r->validate(['image' => 'image|mimes:png,jpg,jpeg|max:2048']);

        $selectedOrderId = $r->input('selectedOrderId');

        $imageChecking = $r->hasFile('image');
        $imageAccess = $r->file('image');
        if($imageChecking) {
            // $dataValidate['image'] = $imageAccess->store('bukti-pembayaran');
            $imagePath = $imageAccess->storeAs('bukti-pembayaran', $imageAccess->hashName());
            \DB::table('orders')
            ->where('id_order', $selectedOrderId)
            ->update(['image' => $imagePath, 'status' => 'unverified',]);
        }

        return redirect()->route('order.index');






        // $imageStatus = \DB::table('orders')
        //         ->whereNull('image')
        //         ->first();

        // if($imageStatus) {
        //     \DB::table('orders')
        //     ->where('id_order', $imageStatus->id)
        //     ->update($orderImage);
        //     return redirect()->route('cart.index');

        // } else {
        //     return redirect()->route('cart.index');
        // }




        // $user= Auth()->user();

        // $orderPending = \DB::Table('orders')
        //     ->where('user_id', $user_id)
        //     ->where('status', 'pending')
        //     ->get();

        //     if($orderPending->isNotEmpty()) {
        //         $x = array(
        //                 'image' => $r->image,
        //                 'user_id' => $user_id,
        //                 'order_id' => $r->order_id,
        //             );
                
        //         $rec =\DB::Table('checkout')
        //             ->insertGetId($x);
                
        //         \DB::Table('orders')
        //             ->where('user_id', $user_id)
        //             ->where('status', 'pending')
        //             ->update(['status' => 'unverified', 'checkout_id' => $rec]);
                    
        //             return redirect()->route('order.index');
        //         } else {
        //             return redirect()->route('cart.index'); 
        //         }       

        // $x = array(
        //     'image' => $r->image,
        //     'user_id' => $r->user_id,
        // );

        // $rec =\DB::table('checkout')
        //     ->where('id_checkout', $r->id_checkout)
        //     ->first();
        
        //     if($rec == null) {
        //         \DB::table('checkout')
        //             ->InsertGetId($x);
        //     } else {
        //         $pesan = "Nid Sudah Terdaftar";
        //     }

        //     return redirect()->route('order.index');
    }


}
