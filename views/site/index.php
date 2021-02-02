<?php
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$carousel = [
  [
    'content' => '<img src="/photo/concrete.jpg" />',
    'caption' => '',
    'options' => [],
  ],
  [
    'content' => '<img src="/photo/dio.jpg" />',
    'caption' => '',
    'options' => [],
  ],
  [
    'content' => '<img src="/photo/jojo.jpg" />',
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
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

            </div>
        </div>
        <div class="row">
            <a href="#">
                <h3>Категорія</h3>
            </a>
        </div>
        <div class="row">
          <a href="#">
            <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
                <div class="container-fluid" id='item'>
                    <img src="/photo/jojo.jpg" alt="">
                    <p class="adress">Кам'янецька, 74</p>
                    <p class="free">вільна</p>
                </div>
            </div>
          </a>
          <a href="#">
            <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container">
                <div class="container-fluid" id='item'>
                    <img src="/photo/dio.jpg" alt="">
                    <p class="adress">Маршала Рибалка, 2а</p>
                    <p class="free">вільна</p>
                </div>
            </div>
          </a>
          <a href="#">
            <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container">
                <div class="container-fluid" id='item'>
                    <img src="/photo/concrete.jpg" alt="">
                    <p class="adress">Кам'янецька, 74</p>
                    <p class="non-free">зайнята</p>
                </div>
            </div>
          </a>
          <a href="#">
            <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container">
                <div class="container-fluid" id='item'>
                    <img src="/photo/jojo.jpg" alt="">
                    <p class="adress">Кам'янецька, 74</p>
                    <p class="free">вільна</p>
                </div>
            </div>

          </a>
        </div>

    </div>
</div>
