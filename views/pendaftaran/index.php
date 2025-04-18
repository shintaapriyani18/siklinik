<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Beranda Petugas Pendaftaran';
?>

<div class="site-index">
    <div class="jumbotron text-center bg-primary text-white p-4 mb-4 rounded">
        <h1 class="display-5">Selamat Datang, Petugas Pendaftaran!</h1>
        <p class="lead">Pantau dan kelola pendaftaran pasien dengan mudah.</p>
        <?= Html::a('Tambah Pendaftaran', ['create'], ['class' => 'btn btn-light btn-lg']) ?>
    </div>

    <div class="row text-center mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-success">
                <div class="card-body">
                    <h5 class="card-title text-success">Total Pendaftaran</h5>
                    <p class="card-text display-6"><?= $dataProvider->getTotalCount() ?></p>
                </div>
            </div>
        </div>
        <!-- Bisa tambahkan statistik lain di sini -->
        <div class="col-md-4">
            <div class="card shadow-sm border-info">
                <div class="card-body">
                    <h5 class="card-title text-info">Hari Ini</h5>
                    <p class="card-text display-6">
                        <?= (new \yii\db\Query())
                            ->from('pendaftaran')
                            ->where(['like', 'tanggal', date('Y-m-d')])
                            ->count(); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-warning">
                <div class="card-body">
                    <h5 class="card-title text-warning">Pasien Terdaftar</h5>
                    <p class="card-text display-6">
                        <?= (new \yii\db\Query())
                            ->from('pasien')
                            ->count(); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Riwayat Pendaftaran</h5>
        </div>
        <div class="card-body p-0">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-striped table-bordered mb-0'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'label' => 'Nama Pasien',
                        'value' => fn($model) => $model->pasien->nama ?? '-',
                    ],
                    [
                        'label' => 'NIK',
                        'value' => fn($model) => $model->pasien->nik ?? '-',
                    ],
                    'tanggal',

                    [
                        'label' => 'Jenis Kunjungan',
                        'value' => fn($model) => $model->kunjungan->jenis ?? '-',
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update}',
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
