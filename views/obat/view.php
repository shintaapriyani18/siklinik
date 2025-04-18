<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

$this->title = $model->nama_obat;
?>
<h1><?= Html::encode($this->title) ?></h1>
<p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => ['confirm' => 'Yakin ingin menghapus data ini?', 'method' => 'post'],
    ]) ?>
</p>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'nama_obat',
        'jenis',
        'stok',
        'satuan',
        'harga',
    ],
]) ?>
