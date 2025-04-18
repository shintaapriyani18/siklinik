<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Tagihan extends ActiveRecord
{
    public static function tableName()
    {
        return 'tagihan';
    }

    public function rules()
    {
        return [
            [['pendaftaran_id', 'status_pembayaran'], 'required'],
            [['total_biaya'], 'number'],
            [['tanggal_pembayaran'], 'safe'],
            [['status_pembayaran'], 'string', 'max' => 20],
        ];
    }

    public function getPendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, ['id' => 'pendaftaran_id']);
    }

    public function getTotalTindakan()
    {
        return TindakanMedis::find()
            ->joinWith('tindakan')
            ->where(['pendaftaran_id' => $this->pendaftaran_id])
            ->sum('tindakan.harga');
    }

    public function getTotalObat()
    {
        return ResepObat::find()
            ->joinWith('obat')
            ->where(['pendaftaran_id' => $this->pendaftaran_id])
            ->sum('obat.harga');
    }

    public function getTotalBiaya()
    {
        return $this->getTotalTindakan() + $this->getTotalObat();
    }
}
