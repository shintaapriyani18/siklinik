<?php
// TransaksiController.php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Pendaftaran;
use app\models\TindakanMedis;
use app\models\Tindakan;
use app\models\ResepObat;
use app\models\Obat;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class TransaksiController extends Controller
{
    public function actionIndex()
    {
        $pendaftaranList = Pendaftaran::find()->with('pasien')->all();

        $transaksiList = (new \yii\db\Query())
            ->select([
                'p.id as pendaftaran_id',
                'pa.nama',
                't.nama_tindakan AS tindakan',
                'o.nama_obat AS obat',
                'COALESCE(tm.tanggal_tindakan, ro.tanggal_resep) AS tanggal'
            ])
            ->from('pendaftaran p')
            ->leftJoin('pasien pa', 'pa.id = p.pasien_id')
            ->leftJoin('tindakan_medis tm', 'tm.pendaftaran_id = p.id')
            ->leftJoin('tindakan t', 't.id = tm.tindakan_id')
            ->leftJoin('resep_obat ro', 'ro.pendaftaran_id = p.id')
            ->leftJoin('obat o', 'o.id = ro.obat_id')
            ->where(['or',
                ['not', ['tm.id' => null]],
                ['not', ['ro.id' => null]]
            ])
            ->groupBy(['p.id', 'pa.nama', 't.nama_tindakan', 'o.nama_obat', 'tm.tanggal_tindakan', 'ro.tanggal_resep'])
            ->all();

        return $this->render('index', [
            'pendaftaranList' => $pendaftaranList,
            'transaksiList' => $transaksiList,
        ]);
    }

    public function actionCreate($pendaftaran_id)
    {
        $tindakanMedis = new TindakanMedis();
        $resepObat = new ResepObat();
    
        $tindakanMedis->pendaftaran_id = $pendaftaran_id;
        $resepObat->pendaftaran_id = $pendaftaran_id;
    
        $listTindakan = ArrayHelper::map(Tindakan::find()->all(), 'id', 'nama_tindakan');
        $listObat = ArrayHelper::map(Obat::find()->all(), 'id', 'nama_obat');
    
        if ($tindakanMedis->load(Yii::$app->request->post()) && $resepObat->load(Yii::$app->request->post())) {
            $tindakanMedis->save();
            $resepObat->save();
    
            // 🔄 Cek apakah tagihan sudah pernah dibuat
            $existingTagihan = \app\models\Tagihan::findOne(['pendaftaran_id' => $pendaftaran_id]);
            if (!$existingTagihan) {
                $total = 0;
    
                $tindakan = \app\models\Tindakan::findOne($tindakanMedis->tindakan_id);
                $obat = \app\models\Obat::findOne($resepObat->obat_id);
    
                $total += $tindakan->harga ?? 0;
                $total += $obat->harga ?? 0;
    
                $tagihan = new \app\models\Tagihan();
                $tagihan->pendaftaran_id = $pendaftaran_id;
                $tagihan->tanggal_pembayaran = date('Y-m-d H:i:s');
                $tagihan->total_tagihan = $total;
                $tagihan->status_pembayaran = 'Belum Dibayar';
    
                if ($tagihan->save()) {
                    Yii::$app->session->setFlash('success', 'Transaksi & tagihan berhasil disimpan!');
                } else {
                    Yii::$app->session->setFlash('error', 'Transaksi berhasil, tapi gagal membuat tagihan.');
                }
            } else {
                Yii::$app->session->setFlash('warning', 'Transaksi berhasil, tapi tagihan sudah pernah dibuat.');
            }
    
            return $this->redirect(['index']);
        }
    
        return $this->render('create', [
            'tindakanMedis' => $tindakanMedis,
            'resepObat' => $resepObat,
            'listTindakan' => $listTindakan,
            'listObat' => $listObat,
        ]);
    }    

    public function actionUpdate($pendaftaran_id)
    {
        $tindakanMedis = TindakanMedis::findOne(['pendaftaran_id' => $pendaftaran_id]);
        $resepObat = ResepObat::findOne(['pendaftaran_id' => $pendaftaran_id]);

        if (!$tindakanMedis || !$resepObat) {
            throw new NotFoundHttpException("Data tindakan atau resep tidak ditemukan.");
        }

        $listTindakan = ArrayHelper::map(Tindakan::find()->all(), 'id', 'nama_tindakan');
        $listObat = ArrayHelper::map(Obat::find()->all(), 'id', 'nama_obat');

        if ($tindakanMedis->load(Yii::$app->request->post()) && $resepObat->load(Yii::$app->request->post())) {
            $tindakanMedis->save();
            $resepObat->save();
            Yii::$app->session->setFlash('success', 'Data berhasil diperbarui!');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'tindakanMedis' => $tindakanMedis,
            'resepObat' => $resepObat,
            'listTindakan' => $listTindakan,
            'listObat' => $listObat,
        ]);
    }

    public function actionDetail($pendaftaran_id)
    {
        $pendaftaran = Pendaftaran::findOne($pendaftaran_id);
        if (!$pendaftaran) {
            throw new NotFoundHttpException("Pendaftaran tidak ditemukan.");
        }

        $tindakanMedis = TindakanMedis::findOne(['pendaftaran_id' => $pendaftaran_id]);
        $resepObat = ResepObat::findOne(['pendaftaran_id' => $pendaftaran_id]);

        return $this->render('detail', [
            'pendaftaran' => $pendaftaran,
            'tindakanMedis' => $tindakanMedis,
            'resepObat' => $resepObat,
        ]);
    }

}
