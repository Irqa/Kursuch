<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
 ?>
 <div class="container align-self-center">
     <div class="row center">
         <div class="col-lg-5 form-content">
              <h1 class="text-center">Нова рекламна площина</h1>
      <?php $form = ActiveForm::begin([
      ]); ?>
      <div class="container-fluid">
      </div>

          <?= $form->field($model, 'adress')->textInput() ?>


          <?= Html::dropDownList('owner_id',null,$owners , ['class'=>'form-control'])?>
          <br>

          <?= Html::dropDownList('type_id',null,$types , ['class'=>'form-control'])?>
          <br>

          <?= $form->field($photo, 'image')->fileInput(['maxlength' => true]) ?>

          <div class="container-fluid">
              <div class="row">
                  <?= Html::submitButton('Додати', ['class' => 'btn btn-primary col-12']) ?>
              </div>
          </div>
      <?php ActiveForm::end(); ?>

    </div>
</div>
</div>
