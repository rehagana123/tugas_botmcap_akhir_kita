<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Pinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LaporanController extends Controller
{
    //
    public function transaksiPdf(Request $request)
    {
        if (Auth::user()->role_id == 2) {
            return redirect('/pinjam')->with('fail', 'User tidak dapat akses download laporan pinjam buku!');
        }

        $q = Pinjam::query();

        $datas = $q->get();

        $pdf = PDF::loadView('pinjam.laporan', compact('datas'))->setPaper('a4', 'landscape');
        return $pdf->download('laporan_transaksi_' . date('Y-m-d_H-i-s') . '.pdf');
    }
}
