<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

?>

<div class="post-form">

    <div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'link')->textInput() ?>
    <?= $form->field($model, 'linkEdit')->textInput() ?>
    <?= $form->field($model, 'linkDonor')->textInput() ?>
    <?= $form->field($model, 'chapterNumber')->textInput() ?>

    <div class="post-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    
    