<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Daftar Wilayah';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p><?= Html::a('Tambah Wilayah', ['create'], ['class' => 'btn btn-success']) ?></p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'nama',
        'jenis',
        [
            'attribute' => 'id_induk',
            'value' => 'induk.nama'
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
