<?php

namespace app\models;

use Yii;

class Tindakan extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tindakan';
    }

    public function rules()
    {
        return [
            [['nama_tindakan', 'harga'], 'required'],
            [['deskripsi'], 'string'],
            [['harga'], 'number'],
            [['nama_tindakan'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_tindakan' => 'Nama Tindakan',
            'deskripsi' => 'Deskripsi',
            'harga' => 'Harga',
        ];
    }
}
