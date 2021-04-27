<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<div class="container ">
    <h1>Історія оренди</h1>
    <div class="row">
      <?php foreach ($history as $item): ?>
        <a href="#">
          <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
            <div class="container-fluid item" >
                  <img src="<?=$item->add->getImage()?>" alt="">
                  <p class="adress"><?=$item->add->adress?></p>
                  <p class="">з <?=DateTime::createFromFormat('Y-m-d', $item->from)->format('d.m.Y')?> по <?=DateTime::createFromFormat('Y-m-d', $item->till)->format('d.m.Y')?></p>
              </div>
          </div>
        </a>
      <?php endforeach; ?>

    </div>


</div>
