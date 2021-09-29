<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarTransaksiController extends Controller
{

    public function index()
    {   

        $Uid = auth()->user()->id;

        $payment = DB::table('payments')
        ->where('id_user', '=', $Uid)
        ->where('status', '!=', 'Belum Dibayar')
        ->get();

        return view('daftar-transaksi', [
            "tittle" => "Daftar Transaksi",
            'footer' => 'yes',
        ], compact('payment'));
    }

    public function konfirmasiDiterima(Request $request)
    {
        $id = $request->input('id');
        DB::table('payments')
        ->where('id', $id)
        ->update(['status' => 'Paket Sudah diterima']);

        return redirect()->intended('/daftar-transaksi');
    }
}
