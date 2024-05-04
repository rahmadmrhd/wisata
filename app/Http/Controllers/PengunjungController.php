<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengunjungRequest;
use App\Models\Pengunjung;
use Illuminate\Http\Request;

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
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    return view('pengunjungs.form', [
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
   * Display the specified resource.
   */
  public function show(Pengunjung $pengunjung) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Pengunjung $pengunjung) {
    return view('pengunjungs.form', [
      'pengunjung' => $pengunjung
    ]);
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
}
