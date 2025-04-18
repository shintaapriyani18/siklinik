<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Daftar Tagihan Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tagihan-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php elseif (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Nama Pasien',
                'value' => fn($model) => $model->pendaftaran->pasien->nama ?? '-'
            ],
            [
                'label' => 'Tanggal Pendaftaran',
                'value' => fn($model) => $model->pendaftaran->tanggal ?? '-'
            ],
            [
                'label' => 'Total Tagihan',
                'value' => fn($model) => Yii::$app->formatter->asCurrency($model->totalBiaya)
            ],
            [
                'attribute' => 'status_pembayaran',
                'label' => 'Status Pembayaran',
                'format' => 'raw',
                'value' => function ($model) {
                    if (strcasecmp($model->status_pembayaran, 'Sudah Lunas') === 0) {
                        return '<span class="badge badge-success text-dark">Sudah Lunas</span>';
                    } else {
                        return '<span class="badge badge-secondary text-dark">Belum Lunas</span>';
                    }
                }
            ],            
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{bayar} {struk}',
                'buttons' => [
                    'bayar' => function ($url, $model) {
                        if (strcasecmp($model->status_pembayaran, 'Belum Lunas') === 0) {
                            return Html::a('Bayar', ['tagihan/bayar', 'id' => $model->id], [
                                'class' => 'btn btn-success btn-sm',
                                'data-confirm' => 'Yakin ingin membayar tagihan ini?',
                                'data-method' => 'post'
                            ]);
                        }
                        return null;
                    },
                    'struk' => function ($url, $model) {
                        return Html::a('Struk', ['tagihan/struk', 'id' => $model->id], [
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
