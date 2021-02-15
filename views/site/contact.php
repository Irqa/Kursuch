<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

?>
<div class="container-fluid">
      <h1>Категорія: адреса</h1>
      <div class="row">
            <div class="photo col-xs-6">
                  <img src="/photo/jojo.jpg" class="item-image" alt="">
            </div>
            <div class="col-xs-6">
                  <h2 class="m-0">Адреса</h2>
                  <p>Власник</p>
                  <?php if (!Yii::$app->user->isGuest) {
                    echo '<p>Телефон власника</p>';
                  } ?>
            </div>
            <div class="col-xs-12 pad">
                  <p>Якщо зацікавило - зверніться до власника:</p>
                  <?php $form = ActiveForm::begin([
                  ]); ?>
                      <?= $form->field($model, 'name')->textInput() ?>

                      <?= $form->field($model, 'email')->textInput() ?>

                      <?= $form->field($model, 'phone')->textInput() ?>

                      <div class="container-fluid">
                          <div class="row">
                              <?= Html::submitButton('Хочу орендувати', ['class' => 'btn btn-primary col-12']) ?>
                          </div>
                      </div>
                  <?php ActiveForm::end(); ?>
            </div>
      </div>
      <div class="row">


      </div>
</div>
