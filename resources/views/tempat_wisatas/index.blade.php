<x-app-layout>
  <x-alert />
  <div class="card tw-shadow-lg">
    <div class="card-body">
      <div class="tw-mb-3">
        <h1 class="tw-text-2xl tw-font-semibold tw-text-white">
          Daftar Tempat Wisata
        </h1>
      </div>
      <div class="tw-flex tw-items-center tw-justify-between tw-border-b tw-border-[#4c4c4c] tw-py-4">
        <form class="tw-w-96" role="search" action="" method="GET">
          <input class="form-control me-2" type="search" value="{{ request('search') }}" name="search"
            placeholder="Cari tempat wisata" aria-label="Search">
        </form>
        <a href="{{ route('tempat_wisatas.create') }}" class="btn btn-success tw-flex tw-items-center tw-gap-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24">
            <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z" />
          </svg>
          Tambah
        </a>
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
            </tr>
          </thead>
          <tbody>
            @foreach ($tempat_wisatas as $tempat_wisata)
              <tr>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('tempat_wisatas.edit', $tempat_wisata->id) }}" class="btn btn-sm btn-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="m21.7 13.35l-1 1l-2.05-2.05l1-1a.55.55 0 0 1 .77 0l1.28 1.28c.21.21.21.56 0 .77M12 18.94l6.06-6.06l2.05 2.05L14.06 21H12zM12 14c-4.42 0-8 1.79-8 4v2h6v-1.89l4-4c-.66-.08-1.33-.11-2-.11m0-10a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4a4 4 0 0 0-4-4" />
                      </svg>
                    </a>
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
    </div>
  </div>
  <script>
    function deleteData(id) {
      const form = document.querySelector('#delete-form')
      form.action = `/tempat_wisatas/${id}`
    }
  </script>
</x-app-layout>
