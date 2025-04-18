<?php
use yii\helpers\Html;

/** @var $tindakanMedis app\models\TindakanMedis */
/** @var $resepObat app\models\ResepObat */
/** @var $pendaftaran app\models\Pendaftaran */
?>

<h2>Detail Transaksi Pasien</h2>

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        Data Pasien
    </div>
    <div class="card-body">
        <p><strong>Nama:</strong> <?= Html::encode($pendaftaran->pasien->nama) ?></p>
        <p><strong>NIK:</strong> <?= Html::encode($pendaftaran->pasien->nik) ?></p>
        <p><strong>Tanggal Daftar:</strong> <?= Html::encode($pendaftaran->tanggal) ?></p>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header bg-success text-white">
                Tindakan Medis
            </div>
            <div class="card-body">
                <?php if ($tindakanMedis): ?>
                    <p><strong>Nama Tindakan:</strong> <?= Html::encode($tindakanMedis->tindakan->nama_tindakan) ?></p>
                    <p><strong>Tanggal Tindakan:</strong> <?= Html::encode($tindakanMedis->tanggal_tindakan) ?></p>
                <?php else: ?>
                    <p class="text-muted">Belum ada tindakan medis.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header bg-info text-white">
                Resep Obat
            </div>
            <div class="card-body">
                <?php if ($resepObat): ?>
                    <p><strong>Nama Obat:</strong> <?= Html::encode($resepObat->obat->nama_obat) ?></p>
                    <p><strong>Dosis:</strong> <?= Html::encode($resepObat->dosis) ?></p>
                    <p><strong>Aturan Pakai:</strong> <?= Html::encode($resepObat->aturan_pakai) ?></p>
                    <p><strong>Tanggal Resep:</strong> <?= Html::encode($resepObat->tanggal_resep) ?></p>
                <?php else: ?>
                    <p class="text-muted">Belum ada resep obat.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<p>
    <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-secondary']) ?>
    <?= Html::a('Edit', ['update', 'pendaftaran_id' => $pendaftaran->id], ['class' => 'btn btn-warning']) ?>
</p>
