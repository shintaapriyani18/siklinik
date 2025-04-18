<?php


namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $nama
 * @property string $nik
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string|null $alamat
 * @property int $wilayah_id
 *
 * @property Wilayah $wilayah
 */
class Pasien extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'pasien';
    }

    public function rules()
    {
        return [
            [['nama', 'nik', 'tanggal_lahir', 'jenis_kelamin', 'wilayah_id'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['wilayah_id'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['nik'], 'string', 'max' => 20],
            [['jenis_kelamin'], 'in', 'range' => ['L', 'P']],
            [['wilayah_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::class, 'targetAttribute' => ['wilayah_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nik' => 'NIK',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'wilayah_id' => 'Wilayah (Kabupaten)',
        ];
    }

    public function getWilayah()
    {
        return $this->hasOne(Wilayah::class, ['id' => 'wilayah_id']);
    }
}
