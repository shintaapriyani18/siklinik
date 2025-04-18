<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->nama;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => ['confirm' => 'Yakin ingin menghapus data ini?', 'method' => 'post'],
    ]) ?>
</p>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'nama',
        'jenis',
        [
            'attribute' => 'id_induk',
            'value' => $model->induk ? $model->induk->nama : '(Induk Tidak Ada)',
        ],
    ],
]) ?>
