<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use App\Models\TempatWisata;
use DateTime;
use Illuminate\Http\Request;

class LaporanController extends Controller {
  public function index() {
    $jkPengunjung = Pengunjung::selectRaw('count(*) as total, jenis_kelamin')->groupBy('jenis_kelamin')->get();
    $laporanBulanan = Pengunjung::selectRaw('count(*) as total, MONTH(tgl_berkunjung) as bulan, YEAR(tgl_berkunjung) as tahun')->orderByRaw('tahun ASC, bulan ASC')->groupByRaw('bulan, tahun')->get();
    $laporanBulanan = $laporanBulanan->map(function ($item) {
      $bulan = DateTime::createFromFormat('!m', $item->bulan);
      $item->label = $bulan->format('F') . ' ' . $item->tahun;
      return $item;
    });
    $tahunBuka = TempatWisata::selectRaw('count(*) as total, tahun_buka')->orderBy('tahun_buka', 'asc')->groupBy('tahun_buka')->get();

    return view('laporan', [
      'jkPengunjung' => $jkPengunjung,
      'laporanBulanan' => $laporanBulanan,
      'tahunBuka' => $tahunBuka
    ]);
  }
}
