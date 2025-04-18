<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Wilayah;

$indukList = ArrayHelper::map(Wilayah::find()->all(), 'id', 'nama');
?>

<div class="wilayah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'jenis')->dropDownList(['provinsi' => 'Provinsi', 'kabupaten' => 'Kabupaten']) ?>
    <?= $form->field($model, 'id_induk')->dropDownList($indukList, ['prompt' => 'Pilih Wilayah Induk']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
