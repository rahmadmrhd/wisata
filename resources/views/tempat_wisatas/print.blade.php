<x-print-layout title="Laporan Pengunjung">

  <h2>
    Laporan Tempat Wisata
  </h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Kode</th>
        <th scope="col">Nama</th>
        <th scope="col">Tahun Buka</th>
        <th scope="col">Harga Tiket</th>
        <th scope="col">Jam Operasional</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tempat_wisatas as $tempat_wisata)
        <tr>
          <th scope="row">{{ $tempat_wisata->kode }}</th>
          <td>{{ $tempat_wisata->nama }}</td>
          <td>{{ $tempat_wisata->tahun_buka }}</td>
          <td>Rp. {{ number_format($tempat_wisata->harga_tiket, 2) }}</td>
          <td>
            {{ \Carbon\Carbon::createFromFormat('H:i:s', $tempat_wisata->jam_buka)->format('h:i') }} -
            {{ \Carbon\Carbon::createFromFormat('H:i:s', $tempat_wisata->jam_tutup)->format('h:i') }}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</x-print-layout>
