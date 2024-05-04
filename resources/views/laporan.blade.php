<x-app-layout>
  <script>
    window.dataChart = @json([$jkPengunjung, $laporanBulanan, $tahunBuka]);
  </script>
  <div class="tw-grid tw-grid-cols-12 tw-gap-4">
    <x-chart id="chart-jk-pengunjung" title="Jenis Kelamin Pengunjung"
      class="tw-col-span-12 sm:tw-col-span-5 md:tw-col-span-4" />
    <x-chart id="chart-laporan-bulanan" title="Laporan Bulanan" class="tw-col-span-12 sm:tw-col-span-7 md:tw-col-span-8" />
    <x-chart id="chart-tempat-wisata-tahun-buka" title="Pembukaan Tempat Wisata" class="tw-col-span-12" />
  </div>
  @vite('resources/js/laporan.js')
</x-app-layout>
