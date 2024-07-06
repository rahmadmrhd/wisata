<x-app-layout>
  <x-alert />
  <div class="card tw-shadow-lg">
    <div class="card-body">
      <div class="tw-mb-3">
        <h1 class="dark:tw-text-white tw-text-2xl tw-font-semibold tw-text-gray-900">
          Daftar Tempat Wisata
        </h1>
      </div>
      <div
        class="dark:tw-border-gray-700 tw-flex tw-items-center tw-justify-between tw-border-b tw-border-gray-200 tw-py-4">
        <form class="tw-w-96" role="search" action="" method="GET">
          <input class="form-control me-2" type="search" value="{{ request('search') }}" name="search"
            placeholder="Cari tempat wisata" aria-label="Search">
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
              <li><a class="dropdown-item" href="{{ route('tempat_wisatas.export', 'excel') }}">Excel</a></li>
              <li><a class="dropdown-item" href="{{ route('tempat_wisatas.export', 'pdf') }}">PDF</a></li>
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
              <th scope="col">Nama</th>
              <th scope="col" class="!tw-text-center">Tahun Buka</th>
              <th scope="col">Harga Tiket</th>
              <th scope="col" class="!tw-text-center">Jam Operasional</th>
              <th scope="col">Gambar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tempat_wisatas as $tempat_wisata)
              <tr>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" onclick="edit(@js($tempat_wisata->id))" class="btn btn-sm btn-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="m21.7 13.35l-1 1l-2.05-2.05l1-1a.55.55 0 0 1 .77 0l1.28 1.28c.21.21.21.56 0 .77M12 18.94l6.06-6.06l2.05 2.05L14.06 21H12zM12 14c-4.42 0-8 1.79-8 4v2h6v-1.89l4-4c-.66-.08-1.33-.11-2-.11m0-10a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4a4 4 0 0 0-4-4" />
                      </svg>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteData({{ $tempat_wisata->id }})"
                      data-bs-toggle="modal" data-bs-target="#delete-modal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M9 3v1H4v2h1v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1V4h-5V3zM7 6h10v13H7zm2 2v9h2V8zm4 0v9h2V8z" />
                      </svg>
                    </button>
                  </div>
                </td>
                <th class="tw-truncate" scope="row">{{ $tempat_wisata->kode }}</th>
                <td class="tw-truncate">{{ $tempat_wisata->nama }}</td>
                <td class="tw-text-center">{{ $tempat_wisata->tahun_buka }}</td>
                <td class="tw-truncate">Rp. {{ number_format($tempat_wisata->harga_tiket, 2) }}</td>
                <td class="tw-text-center">
                  {{ \Carbon\Carbon::createFromFormat('H:i:s', $tempat_wisata->jam_buka)->format('h:i') }} -
                  {{ \Carbon\Carbon::createFromFormat('H:i:s', $tempat_wisata->jam_tutup)->format('h:i') }}
                </td>
                <td class="space-y-2">
                  @if ($tempat_wisata->gambar)
                    <img class="w-auto mb-2" src="storage/{{ $tempat_wisata->gambar }}" alt=""
                      title="" />
                  @endif
                  @php

                    $dataQR =
                        "Kode : {$tempat_wisata->kode}\n" .
                        "Tempat Wisata : {$tempat_wisata->nama}\n" .
                        "Tahun Buka : {$tempat_wisata->tahun_buka}\n" .
                        'Harga Tiket : Rp. ' .
                        number_format($tempat_wisata->harga_tiket, 2) .
                        "\n" .
                        'Jam Operasional : ' .
                        \Carbon\Carbon::createFromFormat('H:i:s', $tempat_wisata->jam_buka)->format('h:i') .
                        ' - ' .
                        \Carbon\Carbon::createFromFormat('H:i:s', $tempat_wisata->jam_tutup)->format('h:i');
                  @endphp
                  <img class="mt-2 tw-mx-auto"
                    src="https://api.qrserver.com/v1/create-qr-code/?data={!! urlencode($dataQR) !!}&amp;size=200x200"
                    alt="" title="" />
                </td>
                <td class="w-[200px] tw-truncate">
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="tw-mt-6">
        {{ $tempat_wisatas->withQueryString()->links() }}
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
      <div class="modal fade" id="form-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 id="title" class="tw-text-2xl tw-font-semibold tw-text-white">
                Pengunjung Baru
              </h1>
            </div>
            <div class="modal-body">
              <form
                action="{{ old('id') ? route('tempat_wisatas.update', old('id'), absolute: false) : route('tempat_wisatas.store', absolute: false) }}"
                method="POST" class="tw-mt-6 tw-grid tw-grid-cols-12 tw-gap-x-6 tw-gap-y-3"
                enctype="multipart/form-data">
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
                <div class="tw-col-span-6">
                  <label for="tahun_buka" class="form-label">Tahun Buka</label>
                  <input type="text"
                    class="form-control @error('tahun_buka') is-invalid @enderror dark:!tw-bg-gray-800"
                    id="tahun_buka" name="tahun_buka" value="{{ old('tahun_buka', '') }}" required>
                  @error('tahun_buka')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="tw-col-span-6">
                  <label for="harga_tiket" class="form-label">Harga Tiket</label>
                  <input type="number"
                    class="form-control @error('harga_tiket') is-invalid @enderror dark:!tw-bg-gray-800"
                    id="harga_tiket" name="harga_tiket" value="{{ old('harga_tiket', '') }}" required>
                  @error('harga_tiket')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="tw-col-span-6">
                  <label for="jam_buka" class="form-label">Jam Buka</label>
                  <input type="time"
                    class="form-control @error('jam_buka') is-invalid @enderror dark:!tw-bg-gray-800" id="jam_buka"
                    name="jam_buka" value="{{ old('jam_buka', '') }}" required>
                  @error('jam_buka')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="tw-col-span-6">
                  <label for="jam_tutup" class="form-label">Jam Tutup</label>
                  <input type="time"
                    class="form-control @error('jam_tutup') is-invalid @enderror dark:!tw-bg-gray-800" id="jam_tutup"
                    name="jam_tutup" value="{{ old('jam_tutup', '') }}" required>
                  @error('jam_tutup')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <input type="hidden" name="old_image" value="{{ old('old_image', '') }}">
                <div class="tw-col-span-12">
                  <label for="gambar" class="form-label">Gambar</label>
                  <input type="file"
                    class="form-control @error('gambar') is-invalid @enderror dark:!tw-bg-gray-800" id="gambar"
                    name="gambar" required accept="image/*">
                  @error('gambar')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="tw-max-w-96 tw-col-span-12 tw-hidden" id="preview-image">
                  <img src="https://cdn.educba.com/academy/wp-content/uploads/2020/03/HTML-Form-Input-Type.jpg"
                    alt="" class="tw-h-auto tw-w-full tw-object-contain">
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
    const newCode = @js($kode);

    function deleteData(id) {
      const form = document.querySelector('#delete-form')
      form.action = `/tempat_wisatas/${id}`
    }

    $(document).ready(function() {
      const titleForm = $('#form-modal #title');
      const form = $('#form-modal form');
      const methodInput = $('#form-modal form input[name="_method"]');
      const idInput = $('#form-modal form input[name="id"]');
      const kodeInput = $('#form-modal form input[name="kode"]');
      const namaInput = $('#form-modal form input[name="nama"]');
      const tahun_bukaInput = $('#form-modal form input[name="tahun_buka"]');
      const harga_tiketInput = $('#form-modal form input[name="harga_tiket"]');
      const jam_bukaInput = $('#form-modal form input[name="jam_buka"]');
      const jam_tutupInput = $('#form-modal form input[name="jam_tutup"]');
      const gambarInput = $('#form-modal form input[name="gambar"]');
      const old_imageInput = $('#form-modal form input[name="old_image"]')
      const previewImageBox = $('#form-modal form #preview-image');
      const previewImage = $('#form-modal form #preview-image img');

      gambarInput.on('change', () => {
        const files = gambarInput.prop('files');
        const old_image = old_imageInput.val()
        if (files && files.length > 0) {
          const fileReader = new FileReader();
          fileReader.onload = function(event) {
            previewImage.attr('src', event.target.result);
            previewImageBox.removeClass('tw-hidden')
          }
          fileReader.readAsDataURL(files[0]);
        } else if (old_image) {
          previewImage.attr('src', old_image);
          previewImageBox.removeClass('tw-hidden')
        } else {
          previewImageBox.addClass('tw-hidden')
        }
      })

      // mengecek apakah ada error yang diterima saat proses submit
      if (@js($errors->isNotEmpty())) {
        titleForm.text('Edit Tempat Wisata');
        $('#form-modal').modal('show');
      }
      // saat modal ditutup maka data form akan direset
      $("#form-modal").on('hidden.bs.modal', () => {
        titleForm.text('Tempat Wisata Baru');
        form.attr('action', `/tempat_wisatas`);
        methodInput.val('POST');
        idInput.val('');
        kodeInput.val(newCode);
        namaInput.val('');
        tahun_bukaInput.val('');
        harga_tiketInput.val('');
        jam_bukaInput.val('').change();
        jam_tutupInput.val('');
        gambarInput.val('');
        previewImageBox.addClass('tw-hidden')
        previewImage.attr('src', '');
      });

      // fungsi untuk mengambil data dari backend laravel
      window.edit = (id) => {
        showLoading();
        titleForm.text('Edit Tempat Wisata');
        form.attr('action', `/tempat_wisatas/${id}`);
        $.ajax({
          url: `/tempat_wisatas/${id}/edit`,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            console.log(data);
            methodInput.val('PUT');
            idInput.val(data.id);
            kodeInput.val(data.kode);
            namaInput.val(data.nama);
            tahun_bukaInput.val(data.tahun_buka);
            harga_tiketInput.val(data.harga_tiket);
            jam_bukaInput.val(data.jam_buka).change();
            jam_tutupInput.val(data.jam_tutup);

            if (data.gambar) {
              previewImage.attr('src', data.gambar);
              previewImageBox.removeClass('tw-hidden')
              old_imageInput.val(data.gambar);
            }
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
