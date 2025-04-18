<?php
use yii\helpers\Html;

$this->title = 'Dashboard Admin';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-index container mt-5">
    <div class="jumbotron text-center bg-info text-white p-4 rounded-3 shadow">
        <h1 class="display-4">Selamat Datang, Admin Klinik!</h1>
        <p class="lead">Ini adalah halaman utama untuk mengelola informasi klinik.</p>
    </div>

    <div class="row text-center mt-4">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Data Pasien</h5>
                    <p class="card-text">Kelola informasi pasien, kunjungan, dan riwayat medis.</p>
                    <?= Html::a('Lihat Pasien', ['pasien/index'], ['class' => 'btn btn-outline-primary']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Data Dokter</h5>
                    <p class="card-text">Atur data dokter dan jadwal praktek.</p>
                    <?= Html::a('Lihat Dokter', ['dokter/index'], ['class' => 'btn btn-outline-success']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Laporan</h5>
                    <p class="card-text">Lihat laporan bulanan atau tahunan aktivitas klinik.</p>
                    <?= Html::a('Lihat Laporan', ['laporan/index'], ['class' => 'btn btn-outline-danger']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
