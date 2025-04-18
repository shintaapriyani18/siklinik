<?php

namespace app\models;

use Yii;

class Kunjungan extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'kunjungan';
    }

    public function rules()
    {
        return [
            [['pendaftaran_id', 'jenis'], 'required'],
            [['pendaftaran_id'], 'integer'],
            [['jenis'], 'in', 'range' => ['baru', 'kontrol']],
        ];
    }

    public function getPendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, ['id' => 'pendaftaran_id']);
    }

    public function getTindakans()
    {
        return $this->hasMany(TindakanMedis::class, ['kunjungan_id' => 'id']);
    }

    public function getResepObats()
    {
        return $this->hasMany(ResepObat::class, ['kunjungan_id' => 'id']);
    }

}
