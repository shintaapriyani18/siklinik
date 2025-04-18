<?php
// File: models/TindakanMedis.php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TindakanMedis extends ActiveRecord
{
    public static function tableName()
    {
        return 'tindakan_medis';
    }

    public function rules()
    {
        return [
            [['pendaftaran_id', 'tindakan_id'], 'required'],
            [['pendaftaran_id', 'tindakan_id'], 'integer'],
        ];
    }

    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'tindakan_id']);
    }

    
}