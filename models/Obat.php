<?php

namespace app\models;

use Yii;

class Obat extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'obat';
    }

    public function rules()
    {
        return [
            [['nama_obat', 'jenis','stok', 'satuan', 'harga'], 'required'],
            [['nama_obat'], 'string'],
            [['jenis'], 'string'],
            [['stok'], 'number'],
            [['satuan'], 'string'],
            [['harga'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_obat' => 'Nama Obat',
            'jenis' => 'Jenis',
            'stok' => 'Stok',
            'satuan' => 'Satuan',
            'harga' => 'Harga',
        ];
    }
}
