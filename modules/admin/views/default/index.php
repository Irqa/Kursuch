<div class="container ">
    <div class="row">
        <div class="col-xs-12">
            <h1><?php echo Yii::$app->user->identity->name ?> </h1>
            <p>(<?php echo Yii::$app->user->identity->email ?>)</p>
            <h2><?php echo Yii::$app->user->identity->phone ?></h2>
        </div>
    <!-- </div>
    <div class="row">
        <a href="#">
            <h3>Мої площини</h3>
        </a>
    </div>
    <div class="row">
        <a href="#">
            <h3>Заявки</h3>
        </a>
    </div> -->
</div>
