<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function tampil()
    {
        $user = DB::table('users')
                ->count('users.id');

        $produkTerjual = DB::table('payments')
                        ->join('detail_checkouts', 'detail_checkouts.no_checkout', '=', 'payments.no_checkout')
                        ->where('payments.status', '=', 'Sedang dikirim')
                        ->orWhere('payments.status', '=', 'Paket Sudah diterima')
                        ->sum('detail_checkouts.qty');
        
        $transaksiBerhasil = DB::table('payments')
                            ->where('payments.status', '=', 'Sedang dikirim')
                            ->orWhere('payments.status', '=', 'Paket Sudah diterima')
                            ->count('payments.id');

        $transaksiBelumdiKonfirmasi = DB::table('payments')
                                    ->where('payments.status', '=', 'Menunggu Konfirmasi')
                                    ->count('payments.id');

        $penghasilan = DB::table('payments')
        ->sum('payments.total');

        return view('admin/dashboard', [
            "tittle" => "Dashboard",
            'footer' => 'yes'
        ])->with('user', $user)
        ->with('produkTerjual', $produkTerjual)
        ->with('transaksiBerhasil', $transaksiBerhasil)
        ->with('transaksiBelumdiKonfirmasi', $transaksiBelumdiKonfirmasi)
        ->with('penghasilan', $penghasilan);
    }
}
