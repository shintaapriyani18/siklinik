<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Data Obat';
?>
<h1><?= Html::encode($this->title) ?></h1>
<p><?= Html::a('Tambah Obat', ['create'], ['class' => 'btn btn-success']) ?></p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'nama_obat',
        'jenis',
        'stok',
        'satuan',
        'harga',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
