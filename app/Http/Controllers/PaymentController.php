<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $Uid = auth()->user()->id;
        $payment = DB::table('payments')
        ->where('id_user', '=', $Uid)
        ->where('status', '=', 'Belum Dibayar')
        ->orderBy('payments.id', 'desc')
        ->limit(1)
        ->get();

        return view('payment', [
            "tittle" => "Pembayaran",
            'footer' => 'yes'
        ], compact('payment'));
    }

    public function updatePayment(Request $request)
    {
        $bukti = $request->file('bukti')->getClientOriginalName(); 
        $catatan = $request->input('catatan');
        $no_payment = $request->input('no_payment');
        $status = "Sedang diproses";

        $request->file('bukti')->storeAs('public/bukti-bayar', $bukti);

        DB::table('payments')
        ->where('no_payment', '=', $no_payment)
        ->update(['catatan' => $catatan, 'gambar' => $bukti, 'status' => $status]);

        return redirect()->intended('/success');

    }
}
