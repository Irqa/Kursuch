<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="container ">
    <h1>Мої завки на оренду</h1>
    <div class="row">
      <?php if(count($orders)==0): ?>
        <h4>Немає поданих заявок</h4>
      <?php else: ?>
      <?php foreach ($orders as $deal): ?>

        <a href="<?= Url::toRoute(['/site/contact', 'id'=>$deal->add->id]);?>">
          <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
              <div class="container-fluid" id='item'>
                  <img src="<?=$deal->add->getImage()?>" alt="">
                  <p class="adress"><?=$deal->add->adress?></p>
                  <?php if ($deal->add->is_ordered == 0): ?>
                    <p class="free">вільна</p>
                    <?php else: ?>
                    <p class="non-free">зайнята</p>
                  <?php endif; ?>
              </div>
          </div>
        </a>
      <?php endforeach;?>
    <?php endif; ?>

    </div>


</div>
