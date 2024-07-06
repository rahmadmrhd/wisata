<?php

namespace App\Http\Controllers;

use App\Exports\TempatWisataExport;
use App\Http\Requests\TempatWisataRequest;
use App\Models\TempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class TempatWisataController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request) {
    $tempat_wisata = TempatWisata::latest();

    if ($request->has('search')) {
      $tempat_wisata = $tempat_wisata
        ->where('kode', 'like', '%' . $request->search . '%')
        ->orWhere('nama', 'like', '%' . $request->search . '%')
        ->orWhere('tahun_buka', 'like', '%' . $request->search . '%')
        ->orWhere('harga_tiket', 'like', '%' . $request->search . '%');
    }

    return view('tempat_wisatas.index', [
      'tempat_wisatas' => $tempat_wisata->paginate(10),
      'kode' => TempatWisata::generateKode(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    // 
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(TempatWisataRequest $request) {
    $data = $request->validated();

    if ($request->hasFile('gambar')) {
      $data['gambar'] = $request->file('gambar')->store('gambar');
    }

    TempatWisata::create($data);
    return redirect('/tempat_wisatas')->with('alert', [
      'type' => 'success',
      'message' => 'Data tempat wisata berhasil disimpan',
    ]);
  }

  /**
   * Display the specified resource.
   */
  public function show(TempatWisata $tempat_wisata) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(TempatWisata $tempat_wisata) {
    $tempat_wisata->jam_buka = Carbon::parse($tempat_wisata->jam_buka)->format('H:i');
    $tempat_wisata->jam_tutup = Carbon::parse($tempat_wisata->jam_tutup)->format('H:i');
    return response()->json($tempat_wisata);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(TempatWisataRequest $request, TempatWisata $tempat_wisata) {
    $data = $request->validated();

    if ($request->hasFile('gambar')) {
      if ($tempat_wisata->gambar) {
        Storage::delete($tempat_wisata->gambar);
      }
      $data['gambar'] = $request->file('gambar')->store('gambar');
    }

    $tempat_wisata->update($data);
    return redirect('/tempat_wisatas')->with('alert', [
      'type' => 'success',
      'message' => 'Data tempat wisata berhasil diubah',
    ]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(TempatWisata $tempat_wisata) {
    $tempat_wisata->delete();
    return redirect('/tempat_wisatas')->with('alert', [
      'type' => 'success',
      'message' => 'Data tempat wisata berhasil dihapus',
    ]);
  }

  public function export($type) {
    switch ($type) {
      case 'pdf':
        $tempat_wisatas = TempatWisata::latest()->get();
        $pdf = Pdf::loadview('tempat_wisatas.print', ['tempat_wisatas' => $tempat_wisatas]);
        return $pdf->stream('Laporan Tempat Wisata');
      case 'excel':
        return Excel::download(new TempatWisataExport, 'Laporan Tempat Wisata.xlsx');
      default:
        abort(404);
    }
  }
}
