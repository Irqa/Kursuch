<?php use yii\helpers\Url; ?>

<div class="container ">
    <div class="row">
        <div class="col-xs-12">
            <h1><?php echo Yii::$app->user->identity->name ?> </h1>
            <h1><?php echo Yii::$app->user->identity->surname ?> </h1>
            <p>(<?php echo Yii::$app->user->identity->email ?>)</p>
            <h2><?php echo Yii::$app->user->identity->phone ?></h2>
        </div>
    </div>
    <!-- Мої Площини -->
    <div class="row">
        <a href="<?= Url::toRoute(['deals']);?>">
            <h3>Мої площини</h3>
        </a>
    </div>
    <div class="row">
      <?php if(is_null($ads)):?>
        <h4>Немає орендованих площин</h4>
        <?php else: ?>
      <?php foreach ($ads as $ad): ?>

        <?php if($ad != null): ?>
        <a href="<?= Url::toRoute(['/site/contact', 'id'=>$ad->id]);?>">
          <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
              <div class="container-fluid" id='item'>
                  <img src="<?=$ad->getImage()?>" alt="">
                  <p class="adress"><?=$ad->adress?></p>
                  <?php if ($ad->is_ordered == 0): ?>
                    <p class="free">вільна</p>
                    <?php else: ?>
                    <p class="non-free">зайнята</p>
                  <?php endif; ?>
              </div>
          </div>
        </a>
      <?php else: ?>
        <h3>Немає площин</h3>
        <?php break; ?>
      <?php endif; ?>
      <?php endforeach;?>
    <?php endif; ?>

    </div>
    <!-- Заявки -->
    <div class="row">
        <a href="<?= Url::toRoute(['orders']);?>">
            <h3>Заявки</h3>
        </a>
    </div>
    <div class="row">
      <?php if(count($deals)==0): ?>
        <h4>Немає поданих заявок</h4>
      <?php else: ?>
      <?php foreach ($deals as $deal): ?>

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
    <!-- Історія -->
    <div class="row">
        <a href="<?= Url::toRoute(['histories']);?>">
            <h3>Історія</h3>
        </a>
    </div>
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
