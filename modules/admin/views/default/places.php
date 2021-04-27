<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="container ">
<h1>Площини <a href="place">+</a></h1>
  <div class="row">
    <?php foreach ($places as $add):?>
      <a href="<?= Url::toRoute(['update-place', 'id'=>$add->id]);?>">
        <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
            <div class="container-fluid" id='item'>
                <img src="<?= $add->getImage(); ?>" alt="">
                <p class="adress"><?= $add->adress ?></p>
                <?php if ($add->is_ordered == 0):?>
                  <p class="free">вільна</p>
                <?php else:?>
                  <p class="non-free">зайнята</p>
                <?php endif; ?>
            </div>
        </div>
      </a>
    <?php endforeach; ?>

    </div>



</div>
