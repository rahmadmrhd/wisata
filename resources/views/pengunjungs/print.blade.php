<x-print-layout title="Laporan Pengunjung">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Kode</th>
        <th scope="col">NIK</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col" class="">Jenis Kelamin</th>
        <th scope="col" class="">Tanggal Berkunjung</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pengunjungs as $pengunjung)
        <tr>
          <th class="" scope="row">{{ $pengunjung->kode }}</th>
          <td class="">{{ $pengunjung->no_ktp }}</td>
          <td class="">{{ $pengunjung->nama }}</td>
          <td>{{ $pengunjung->alamat }}</td>
          <td class="">{{ $pengunjung->jenis_kelamin }}</td>
          <td class="">{{ $pengunjung->tgl_berkunjung }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</x-print-layout>
