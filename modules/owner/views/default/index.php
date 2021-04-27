<?php use yii\helpers\Url; ?>
<div class="container ">
    <div class="row">
        <div class="col-xs-12">
            <h1><?php echo Yii::$app->user->identity->name ?> </h1>
            <p>(<?php echo Yii::$app->user->identity->email ?>)</p>
            <h2><?php echo Yii::$app->user->identity->phone ?></h2>
        </div>
    </div>
    <!-- Мої Площини -->
    <div class="row">
        <a href="/owner/default/places">
            <h3>Мої площини</h3>
        </a>
    </div>
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
    <!-- Заявки -->
    <div class="row">
        <a href="/owner/default/orders">
            <h3>Заявки</h3>
        </a>
    </div>
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
    <!-- Історія -->
    <div class="row">
        <a href="<?= Url::toRoute("histories");?>">
            <h3>Історія</h3>
        </a>
    </div>
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
