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
        // $dataValidate['image'] = $imageAccess->store('bukti-pembayaran');
        $dataValidate = $r->validate(['image' => 'image|mimes:png,jpg,jpeg|max:2048']);
        
        $selectedOrderId = $r->input('selectedOrderId');

        $imageAccess = $r->file('image');
        if($r->hasFile('image')) {

            try {
                $imagePath = $imageAccess->storeAs('bukti-pembayaran', $imageAccess->hashName());
                \DB::table('orders')
                ->where('id_order', $selectedOrderId)
                ->update(['image' => $imagePath, 'status' => 'unverified',]);
    
                return redirect()->route('order.index');
            } catch(\Exception $e) {
                return redirect()->route('cart.index')->withErrors(['image' => 'Format gambar tidak sesuai!']);
            }
        } 

        return redirect()->route('cart.index')->withErrors(['image' => 'Gambar belum diupload!']);

    }


}
