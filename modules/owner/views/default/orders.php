<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="container ">
    <h1>Заявки</h1>
    <div class="row">
      <?php foreach ($deals as $deal): ?>
        <a href="<?= Url::toRoute(['deal', 'id'=>$deal->id]);?>">
          <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
            <div class="container-fluid item" >
                  <img src="<?=$deal->add->getImage()?>" alt="">
                  <p class="adress"><?=$deal->name?></p>
                  <p><?=$deal->email?></p>
                  <p><?=$deal->phone?></p>
                  <p class=""><?=$deal->add->adress?></p>
                  <?php if ($deal->add_id->is_ordered == 0): ?>
                    <p class="free">вільна</p>
                    <?php else: ?>
                    <p class="non-free">зайнята</p>
                  <?php endif; ?>
              </div>
          </div>
        </a>
      <?php endforeach; ?>

    </div>


</div>
