<?php
// File: models/ResepObat.php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class ResepObat extends ActiveRecord
{
    public static function tableName()
    {
        return 'resep_obat';
    }

    public function rules()
    {
        return [
            [['pendaftaran_id', 'obat_id', 'dosis', 'aturan_pakai'], 'required'],
            [['pendaftaran_id', 'obat_id'], 'integer'],
            [['dosis', 'aturan_pakai'], 'string'],
        ];
    }

    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id' => 'obat_id']);
    }
}