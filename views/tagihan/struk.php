<?php
use yii\helpers\Html;

$this->title = 'Struk Pembayaran';
?>

<h3>Struk Pembayaran</h3>
<hr>
<p><strong>Nama Pasien:</strong> <?= Html::encode($tagihan->pendaftaran->pasien->nama ?? '-') ?></p>
<p><strong>Tanggal:</strong> <?= date('d M Y H:i', strtotime($tagihan->tanggal_pembayaran ?? $tagihan->created_at ?? 'now')) ?></p>
<p><strong>No. Tagihan:</strong> <?= $tagihan->id ?></p>

<hr>
<h4>Rincian Biaya:</h4>
<ul>
    <?php foreach ($tagihan->pendaftaran->tindakanMedis as $tindakan): ?>
        <li><?= $tindakan->tindakan->nama_tindakan ?> - Rp<?= number_format($tindakan->tindakan->harga) ?></li>
    <?php endforeach; ?>
    <?php foreach ($tagihan->pendaftaran->resepObat as $resep): ?>
        <li><?= $resep->obat->nama_obat ?> - Rp<?= number_format($resep->obat->harga) ?></li>
    <?php endforeach; ?>
</ul>

<hr>
<p><strong>Total:</strong> Rp<?= number_format($tagihan->total_tagihan) ?></p>
<p><strong>Status:</strong> <?= $tagihan->status_pembayaran ?></p>
