<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $model app\models\Wilayah */
/* @var $indukList app\models\Wilayah[] */

?>

<div class="wilayah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis')->dropDownList([
        'provinsi' => 'Provinsi',
        'kabupaten' => 'Kabupaten',
    ], ['prompt' => '-- Pilih Jenis --']) ?>

    <?= $form->field($model, 'id_induk')->dropDownList(
        ArrayHelper::map($indukList, 'id', 'nama'),
        ['prompt' => '-- Pilih Provinsi Induk (jika kabupaten) --']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
