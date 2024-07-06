import Chart from 'chart.js/auto';

$.ajax({
  url: '/api/laporan',
  method: 'GET',
  success: (data) => {
    new Chart(
      document.getElementById('chart-jk-pengunjung'),
      {
        type: 'doughnut',
        data: {
          labels: data.jkPengunjung.map(data => data.jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'),
          datasets: [
            {
              label: 'Acquisitions by year',
              data: data.jkPengunjung.map(data => data.total),
              hoverOffset: 24,
              backgroundColor: ['#f87171', '#3b82f6'],
              borderWidth: 0
            }
          ]
        }
      }
    );
    new Chart(
      document.getElementById('chart-laporan-bulanan'),
      {
        type: 'line',
        data: {
          labels: data.laporanBulanan.map(data => data.label),
          datasets: [
            {
              label: 'Laporan Kunjungan',
              data: data.laporanBulanan.map(data => data.total),
              fill: true,
              borderColor: '#3b82f6',
              backgroundColor: '#122E5A8D',
              tension: 0.1
            }
          ]
        }
      }
    );
    new Chart(
      document.getElementById('chart-tempat-wisata-tahun-buka'),
      {
        type: 'bar',
        data: {
          labels: data.tahunBuka.map(data => data.tahun_buka),
          datasets: [
            {
              label: 'Laporan Pembukaan',
              data: data.tahunBuka.map(data => data.total),
              fill: true,
              backgroundColor: '#3b82f6',
              tension: 0.1
            }
          ]
        }
      }
    );
  }
})
