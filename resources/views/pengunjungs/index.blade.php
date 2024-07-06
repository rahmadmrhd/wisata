<x-app-layout>
  <x-alert />
  <div class="card tw-shadow-lg">
    <div class="card-body">
      <div class="tw-mb-3">
        <h1 class="dark:tw-text-white tw-text-2xl tw-font-semibold tw-text-gray-900">
          Daftar Pengunjung
        </h1>
      </div>
      <div
        class="dark:tw-border-gray-700 tw-flex tw-items-center tw-justify-between tw-border-b tw-border-gray-200 tw-py-4">
        <form class="tw-w-96" role="search" action="" method="GET">
          <input class="form-control me-2" type="search" value="{{ request('search') }}" name="search"
            placeholder="Cari pengunjung" aria-label="Search">
        </form>
        <div class="tw-flex tw-gap-x-2">
          <button type="button" data-bs-toggle="modal" data-bs-target="#form-modal"
            class="btn btn-success tw-flex tw-items-center tw-gap-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24">
              <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z" />
            </svg>
            Tambah
          </button>
          <div class="btn-group">

            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">Export</button>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('pengunjungs.export', 'excel') }}">Excel</a></li>
              <li><a class="dropdown-item" href="{{ route('pengunjungs.export', 'pdf') }}">PDF</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="tw-w-full tw-overflow-y-auto">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Action</th>
              <th scope="col">Kode</th>
              <th scope="col">NIK</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col" class="!tw-text-center">Jenis Kelamin</th>
              <th scope="col" class="!tw-text-center">Tanggal Berkunjung</th>
              <th scope="col">QR Code</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengunjungs as $pengunjung)
              <tr>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" onclick="edit(@js($pengunjung->id))" class="btn btn-sm btn-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="m21.7 13.35l-1 1l-2.05-2.05l1-1a.55.55 0 0 1 .77 0l1.28 1.28c.21.21.21.56 0 .77M12 18.94l6.06-6.06l2.05 2.05L14.06 21H12zM12 14c-4.42 0-8 1.79-8 4v2h6v-1.89l4-4c-.66-.08-1.33-.11-2-.11m0-10a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4a4 4 0 0 0-4-4" />
                      </svg>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteData({{ $pengunjung->id }})"
                      data-bs-toggle="modal" data-bs-target="#delete-modal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M9 3v1H4v2h1v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1V4h-5V3zM7 6h10v13H7zm2 2v9h2V8zm4 0v9h2V8z" />
                      </svg>
                    </button>
                  </div>
                </td>
                <th class="tw-truncate" scope="row">{{ $pengunjung->kode }}</th>
                <td class="tw-truncate">{{ $pengunjung->no_ktp }}</td>
                <td class="tw-truncate">{{ $pengunjung->nama }}</td>
                <td>{{ $pengunjung->alamat }}</td>
                <td class="tw-text-center">{{ $pengunjung->jenis_kelamin }}</td>
                <td class="tw-truncate">{{ $pengunjung->tgl_berkunjung }}</td>
                <td class="space-y-2">
                  @php
                    $dataQR =
                        "Kode : {$pengunjung->kode}\n" .
                        "Pengunjung : {$pengunjung->nama}\n" .
                        "No Ktp : {$pengunjung->no_ktp}\n" .
                        "Jenis Kelamin : {$pengunjung->jenis_kelamin}\n" .
                        "Tgl Berkunjung : {$pengunjung->tgl_berkunjung}\n";
                  @endphp
                  <img class="mt-2 tw-mx-auto"
                    src="https://api.qrserver.com/v1/create-qr-code/?data={!! urlencode($dataQR) !!}&amp;size=200x200"
                    alt="" title="" />
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="tw-mt-6">
        {{ $pengunjungs->withQueryString()->links() }}
      </div>

      {{-- modal delete --}}
      <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              Apakah anda yakin ingin menghapus data ini?
            </div>
            <form id="delete-form" method="POST" class="modal-footer">
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </div>
        </div>
      </div>

      {{-- modal create/edit --}}
      <div class="modal fade" id="form-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 id="title" class="tw-text-2xl tw-font-semibold tw-text-white">
                Pengunjung Baru
              </h1>
            </div>
            <div class="modal-body">
              <form
                action="{{ old('id') ? route('pengunjungs.update', old('id'), absolute: false) : route('pengunjungs.store', absolute: false) }}"
                method="POST" class="tw-mt-6 tw-grid tw-grid-cols-12 tw-gap-x-6 tw-gap-y-3">
                @csrf
                <input type="hidden" name="id" value="{{ old('id', '') }}">
                <input type="hidden" name="_method" value="{{ old('id') ? 'PUT' : 'POST' }}">
                <div class="tw-col-span-4">
                  <label for="kode" class="form-label">Kode</label>
                  <input type="text" class="form-control @error('kode') is-invalid @enderror dark:!tw-bg-gray-800"
                    id="kode" name="kode" value="{{ old('kode', $kode ?? '') }}" required>
                  @error('kode')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="tw-col-span-8">
                  <label for="no_ktp" class="form-label">NIK</label>
                  <input type="text"
                    class="form-control @error('no_ktp') is-invalid @enderror dark:!tw-bg-gray-800" id="no_ktp"
                    name="no_ktp" value="{{ old('no_ktp', '') }}" required>
                  @error('no_ktp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="tw-col-span-12">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror dark:!tw-bg-gray-800"
                    id="nama" name="nama" value="{{ old('nama', '') }}" required>
                  @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="tw-col-span-12">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea type="text" class="form-control @error('alamat') is-invalid @enderror dark:!tw-bg-gray-800"
                    id="alamat" name="alamat"required>{{ old('alamat', '') }}</textarea>
                  @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="tw-col-span-5">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <select class="form-select @error('jenis_kelamin') is-invalid @enderror dark:!tw-bg-gray-800"
                    id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin', '') }}" required>
                    <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                    <option value="L" {{ old('jenis_kelamin', '') == 'L' ? 'selected' : '' }}>
                      Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', '') == 'P' ? 'selected' : '' }}>
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
                  <input type="date"
                    class="form-control @error('tgl_berkunjung') is-invalid @enderror dark:!tw-bg-gray-800"
                    id="tgl_berkunjung" name="tgl_berkunjung" value="{{ old('tgl_berkunjung', '') }}" required>
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
                  <button type="button" data-bs-dismiss="modal" aria-label="Close"
                    class="btn tw-mt-6">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    const newCode = @js($kode ?? null);

    function deleteData(id) {
      const form = document.querySelector('#delete-form')
      form.action = `/pengunjungs/${id}`
    }

    $(document).ready(function() {
      const titleForm = $('#form-modal #title');
      const form = $('#form-modal form');
      const methodInput = $('#form-modal form input[name="_method"]');
      const idInput = $('#form-modal form input[name="id"]');
      const kodeInput = $('#form-modal form input[name="kode"]');
      const no_ktpInput = $('#form-modal form input[name="no_ktp"]');
      const namaInput = $('#form-modal form input[name="nama"]');
      const alamatInput = $('#form-modal form textarea[name="alamat"]');
      const jenis_kelaminInput = $('#form-modal form select[name="jenis_kelamin"]');
      const tgl_berkunjungInput = $('#form-modal form input[name="tgl_berkunjung"]');

      // mengecek apakah ada error yang diterima saat proses submit
      if (@js($errors->isNotEmpty())) {
        titleForm.text('Edit Pengunjung');
        $('#form-modal').modal('show');
      }
      // saat modal ditutup maka data form akan direset
      $("#form-modal").on('hidden.bs.modal', () => {
        titleForm.text('Pengunjung Baru');
        form.attr('action', `/pengunjungs`);
        idInput.val('');
        kodeInput.val(newCode);
        no_ktpInput.val('');
        namaInput.val('');
        alamatInput.val('');
        jenis_kelaminInput.val('').change();
        tgl_berkunjungInput.val('');
        methodInput.val('POST');
      });

      // fungsi untuk mengambil data dari backend laravel
      window.edit = (id) => {
        showLoading();
        titleForm.text('Edit Pengunjung');
        form.attr('action', `/pengunjungs/${id}`);
        $.ajax({
          url: `/pengunjungs/${id}/edit`,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            console.log(data);
            methodInput.val('PUT');
            idInput.val(data.id);
            kodeInput.val(data.kode);
            no_ktpInput.val(data.no_ktp);
            namaInput.val(data.nama);
            alamatInput.val(data.alamat);
            jenis_kelaminInput.val(data.jenis_kelamin).change();
            tgl_berkunjungInput.val(data.tgl_berkunjung);
            $("#form-modal").modal('show');
            hideLoading();
          },
          error: function(error) {
            if (error.status == 401) {
              window.location.reload();
            }
            hideLoading();
          }
        });
      }
    });
  </script>
</x-app-layout>
