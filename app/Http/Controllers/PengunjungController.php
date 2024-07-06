<?php

namespace App\Http\Controllers;

use App\Exports\PengunjungExport;
use App\Http\Requests\PengunjungRequest;
use App\Models\Pengunjung;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Browsershot\Browsershot;

class PengunjungController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request) {
    $pengunjung = Pengunjung::latest();

    if ($request->has('search')) {
      $pengunjung = $pengunjung
        ->where('kode', 'like', '%' . $request->search . '%')
        ->orWhere('no_ktp', 'like', '%' . $request->search . '%')
        ->orWhere('nama', 'like', '%' . $request->search . '%')
        ->orWhere('alamat', 'like', '%' . $request->search . '%')
        ->orWhere('tgl_berkunjung', 'like', '%' . $request->search . '%');
    }

    return view('pengunjungs.index', [
      'pengunjungs' => $pengunjung->paginate(10),
      'kode' => Pengunjung::generateKode(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PengunjungRequest $request) {
    $data = $request->validated();

    Pengunjung::create($data);
    return redirect('/pengunjungs')->with('alert', [
      'type' => 'success',
      'message' => 'Data pengunjung berhasil disimpan',
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Pengunjung $pengunjung) {
    return response()->json($pengunjung);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PengunjungRequest $request, Pengunjung $pengunjung) {
    $data = $request->validated();

    $pengunjung->update($data);
    return redirect('/pengunjungs')->with('alert', [
      'type' => 'success',
      'message' => 'Data pengunjung berhasil diubah',
    ]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Pengunjung $pengunjung) {
    $pengunjung->delete();
    return redirect('/pengunjungs')->with('alert', [
      'type' => 'success',
      'message' => 'Data pengunjung berhasil dihapus',
    ]);
  }

  public function export($type) {
    set_time_limit(300);
    switch ($type) {
      case 'pdf':
        $pengunjungs = Pengunjung::latest()->get();
        $pdf = Pdf::loadView('pengunjungs.print', ['pengunjungs' => $pengunjungs])->setPaper('a4', 'portrait');
        return $pdf->stream('Laporan Pengunjung');
      case 'excel':
        return Excel::download(new PengunjungExport, 'Laporan Pengunjung.xlsx');
      default:
        abort(404);
    }
  }
}
