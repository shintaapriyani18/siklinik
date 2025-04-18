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
        'nik',
        'tanggal_lahir',
        [
            'attribute' => 'jenis_kelamin',
            'value' => $model->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan',
        ],
        'alamat:ntext',
        [
            'attribute' => 'wilayah_id',
            'value' => $model->wilayah->nama,
            'label' => 'Wilayah',
        ],
    ],
]) ?>
