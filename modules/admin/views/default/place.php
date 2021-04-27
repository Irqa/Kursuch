<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
 ?>
<div class="container-fluid">
      <h1><?=$type;?>: <?=$model->adress?>
        <?= Html::a('Видалити', ['deletep', 'id' => $model->id], [
                    'class' => 'btn btn-primary ',
                    'data' => [
                        'confirm' => "Ви впевнені що хочете видалити ".$type->name."?",
                        'method' => 'post',
                    ],
                ]) ?>
</h1>
      <div class="row">
            <div class="photo col-sm-6 col-xs-12">
                  <img src="<?=$model->getImage();?>" class="item-image" alt="">
            </div>
            <div class="col-sm-6 col-xs-12">
                  <?php $form = ActiveForm::begin([
                  ]); ?>
                  <!-- <div class="container-fluid">
                  </div> -->

                      <?= $form->field($model, 'adress')->textInput() ?>

                      <?= Html::dropDownList('owner_id',$model->owner,$owners , ['class'=>'form-control']) ?>
                      <br>

                      <?= Html::dropDownList('type_id',$model->type,$types , ['class'=>'form-control']) ?>

                      <?= $form->field($photo, 'image')->fileInput(['maxlength' => true]) ?>

                      <div class="container-fluid">
                          <div class="row">
                              <?= Html::submitButton('Змінити', ['class' => 'btn btn-primary col-12']) ?>
                          </div>
                      </div>
                  <?php ActiveForm::end(); ?>
                  <div class="row">
                  </div>

            </div>
      </div>


</div>
