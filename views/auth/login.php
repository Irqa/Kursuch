<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вхід';
?>
<div class="container align-self-center">
    <div class="row center">
        <div class="col-lg-4 form-content">
            <h1 class='text-center'><?= Html::encode($this->title) ?></h1>

            <p class='text-justify'>Щоб увійти на сайт як зареєстрований користувач, введіть наступні параметри:</p>

            <?php $form = ActiveForm::begin([
            ]); ?>
                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"col-lg-offset-1 col-lg-6\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                ]) ?>
                <br>

                <div class="container-fluid">
                    <div class="row">
                        <?= Html::submitButton('Увійти', ['class' => 'btn btn-primary col-12', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <a href="signup" class="sign ">Зареєструватися</a>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
