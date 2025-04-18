<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Data Tindakan';
?>
<h1><?= Html::encode($this->title) ?></h1>
<p><?= Html::a('Tambah Tindakan', ['create'], ['class' => 'btn btn-success']) ?></p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'nama_tindakan',
        'deskripsi:ntext',
        'harga',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
