<?php
$this->title = 'Edit Pendaftaran';
?>

<h3><?= $this->title ?></h3>

<?= $this->render('_form', [
    'pendaftaran' => $pendaftaran,
    'pasien' => $pasien,
    'kunjungan' => $kunjungan,
    'wilayahList' => $wilayahList,
]) ?>
