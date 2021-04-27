<?php
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<div class="container align-self-center">
    <div class="row center">
        <div class="col-lg-4 dealc">
          <h1><?=$add->type->name?>: <?=$add->adress?></h1>
          <h2><?=$model->name?> (<?=$model->email?>)</h2>
          <?php $form = ActiveForm::begin([
          ]); ?>
          <?= $form->field($model, 'from')->widget(DatePicker::className(),[
          'type' => DatePicker::TYPE_INPUT,
          'options' => ['placeholder' => 'Початок оренди...'],
          'pluginOptions' => [
              'weekStart'=>1,
              'format' => 'yyyy-mm-dd', //неделя начинается с понедельника
          ]
      ]); ?>

              <?= $form->field($model, 'till')->widget(DatePicker::className(),[
              'type' => DatePicker::TYPE_INPUT,
              'options' => ['placeholder' => 'Кінець оренди...'],
              'pluginOptions' => [
                  'weekStart'=>1,
                  'format' => 'yyyy-mm-dd'//неделя начинается с понедельника
              ]
          ]); ?>

              <br>

              <div class="container-fluid">
                  <div class="row">
                      <?= Html::submitButton('Підтвердити', ['class' => 'btn btn-primary col-12', 'name' => 'login-button']) ?>
                  </div>
              </div>
          <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
