<?php

use yii\helpers\Html;

$this->title = 'Laporan Visualisasi Data Klinik';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container" style="padding: 20px;">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px;">

        <!-- Grafik Kunjungan -->
        <div style="flex: 1 1 100%; max-width: 100%; background: #f8f9fa; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h3 style="text-align:center;">📅 Jumlah Kunjungan Pasien per Hari</h3>
            <canvas id="kunjunganChart" style="max-width: 100%; height: auto;"></canvas>
        </div>

        <!-- Grafik Tindakan -->
        <div style="flex: 1 1 45%; max-width: 45%; background: #f8f9fa; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h3 style="text-align:center;">💉 Jenis Tindakan Terbanyak</h3>
            <canvas id="tindakanChart" style="max-width: 100%; height: auto;"></canvas>
        </div>

        <!-- Grafik Obat -->
        <div style="flex: 1 1 45%; max-width: 45%; background: #f8f9fa; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h3 style="text-align:center;">💊 Obat Paling Sering Diresepkan</h3>
            <canvas id="obatChart" style="max-width: 100%; height: auto;"></canvas>
        </div>

    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const kunjunganData = <?= json_encode($kunjunganPerHari) ?>;
    const tindakanData = <?= json_encode($tindakanTerbanyak) ?>;
    const obatData = <?= json_encode($obatTerbanyak) ?>;

    new Chart(document.getElementById('kunjunganChart'), {
        type: 'bar',
        data: {
            labels: kunjunganData.map(d => d.tanggal),
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: kunjunganData.map(d => parseInt(d.jumlah)),
                backgroundColor: '#36a2eb'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    new Chart(document.getElementById('tindakanChart'), {
        type: 'pie',
        data: {
            labels: tindakanData.map(d => d.nama_tindakan),
            datasets: [{
                label: 'Tindakan',
                data: tindakanData.map(d => parseInt(d.jumlah)),
                backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56', '#4bc0c0']
            }]
        },
        options: {
            responsive: true
        }
    });

    new Chart(document.getElementById('obatChart'), {
        type: 'doughnut',
        data: {
            labels: obatData.map(d => d.nama_obat),
            datasets: [{
                label: 'Obat',
                data: obatData.map(d => parseInt(d.jumlah)),
                backgroundColor: ['#4bc0c0', '#9966ff', '#ff9f40', '#ff6384', '#36a2eb']
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
