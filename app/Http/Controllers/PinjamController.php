<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pinjam;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use DateTime;
use DateTimeZone;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinjamController extends Controller
{
    public function index()
    {
        $dataPinjam = [];

        // Untuk bagian admin - tampilkan semua data pinjam
        if (Auth::user()->role_id == 1) {
            $dataPinjam = Pinjam::all();

            // denda
            foreach ($dataPinjam as $value) {
                $tanggalPinjam = strtotime($value->tanggal_pinjam);
                $tanggalKembali = strtotime($value->tanggal_kembali);

                if ($tanggalKembali < $tanggalPinjam) {
                    $dendaHari = floor(($tanggalPinjam - $tanggalKembali) / 86400);
                    $totalDenda = $dendaHari * 2000;
                    Pinjam::where('id', $value->id)->update(['denda' => $totalDenda]);
                } else {
                    Pinjam::where('id', $value->id)->update(['denda' => 0]);
                }
            }
        }

        // Untuk bagian user / guset - tampilkan saja data pinjam untuk user / guest tersebut
        if (Auth::user()->role_id == 2) {
            $dataPinjam = Pinjam::where('users_id', '=', Auth::user()->id)
                ->get();
        }

        // di view jika id yang login == id yang pinjam buku, button balik buku ada

        return view('pinjam.index', compact('dataPinjam'));
    }

    public function add($id)
    {
        if (Auth::user()->role_id != 2) {
            return redirect('/data')->with('fail', 'Admin tidak bisa pinjam buku!');
        }

        $buku = Buku::findOrFail($id);

        $pinjam = Pinjam::where('users_id', '=', Auth::user()->id)
            ->get();

        if (count($pinjam) >= 3) {
            return redirect('/data')->with('fail', 'Buku yang anda pinjam tidak boleh lebih dari 3 buku!');
        }

        foreach ($pinjam as $list) {
            if ($list->buku_id == $buku->id) {
                return redirect('/data')->with('fail', 'Buku yang anda pinjam tidak boleh pinjam buku yang sama!');
            }

           
        }

        if ($buku->jumlah_buku <= 0) {
            return redirect('/data')->with('fail', 'Buku yang anda pinjam sudah tidak tersedia!');
        }

        $kodePinjam = rand(0, 1000);

        $date = Carbon::create(new DateTime("now", new DateTimeZone('Asia/Jakarta')));
        $dataPinjam = Pinjam::create([
            'kode_pinjam' => "PJ-{$buku->kode_buku}-{$kodePinjam}",
            'tanggal_pinjam' => new DateTime("now", new DateTimeZone('Asia/Jakarta')),
            'tanggal_kembali' => $date->addDay(7), // seminggu setelah pinjam
            'denda' => 0,
            'users_id' => Auth::user()->id,
            'buku_id' => $buku->id
        ]);

        Buku::where('id', $buku->id)
            ->update(
                [
                    'jumlah_buku' => $buku->jumlah_buku - 1,
                ],
            );

        return redirect('/pinjam')->with('sukses', 'Buku Berhasil dipinjam!');
    }


    public function kembali($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $buku = Buku::findOrFail($pinjam->buku_id);

        Buku::where('id', $buku->id)
            ->update(
                [
                    'jumlah_buku' => $buku->jumlah_buku + 1,
                ],
            );

        Pinjam::where('id', $id)->delete();

        return redirect('/pinjam')->with('sukses', 'Buku Berhasil dikembalikan!');
    }
}
