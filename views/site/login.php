<?php

use yii\widgets\ActiveForm; // GANTI INI
use yii\helpers\Html;



$this->title = 'Login';
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="site-login">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
