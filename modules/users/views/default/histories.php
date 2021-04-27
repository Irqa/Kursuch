<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<div class="container ">
    <h1>Історія оренди площин</h1>
    <div class="row">
      <?php if(count($histories)==0): ?>
        <h4>Історія заявок відсутня</h4>
      <?php else: ?>
      <?php foreach ($histrories as $history):?>
      <a href="<?= Url::toRoute(['/site/contact', 'id'=>$history->add->id]);?>">
        <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
          <div class="container-fluid item" >
            <img src="<?=$history->add->getImage()?>" alt="">
            <p class="adress"><?=$history->add->adress?></p>
            <p class="">з <?=DateTime::createFromFormat('Y-m-d', $history->from)->format('d.m.Y')?> по <?=DateTime::createFromFormat('Y-m-d', $history->till)->format('d.m.Y')?></p>
            </div>
        </div>
      </a>
    <?php endforeach; ?>
  <?php endif; ?>
    </div>


</div>
