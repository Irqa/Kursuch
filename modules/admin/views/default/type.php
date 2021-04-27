<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Додати категорію';
?>
<div class="container ">
    <?php $form = ActiveForm::begin([
    ]); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>


        <div class="container-fluid">
            <div class="row">
                <?= Html::submitButton('Додати', ['class' => 'btn btn-primary col-12']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    </div>
