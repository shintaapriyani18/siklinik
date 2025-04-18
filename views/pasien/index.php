<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Data Pasien';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p><?= Html::a('Tambah Pasien', ['create'], ['class' => 'btn btn-success']) ?></p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'nama',
        'nik',
        'tanggal_lahir',
        [
            'attribute' => 'jenis_kelamin',
            'value' => function ($model) {
                return $model->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';
            },
        ],
        'alamat:ntext',
        [
            'attribute' => 'wilayah_id',
            'value' => 'wilayah.nama',
            'label' => 'Wilayah'
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
