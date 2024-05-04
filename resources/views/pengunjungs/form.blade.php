<x-app-layout>
  <div class="card tw-mx-auto !tw-max-w-2xl tw-shadow-lg">
    <div class="card-body">
      <h1 class="tw-text-2xl tw-font-semibold tw-text-white">
        {{ isset($pengunjung) ? 'Update' : 'Tambah' }} Pengunjung Baru
      </h1>
      @if (isset($pengunjung))
        <form action="{{ route('pengunjungs.update', $pengunjung->id) }}" method="POST"
          class="tw-mt-6 tw-grid tw-grid-cols-12 tw-gap-x-6 tw-gap-y-3">
          @method('PUT')
        @else
          <form action="{{ route('pengunjungs.store') }}" method="POST"
            class="tw-mt-6 tw-grid tw-grid-cols-12 tw-gap-x-6 tw-gap-y-3">
      @endif
      @csrf
      <div class="tw-col-span-4">
        <label for="kode" class="form-label">Kode</label>
        <input type="text" class="form-control @error('kode') is-invalid @enderror !tw-bg-gray-800" id="kode"
          name="kode" value="{{ old('kode', $pengunjung->kode ?? ($kode ?? '')) }}" required>
        @error('kode')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-8">
        <label for="no_ktp" class="form-label">NIK</label>
        <input type="text" class="form-control @error('no_ktp') is-invalid @enderror !tw-bg-gray-800" id="no_ktp"
          name="no_ktp" value="{{ old('no_ktp', $pengunjung->no_ktp ?? '') }}" required>
        @error('no_ktp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-12">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror !tw-bg-gray-800" id="nama"
          name="nama" value="{{ old('nama', $pengunjung->nama ?? '') }}" required>
        @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-12">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea type="text" class="form-control @error('alamat') is-invalid @enderror !tw-bg-gray-800" id="alamat"
          name="alamat"required>{{ old('alamat', $pengunjung->alamat ?? '') }}</textarea>
        @error('alamat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-5">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select class="form-select @error('jenis_kelamin') is-invalid @enderror !tw-bg-gray-800" id="jenis_kelamin"
          name="jenis_kelamin" value="{{ old('jenis_kelamin', $pengunjung->jenis_kelamin ?? '') }}" required>
          <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
          <option value="L" {{ old('jenis_kelamin', $pengunjung->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
            Laki-laki</option>
          <option value="P" {{ old('jenis_kelamin', $pengunjung->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
            Perempuan</option>
        </select>
        @error('jenis_kelamin')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="tw-col-span-7">
        <label for="tgl_berkunjung" class="form-label">Tanggal Berkunjung</label>
        <input type="date" class="form-control @error('tgl_berkunjung') is-invalid @enderror !tw-bg-gray-800"
          id="tgl_berkunjung" name="tgl_berkunjung"
          value="{{ old('tgl_berkunjung', $pengunjung->tgl_berkunjung ?? '') }}" required>
        @error('tgl_berkunjung')
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
        <a href="{{ route('pengunjungs.index') }}" class="btn tw-mt-6">Batal</a>
      </div>
      </form>
    </div>
  </div>
</x-app-layout>
