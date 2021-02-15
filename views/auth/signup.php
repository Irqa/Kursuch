<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Реєстрація';
?>
<div class="container align-self-center">
    <div class="row center">
        <div class="col-lg-4 form-content">
            <h1 class='text-center'><?= Html::encode($this->title) ?></h1>

            <p class='text-justify'>Щоб зареєструватись, введіть наступні поля:</p>

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
                <?= Html::submitButton('Зареєструватись', ['class' => 'btn btn-primary col-12', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
