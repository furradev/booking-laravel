<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FirsthallController extends Controller {
    public function index() {
        return view('hall.firsthall')
            ->with('judul', 'Lapangan 1');
    }

    public function store(Request $r) {
        $x = array(
            'nama_pemesan' => $r->nama_pemesan,
            'nohp' => $r->nohp,
            'alamat' => $r->alamat,
            'start_booking' => $r->start_booking,
            'end_booking' => $r->end_booking,
            'jenis_lapangan' => $r->jenis_lapangan,
            'user_id' => $r->user_id,
        );

        $pesan = '';
        $rec =\DB::table('orders')
            ->where('id_firsthall', $r->id_firsthall)
            ->first();
        
            if($rec == null) {
                \DB::table('orders')
                    ->insertgetId($x);
            } else {
                $pesan = "Jadwal Sudah Terdaftar";
            }

            return redirect()->route('order.index')
                    ->with('pesan', $pesan);
    }

    public function edit($id_firsthall) {
        
        return view('hall.edit')
                ->with('judul', 'Edit Pesanan Anda')
                ->with('id_firsthall', $id_firsthall);
    }

    public function update(Request $r) {
        $x = array(
            'nama_pemesan' => $r->nama_pemesan,
            'nohp' => $r->nohp,
            'alamat' => $r->alamat,
            'start_booking' => $r->start_booking,
            'end_booking' => $r->end_booking,
            'jenis_lapangan' => $r->jenis_lapangan,
            'user_id' => $r->user_id,
        );

        $rec =\DB::table('orders')
            ->where('id_firsthall', $r->id_firsthall)
            ->update($x);

            return redirect()->route('order.index');
    }

    public function destroy($id_firsthall) {

        $del = \DB::table('orders')
                ->where('id_firsthall', $id_firsthall)
                ->delete();

                return redirect()->route('order.index')
                        ->with('id_firsthall', $id_firsthall);
    }
}