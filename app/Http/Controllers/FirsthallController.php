<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;



class FirsthallController extends Controller {
    public function index() {
        return view('hall.firsthall')
            ->with('judul', 'Lapangan 1');
    }

    public function store(Request $r) {
        $startBooking = Carbon::parse($r->input('start_booking'));
        $endBooking = Carbon::parse($r->input('end_booking'));

        $convertToMinutes = $endBooking->diffInMinutes($startBooking);
        $pricePerMinutes = 583.33;

        $totalPrice = $convertToMinutes * $pricePerMinutes;

        $x = array(
            'nama_pemesan' => $r->nama_pemesan,
            'nohp' => $r->nohp,
            'alamat' => $r->alamat,
            'start_booking' => $startBooking,
            'end_booking' => $endBooking,
            'jenis_lapangan' => $r->jenis_lapangan,
            'price' => $totalPrice,
            'user_id' => $r->user_id,
        );


        $filteredOrder = \DB::Table('orders')
			->where('jenis_lapangan', $r->jenis_lapangan)
			->where(function($query) use ($startBooking, $endBooking) {
                $query->whereBetween('start_booking', [$startBooking, $endBooking])
                      ->orWhereBetween('end_booking', [$startBooking, $endBooking]);
                })
            ->first();
        
            if($filteredOrder == null) {
                DB::Table('orders')
                    ->insertgetId($x);
                return redirect()->route('cart.index')->with('sukses', 'Jadwal Berhasil Disimpan');        
            } else {
                return redirect()->route('firsthall.index')->with('pesan', 'Maaf jadwal sudah terdaftar, silahkan menggunakan jadwal yang lain.');
            }
    }

    public function edit($id_order) {
        
        return view('hall.edit')
                ->with('judul', 'Edit Pesanan Anda')
                ->with('id_order', $id_order);
    }

    public function update(Request $r) {
        $startBooking = Carbon::parse($r->input('start_booking'));
        $endBooking = Carbon::parse($r->input('end_booking'));

        $convertToMinutes = $endBooking->diffInMinutes($startBooking);
        $pricePerMinutes = 583.33;

        $totalPrice = $convertToMinutes * $pricePerMinutes;


        $x = array(
            'nama_pemesan' => $r->nama_pemesan,
            'nohp' => $r->nohp,
            'alamat' => $r->alamat,
            'start_booking' => $startBooking,
            'end_booking' => $endBooking,
            'jenis_lapangan' => $r->jenis_lapangan,
            'price' => $totalPrice,
            'user_id' => $r->user_id,
        );

        $rec =\DB::table('orders')
            ->where('id_firsthall', $r->id_firsthall)
            ->update($x);

            return redirect()->route('cart.index');
    }

    public function destroy($id_order) {

        $del = \DB::table('orders')
                ->where('id_order', $id_order)
                ->delete();

                return redirect()->route('cart.index')
                        ->with('id_order', $id_order);
    }
}