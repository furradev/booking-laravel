<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SecondhallController extends Controller {
    public function index() {
        return view('hall.secondhall')
            ->with('judul', 'Lapangan 2');
    }

    public function store(Request $r) {
        $x = array(
            'nama_pemesan' => $r->nama_pemesan,
            'nohp' => $r->nohp,
            'alamat' => $r->alamat,
            'start_booking' => $r->start_booking,
            'end_booking' => $r->end_booking,
        );

        $pesan = '';
        $rec =\DB::table('secondhall')
            ->where('id_secondhall', $r -> id_secondhall)
            ->first();
        
            if($rec == null) {
                \DB::table('secondhall')
                    ->insertgetId($x);
            } else {
                $pesan = "Nim Sudah Terdaftar";
            }

            return view('order.order')
                    ->with('pesan', $pesan);
    }
}