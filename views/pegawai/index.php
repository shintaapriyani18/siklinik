<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Data Pegawai';
?>
<h1><?= Html::encode($this->title) ?></h1>
<p><?= Html::a('Tambah Pegawai', ['create'], ['class' => 'btn btn-success']) ?></p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'nama',
        'nip',
        'jabatan',
        'no_hp',
        'alamat:ntext',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
