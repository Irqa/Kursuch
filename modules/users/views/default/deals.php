<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<div class="container ">
    <h1>Мої площини</h1>
    <div class="row">
      <?php if(count($ads)==0): ?>
        <h4>Немає орендованих площин</h4>
      <?php else: ?>
      <?php foreach ($ads as $ad):?>
      <a href="<?= Url::toRoute(['/site/contact', 'id'=>$ad->add->id]);?>">
        <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
          <div class="container-fluid item" >
            <img src="<?=$ad->add->getImage()?>" alt="">
            <p class="adress"><?=$ad->add->adress?></p>
            <p class="">з <?=DateTime::createFromFormat('Y-m-d', $ad->from)->format('d.m.Y')?> по <?=DateTime::createFromFormat('Y-m-d', $ad->till)->format('d.m.Y')?></p>
            </div>
        </div>
      </a>
    <?php endforeach; ?>
  <?php endif; ?>


    </div>

</div>
