<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Query;
use app\models\Laporan;

class LaporanController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'kunjunganPerHari' => Laporan::getKunjunganPerHari(),
            'tindakanTerbanyak' => Laporan::getTindakanTerbanyak(),
            'obatTerbanyak' => Laporan::getObatTerbanyak(),
        ]);
    }
}
