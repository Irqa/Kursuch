<?php
use yii\helpers\Html;

 ?>
<div class="container-fluid">
    <h1>Адміни <a href="admin">+</a></h1>
      <div class="orderers">
        <?php foreach($admins as $admin): ?>
            <div class="orderer">
                <div>
                    <p><?=$admin->name?> <?=$admin->surname?> (<?=$admin->email?>)</p>
                </div>
                <?php if($admin->id != Yii::$app->user->id): ?>
                <div class="">
                  <?= Html::a('Видалити', ['deletea', 'id' => $admin->id], [
                              'class' => 'btn btn-primary col-12',
                              'data' => [
                                  'confirm' => "Ви впевнені що хочете видалити ".$admin->name." ".$admin->surname."?",
                                  'method' => 'post',
                              ],
                          ]) ?>
                  </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
            <!-- <div class="orderer">
                <div>
                    <p>Замовник (шішіш@sksk.sls)</p>
                </div>
                <div class="">
                    <a href="#">Видалити</a>
                </div>
              </div>
            <div class="orderer">
                <div>
                    <p>Замовник (шішіш@sksk.sls)</p>
                </div>
                <div class="">
                    <a href="#">Видалити</a>
                </div>
              </div> -->
      </div>
</div>
