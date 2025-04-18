<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property int $id
 * @property string $nama
 * @property string $jenis
 * @property int|null $id_induk
 *
 * @property Wilayah $induk
 * @property Wilayah[] $anak
 */
class Wilayah extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'wilayah';
    }

    public function rules()
    {
        return [
            [['nama', 'jenis'], 'required'],
            [['id_induk'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['jenis'], 'in', 'range' => ['provinsi', 'kabupaten']],
            [['id_induk'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::class, 'targetAttribute' => ['id_induk' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama Wilayah',
            'jenis' => 'Jenis',
            'id_induk' => 'Induk (Provinsi)',
        ];
    }

    public function getInduk()
    {
        return $this->hasOne(Wilayah::class, ['id' => 'id_induk']);
    }

    public function getAnak()
    {
        return $this->hasMany(Wilayah::class, ['id_induk' => 'id']);
    }
}
