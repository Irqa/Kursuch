<?php
use yii\helpers\Html;

 ?>
<div class="container-fluid">
    <h1>Типи <a href="type">+</a></h1>
      <div class="orderers">
        <?php foreach ($types as $type): ?>
          <div class="orderer">
              <div>
                  <p><?=$type->name?></p>
              </div>
              <div class="">
                <?= Html::a('Видалити', ['deletet', 'id' => $type->id], [
                            'class' => 'btn btn-primary col-12',
                            'data' => [
                                'confirm' => "Ви впевнені що хочете видалити ".$type->name."?",
                                'method' => 'post',
                            ],
                        ]) ?>
                </div>
          </div>
        <?php endforeach; ?>

      </div>
</div>
