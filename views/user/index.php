<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Data User';
?>
<h1><?= Html::encode($this->title) ?></h1>
<p><?= Html::a('Tambah User', ['create'], ['class' => 'btn btn-success']) ?></p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'username',
        'role',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
