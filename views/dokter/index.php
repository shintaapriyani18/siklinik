<?php
use yii\helpers\Html;

$this->title = 'Dashboard Dokter';
?>

<div class="container mt-5">
    <div class="jumbotron bg-success text-white text-center p-4 rounded-3 shadow">
        <h1>Halo, Dokter!</h1>
        <p class="lead">Selamat datang di dashboard pemeriksaan pasien.</p>
    </div>

    <div class="row text-center mt-4">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Daftar Pasien Hari Ini</h5>
                    <p class="card-text">Lihat pasien yang akan diperiksa hari ini.</p>
                    <?= Html::a('Lihat Pasien', ['pasien/index'], ['class' => 'btn btn-outline-light']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Rekam Medis</h5>
                    <p class="card-text">Isi dan lihat catatan pemeriksaan pasien.</p>
                    <?= Html::a('Kelola Rekam Medis', ['rekam-medis/index'], ['class' => 'btn btn-outline-light']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
