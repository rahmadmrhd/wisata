import Chart from 'chart.js/auto';

console.log(window.dataChart)

new Chart(
  document.getElementById('chart-jk-pengunjung'),
  {
    type: 'doughnut',
    data: {
      labels: window.dataChart[0].map(data => data.jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'),
      datasets: [
        {
          label: 'Acquisitions by year',
          data: window.dataChart[0].map(data => data.total),
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
      labels: window.dataChart[1].map(data => data.label),
      datasets: [
        {
          label: 'Laporan Kunjungan',
          data: window.dataChart[1].map(data => data.total),
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
      labels: window.dataChart[2].map(data => data.tahun_buka),
      datasets: [
        {
          label: 'Laporan Pembukaan',
          data: window.dataChart[2].map(data => data.total),
          fill: true,
          backgroundColor: '#3b82f6',
          tension: 0.1
        }
      ]
    }
  }
);