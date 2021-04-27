<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Додати адміна';
?>
<div class="container ">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'surname')->textInput() ?>

        <?= $form->field($model, 'email')->input('email') ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'password')->passwordInput() ?>


        <div class="container-fluid">
            <div class="row">
                <?= Html::submitButton('Додати', ['class' => 'btn btn-primary col-12', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    </div>
