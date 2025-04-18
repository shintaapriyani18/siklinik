<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Tagihan;
use app\models\Pendaftaran;
use app\models\TindakanMedis;
use app\models\ResepObat;
use yii\data\ActiveDataProvider;
use Mpdf\Mpdf;

class TagihanController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tagihan::find()->with('pendaftaran.pasien'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate($pendaftaran_id)
    {
        $tagihan = new Tagihan();

        $tindakan = TindakanMedis::find()->where(['pendaftaran_id' => $pendaftaran_id])->all();
        $resep = ResepObat::find()->where(['pendaftaran_id' => $pendaftaran_id])->all();

        $total = 0;
        foreach ($tindakan as $t) {
            $total += $t->tindakan->harga ?? 0;
        }
        foreach ($resep as $r) {
            $total += $r->obat->harga ?? 0;
        }

        $tagihan->pendaftaran_id = $pendaftaran_id;
        $tagihan->total_biaya = $total;
        $tagihan->status_pembayaran = 'Belum Lunas';
        $tagihan->tanggal_pembayaran = null;

        if ($tagihan->save()) {
            Yii::$app->session->setFlash('success', 'Tagihan berhasil dibuat.');
            return $this->redirect(['index']);
        }

        Yii::$app->session->setFlash('error', 'Gagal membuat tagihan.');
        return $this->redirect(['index']);
    }

    public function actionStruk($id)
    {
        $tagihan = $this->findModel($id);
        return $this->render('struk', ['tagihan' => $tagihan]);
    }

    public function actionCetakStruk($id)
    {
        $tagihan = $this->findModel($id);
        $content = $this->renderPartial('struk', ['tagihan' => $tagihan]);

        $pdf = new Mpdf();
        $pdf->WriteHTML($content);
        return $pdf->Output('Struk-Pembayaran.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function actionBayar($id)
    {
        $tagihan = $this->findModel($id);

        $tagihan->status_pembayaran = 'Sudah Lunas';
        $tagihan->tanggal_pembayaran = date('Y-m-d H:i:s');

        if ($tagihan->save(false)) {
            Yii::$app->session->setFlash('success', 'Status pembayaran berhasil diperbarui!');
        } else {
            Yii::$app->session->setFlash('error', 'Gagal memperbarui status pembayaran.');
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Tagihan::find()->with('pendaftaran.pasien')->where(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new \yii\web\NotFoundHttpException('Tagihan tidak ditemukan.');
    }
}
