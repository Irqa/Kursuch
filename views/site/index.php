<?php
use yii\bootstrap\Carousel;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$carousel = [
  [
    'content' => '<img src="/photo/bg.jpg" />',
    'caption' => '',
    'options' => [],
  ],
  [
    'content' => '<img src="/photo/slider2.jpg" />',
    'caption' => '',
    'options' => [],
  ],
  [
    'content' => '<img src="/photo/slider3.jpg" />',
    'caption' => '',
    'options' => [],
  ],
]
?>

<?echo Carousel::widget([
  'items' => $carousel,
  'options' => ['class' => 'carousel slide pad', 'data-interval' => '12000', 'id' => 'carousel'],
  'controls' => [
  '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
  '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>']
  ]) ?>
<div class="container ">

    <div class="body-content">

        <div class="row">
            <div class="col-12">
                <h2>Зовнішня реклама</h2>

                <p>Зовнішня реклама — реклама, розміщена на вулицях, на фасаді будівлі фірми-рекламодавця (вітрина тощо), а також на транспорті. Один з найефективніших рекламних носіїв. При порівняно низьких витратах рекламний продукт піднімає свій рейтинг до дуже високого рівня, охоплюючи свою аудиторію багато разів за короткий проміжок часу. Зовнішня реклама є найбільш видовищною з усіх засобів реклами. Крім цього, в зовнішній рекламі використовується світло, анімація і будь-які фарби. І нарешті, тоді як інші засоби реклами повинні шукати свій шлях до споживача, зовнішня реклама впливає на людей в крамницях, на роботі і на відпочинку, вдень і вночі, збільшуючи прибуток від продажу рекламованих товарів.</p>

            </div>
        </div>
        <?php foreach ($types as $type): ?>
          <div class="row">
              <a href="<?= Url::toRoute(['/site/category', 'id'=>$type->id]);?>">
                  <h3><?=$type->name?></h3>
              </a>
          </div>
          <div class="row">
            <?php foreach ($categories[$type->name] as $item): ?>
              <a href="<?= Url::toRoute(['/site/contact', 'id'=>$item->id]);?>">
                <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
                    <div class="container-fluid" id='item'>
                        <img src="<?=$item->getImage()?>" alt="">
                        <p class="adress"><?=$item->adress?></p>
                        <?php if ($item->is_ordered == 0): ?>
                          <p class="free">вільна</p>
                          <?php else: ?>
                          <p class="non-free">зайнята</p>
                        <?php endif; ?>
                    </div>
                </div>
              </a>
            <?php endforeach; ?>


          </div>
        <?php endforeach; ?>


    </div>
</div>
