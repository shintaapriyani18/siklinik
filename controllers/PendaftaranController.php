<?php

namespace app\controllers;

use Yii;
use app\models\Pendaftaran;
use app\models\Kunjungan;
use app\models\Pasien;
use app\models\Wilayah;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class PendaftaranController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => \app\models\Pendaftaran::find()->with(['pasien', 'kunjungan']),
        ]);
    
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $pendaftaran = new Pendaftaran();
        $kunjungan = new Kunjungan();
        $pasien = new Pasien();

        // Ambil daftar wilayah untuk dropdown
        $wilayahList = ArrayHelper::map(Wilayah::find()->all(), 'id', 'nama');

        if ($pasien->load(Yii::$app->request->post()) && $pasien->save()) {
            $pendaftaran->pasien_id = $pasien->id;
            $pendaftaran->tanggal = date('Y-m-d H:i:s');

            if ($pendaftaran->save()) {
                $kunjungan->pendaftaran_id = $pendaftaran->id;
                $kunjungan->load(Yii::$app->request->post());

                if ($kunjungan->save()) {
                    Yii::$app->session->setFlash('success', 'Pendaftaran berhasil disimpan.');
                    return $this->redirect(['view', 'id' => $pendaftaran->id]);
                }
            }
        }

        return $this->render('create', [
            'pendaftaran' => $pendaftaran,
            'kunjungan' => $kunjungan,
            'pasien' => $pasien,
            'wilayahList' => $wilayahList, // ← ini yang penting
        ]);
    }

    public function actionView($id)
    {
        $pendaftaran = Pendaftaran::find()
            ->with(['pasien.wilayah', 'kunjungan']) // include relasi biar gak query berkali-kali
            ->where(['id' => $id])
            ->one();

        if (!$pendaftaran) {
            throw new \yii\web\NotFoundHttpException("Data pendaftaran tidak ditemukan.");
        }

        return $this->render('view', [
            'pendaftaran' => $pendaftaran,
        ]);
    }

    public function actionUpdate($id)
    {
        $pendaftaran = Pendaftaran::findOne($id);
        if (!$pendaftaran) {
            throw new \yii\web\NotFoundHttpException("Data tidak ditemukan.");
        }
    
        $pasien = $pendaftaran->pasien;
        $kunjungan = $pendaftaran->kunjungan;
        $wilayahList = \yii\helpers\ArrayHelper::map(\app\models\Wilayah::find()->all(), 'id', 'nama');
    
        if ($pasien->load(Yii::$app->request->post()) && $pasien->save()) {
            if ($kunjungan->load(Yii::$app->request->post()) && $kunjungan->save()) {
                Yii::$app->session->setFlash('success', 'Data berhasil diperbarui.');
                return $this->redirect(['view', 'id' => $pendaftaran->id]);
            }
        }
    
        return $this->render('update', [
            'pendaftaran' => $pendaftaran,
            'pasien' => $pasien,
            'kunjungan' => $kunjungan,
            'wilayahList' => $wilayahList,
        ]);
    }
    

}
