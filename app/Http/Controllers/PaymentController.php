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

    public function konfirmPayment()
    {
        return view('admin.pembayaran', [
            "tittle" => "Konfirmasi Pembayaran",
            "footer" => 'yes',
            "pay" => Payment::latest()->where('status', 'Menunggu Konfirmasi')->paginate(10)
        ]);
    }

    public function detailPayment(Payment $payment)
    {
        $detail = DB::table('payments')
        ->join('detail_checkouts', 'payments.no_checkout', '=', 'detail_checkouts.no_checkout')
        ->join('products', 'products.id', '=', 'detail_checkouts.product_id')
        ->select('detail_checkouts.id', 'products.gambar', 'detail_checkouts.nama_produk', 'detail_checkouts.qty', 'detail_checkouts.harga')
        ->where('payments.no_payment', $payment->no_payment)
        ->get();

        return view('admin/detail-pembayaran', [
            "tittle" => "Detail Pembayaran",
            "footer" => "yes",
            "payment" => $payment
        ])->with('detail', $detail);
    }

    public function updateKonfirmasiPembayaran(Request $request)
    {
        $idUser = $request->input('idUser');
        $id = $request->input('id');

        DB::table('payments')
        ->where('id', $id)
        ->update(['status' => 'Sedang dikirim', 'approve_by' => $idUser]);

        return redirect()->intended('/konfirmasi-pembayaran');
    }

    public function updatePayment(Request $request)
    {
        $bukti = $request->file('bukti')->getClientOriginalName(); 
        $catatan = $request->input('catatan');
        $no_payment = $request->input('no_payment');
        $no_checkout = $request->input('no_checkout');
        $status = "Menunggu Konfirmasi";

        $request->file('bukti')->storeAs('public/bukti-bayar', $bukti);

        DB::table('payments')
        ->where('no_payment', '=', $no_payment)
        ->update(['catatan' => $catatan, 'gambar' => $bukti, 'status' => $status]);

        DB::table('checkouts')
        ->where('no_checkout', '=', $no_checkout)
        ->update(['is_paid' => true]);

        return redirect()->intended('/success');

    }

    public function indexTransaksi()
    {
        $payment = DB::table('payments')
                    ->join('users', 'users.id', '=', 'payments.approve_by')
                    ->where('payments.status', '!=', 'Menunggu Konfirmasi')
                    ->paginate(20);
        
        return view('admin.transaksi', [
            'tittle' => 'Rekap Transaksi',
            'footer' => 'yes'
        ])->with('payment', $payment);
    }
}
