<?php

namespace app\models;

use Yii;

class Pendaftaran extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'pendaftaran';
    }

    public function rules()
    {
        return [
            [['pasien_id', 'tanggal'], 'required'],
            [['pasien_id'], 'integer'],
            [['tanggal'], 'safe'],
        ];
    }

    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'pasien_id']);
    }

    public function getKunjungan()
    {
        return $this->hasOne(Kunjungan::class, ['pendaftaran_id' => 'id']);
    }

    public function getWilayah()
    {
        return $this->hasOne(Wilayah::class, ['id' => 'wilayah_id']);
    }

    public function getTindakanMedis()
    {
        return $this->hasMany(TindakanMedis::class, ['pendaftaran_id' => 'id']);
    }

    public function getResepObat()
    {
        return $this->hasMany(ResepObat::class, ['pendaftaran_id' => 'id']);
    }

    
}
