<?php
use yii\helpers\Html;

$this->title = 'Dashboard Kasir';
?>

<div class="container mt-5">
    <div class="jumbotron bg-danger text-white text-center p-4 rounded-3 shadow">
        <h1>Halo, Kasir Klinik!</h1>
        <p class="lead">Pantau transaksi dan pembayaran pasien di sini.</p>
    </div>

    <div class="row text-center mt-4">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Pembayaran Pasien</h5>
                    <p class="card-text">Kelola pembayaran setelah pasien diperiksa.</p>
                    <?= Html::a('Input Pembayaran', ['pembayaran/index'], ['class' => 'btn btn-outline-light']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Transaksi</h5>
                    <p class="card-text">Lihat semua transaksi yang telah dilakukan.</p>
                    <?= Html::a('Lihat Riwayat', ['transaksi/index'], ['class' => 'btn btn-outline-light']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
