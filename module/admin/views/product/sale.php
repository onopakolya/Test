<?php
 
 use yii\helpers\Html;
 use yii\bootstrap4\ActiveForm;
 ?>
  
 <?php $form = ActiveForm::begin() ?>
 <?= $form->field($model, 'name') ?>
 <?= $form->field($model, 'price') ?>
 <?= $form->field($model, 'sale') ?>

 <div class="form-group">
     <div>
         <?= Html::submitButton('Скидка', ['class' => 'btn btn-success']) ?>
     </div>
 </div>
 <?php ActiveForm::end() ?>
