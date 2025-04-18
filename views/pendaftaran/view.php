<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pendaftaran $pendaftaran */
/** @var app\models\Pasien $pasien */
/** @var app\models\Kunjungan $kunjungan */

$this->title = 'Detail Pendaftaran';
?>

<h3><?= Html::encode($this->title) ?></h3>

<p><strong>Nama Pasien:</strong> <?= Html::encode($pendaftaran->pasien->nama) ?></p>
<p><strong>NIK:</strong> <?= Html::encode($pendaftaran->pasien->nik) ?></p>
<p><strong>Tanggal Lahir:</strong> <?= Html::encode($pendaftaran->pasien->tanggal_lahir) ?></p>
<p><strong>Jenis Kelamin:</strong> <?= Html::encode($pendaftaran->pasien->jenis_kelamin) ?></p>
<p><strong>Alamat:</strong> <?= Html::encode($pendaftaran->pasien->alamat) ?></p>
<p><strong>Wilayah:</strong> <?= Html::encode($pendaftaran->pasien->wilayah->nama ?? '-') ?></p>

<hr>

<p><strong>Tanggal Pendaftaran:</strong> <?= Html::encode($pendaftaran->tanggal) ?></p>
<p><strong>Jenis Kunjungan:</strong> <?= Html::encode($pendaftaran->kunjungan->jenis ?? '-') ?></p>

<p>
    <?= Html::a('Kembali ke Daftar Pendaftaran', ['index'], ['class' => 'btn btn-primary']) ?>
</p>
