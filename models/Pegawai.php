<?php

namespace app\models;

use Yii;

class Pegawai extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'pegawai';
    }

    public function rules()
    {
        return [
            [['nama', 'nip','jabatan', 'no_hp', 'alamat'], 'required'],
            [['nama'], 'string'],
            [['nip'], 'number'],
            [['jabatan'], 'string'],
            [['alamat'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nip' => 'NIP',
            'jabatan' => 'Jabatan',
            'no_hp' => 'Nomor HP',
            'alamat' => 'Alamat',
        ];
    }
}
