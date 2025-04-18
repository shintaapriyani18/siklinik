<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Wilayah;

$wilayahList = ArrayHelper::map(Wilayah::find()->all(), 'id', 'nama');
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tanggal_lahir')->input('date') ?>
    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['L' => 'Laki-laki', 'P' => 'Perempuan'], ['prompt' => 'Pilih Jenis Kelamin']) ?>
    <?= $form->field($model, 'alamat')->textarea(['rows' => 4]) ?>
    <?= $form->field($model, 'wilayah_id')->dropDownList($wilayahList, ['prompt' => 'Pilih Wilayah']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
