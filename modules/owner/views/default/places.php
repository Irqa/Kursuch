<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="container ">
    <h1>Мої площини</h1>
    <div class="row">
      <?php foreach ($places as $place): ?>
        <a href="<?= Url::toRoute(['/site/contact', 'id'=>$place->id]);?>">
          <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
              <div class="container-fluid" id='item'>
                  <img src="<?=$place->getImage()?>" alt="">
                  <p class="adress"><?=$place->adress?></p>
                  <?php if ($place->is_ordered == 0): ?>
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
