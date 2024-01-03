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
        );

        $pesan = '';
        $rec =\DB::table('firsthall')
            ->where('id_firsthall', $r -> id_firsthall)
            ->first();
        
            if($rec == null) {
                \DB::table('firsthall')
                    ->insertgetId($x);
            } else {
                $pesan = "Nim Sudah Terdaftar";
            }

            return view('order.order')
                    ->with('pesan', $pesan);
    }
}