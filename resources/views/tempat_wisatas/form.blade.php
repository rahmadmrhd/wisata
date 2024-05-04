<x-app-layout>
  <div class="card tw-mx-auto !tw-max-w-2xl tw-shadow-lg">
    <div class="card-body">
      <h1 class="tw-text-2xl tw-font-semibold tw-text-white">
        {{ isset($tempat_wisata) ? 'Update' : 'Tambah' }} Tempat Wisata Baru
      </h1>
      @if (isset($tempat_wisata))
        <form action="{{ route('tempat_wisatas.update', $tempat_wisata->id) }}" method="POST"
          class="tw-mt-6 tw-grid tw-grid-cols-12 tw-gap-x-6 tw-gap-y-3">
          @method('PUT')
        @else
          <form action="{{ route('tempat_wisatas.store') }}" method="POST"
            class="tw-mt-6 tw-grid tw-grid-cols-12 tw-gap-x-6 tw-gap-y-3">
      @endif
      @csrf
      <div class="tw-col-span-4">
        <label for="kode" class="form-label">Kode</label>
        <input type="text" class="form-control @error('kode') is-invalid @enderror !tw-bg-gray-800" id="kode"
          name="kode" value="{{ old('kode', $tempat_wisata->kode ?? ($kode ?? '')) }}" required>
        @error('kode')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-12">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror !tw-bg-gray-800" id="nama"
          name="nama" value="{{ old('nama', $tempat_wisata->nama ?? '') }}" required>
        @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-6">
        <label for="tahun_buka" class="form-label">Tahun Buka</label>
        <input type="text" class="form-control @error('tahun_buka') is-invalid @enderror !tw-bg-gray-800"
          id="tahun_buka" name="tahun_buka" value="{{ old('tahun_buka', $tempat_wisata->tahun_buka ?? '') }}" required>
        @error('tahun_buka')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-6">
        <label for="harga_tiket" class="form-label">Harga Tiket</label>
        <input type="text" class="form-control @error('harga_tiket') is-invalid @enderror !tw-bg-gray-800"
          id="harga_tiket" name="harga_tiket" value="{{ old('harga_tiket', $tempat_wisata->harga_tiket ?? '') }}"
          required>
        @error('harga_tiket')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-6">
        <label for="jam_buka" class="form-label">Jam Buka</label>
        <input type="time" class="form-control @error('jam_buka') is-invalid @enderror !tw-bg-gray-800"
          id="jam_buka" name="jam_buka" value="{{ old('jam_buka', $tempat_wisata->jam_buka ?? '') }}" required>
        @error('jam_buka')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-6">
        <label for="jam_tutup" class="form-label">Jam Tutup</label>
        <input type="time" class="form-control @error('jam_tutup') is-invalid @enderror !tw-bg-gray-800"
          id="jam_tutup" name="jam_tutup" value="{{ old('jam_tutup', $tempat_wisata->jam_tutup ?? '') }}" required>
        @error('jam_tutup')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-12 tw-flex tw-flex-row-reverse tw-gap-x-4">
        <button type="submit" class="btn btn-primary tw-mt-6 tw-flex tw-items-center tw-gap-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24">
            <path fill="currentColor"
              d="M21 7v12q0 .825-.587 1.413T19 21H5q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h12zm-9 11q1.25 0 2.125-.875T15 15t-.875-2.125T12 12t-2.125.875T9 15t.875 2.125T12 18m-6-8h9V6H6z" />
          </svg>
          Simpan
        </button>
        <a href="{{ route('tempat_wisatas.index') }}" class="btn tw-mt-6">Batal</a>
      </div>
      </form>
    </div>
  </div>
</x-app-layout>
