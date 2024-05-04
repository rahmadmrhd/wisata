<?php

namespace App\Http\Controllers;

use App\Http\Requests\TempatWisataRequest;
use App\Models\TempatWisata;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    return view('tempat_wisatas.form', [
      'kode' => TempatWisata::generateKode(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(TempatWisataRequest $request) {
    $data = $request->validated();

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
    return view('tempat_wisatas.form', [
      'tempat_wisata' => $tempat_wisata
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(TempatWisataRequest $request, TempatWisata $tempat_wisata) {
    $data = $request->validated();

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
}
