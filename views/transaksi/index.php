<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'Transaksi Pasien';
?>

<div class="container my-4">
    <h2 class="text-center mb-4">📋 Transaksi Pasien</h2>

    <!-- PASIEN TERDAFTAR -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <strong>🧾 Daftar Pasien Terdaftar</strong>
        </div>
        <div class="card-body p-3">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendaftaranList as $pendaftaran): ?>
                        <tr>
                            <td><?= Html::encode($pendaftaran->pasien->nama) ?></td>
                            <td><?= Html::encode($pendaftaran->pasien->nik) ?></td>
                            <td><?= Yii::$app->formatter->asDate($pendaftaran->tanggal) ?></td>
                            <td>
                                <?= Html::a('➕ Tambah Tindakan & Obat', ['create', 'pendaftaran_id' => $pendaftaran->id], ['class' => 'btn btn-sm btn-success']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- RIWAYAT TRANSAKSI -->
    <?php if (!empty($transaksiList)): ?>
        <div class="card shadow">
            <div class="card-header bg-secondary text-white">
                <strong>📌 Riwayat Tindakan & Resep Obat</strong>
            </div>
            <div class="card-body p-3">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Tindakan</th>
                            <th>Obat</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksiList as $item): ?>
                            <tr>
                                <td><?= Html::encode($item['nama']) ?></td>
                                <td><?= Html::encode($item['tindakan']) ?></td>
                                <td><?= Html::encode($item['obat']) ?></td>
                                <td><?= Html::encode($item['tanggal']) ?></td>
                                <td>
                                    <?= Html::a('✏️ Edit', ['update', 'pendaftaran_id' => $item['pendaftaran_id']], ['class' => 'btn btn-warning btn-sm']) ?>
                                    <?= Html::a('Detail', ['detail', 'pendaftaran_id' => $pendaftaran->id], ['class' => 'btn btn-info']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info mt-4">Belum ada data tindakan atau resep yang dibuat.</div>
    <?php endif; ?>
</div>
