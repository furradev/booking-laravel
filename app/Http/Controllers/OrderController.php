<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class OrderController extends Controller {
    public function index() {
        $user= Auth()->user();
        $orders = $user->orders()->whereIn('status', ['unverified', 'verified', 'rejected', 'finished'])->orderBy('id_order', 'desc')->get();
        $totalOrderPrice = $user->orders()->where('status', 'unverified')->sum('price');

        return view('order.order', compact('orders', 'totalOrderPrice'));
    }

    public function destroy($id_order) {
        $dbImg = \DB::Table('orders')
                        ->where('id_order', $id_order)->first();
                        
         if ($dbImg && $dbImg->image !== null) {
            Storage::delete($dbImg->image);
        }

        $del = \DB::table('orders')
                ->where('id_order', $id_order)
                ->delete();
        // Storage::delete(\DB::Table('orders')->where('id_order', $id_order)->where('image')->get());
                return redirect()->route('order.index');
    }
}