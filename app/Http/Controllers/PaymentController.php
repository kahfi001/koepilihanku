<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(Payment $py)
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
            'footer' => 'yes',
            "py" => $py
        ], compact('payment'));
    }

    public function updatePayment(Request $request)
    {
        $bukti = $request->file('bukti')->getClientOriginalName(); 
        $catatan = $request->input('catatan');
        $no_payment = $request->input('no_payment');
        $no_checkout = $request->input('no_checkout');
        $status = "Sedang diproses";

        $request->file('bukti')->storeAs('public/bukti-bayar', $bukti);

        DB::table('payments')
        ->where('no_payment', '=', $no_payment)
        ->update(['catatan' => $catatan, 'gambar' => $bukti, 'status' => $status]);

        DB::table('checkouts')
        ->where('no_checkout', '=', $no_checkout)
        ->update(['is_paid' => true]);

        return redirect()->intended('/success');

    }
}
