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
        <a href="#">
            <h3>Мої площини</h3>
        </a>
    </div>
    <div class="row">
      <a href="place">
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
    <!-- Заявки -->
    <div class="row">
        <a href="#">
            <h3>Заявки</h3>
        </a>
    </div>
    <div class="row">
      <a href="#">
        <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container" >
          <div class="container-fluid item" >
                <img src="/photo/jojo.jpg" alt="">
                <p class="adress">Заявник</p>
                <p>llslsl@jsjssj.sll</p>
                <p>1828288</p>
                <p class="">Кам'янецька, 74</p>
                <p class="free">вільна</p>
            </div>
        </div>
      </a>
      <a href="#">
        <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container">
            <div class="container-fluid item" >
                <img src="/photo/dio.jpg" alt="">
                <p class="adress">Заявник</p>
                <p>llslsl@jsjssj.sll</p>
                <p>1828288</p>
                <p class="">Маршала Рибалка, 2а</p>
                <p class="free">вільна</p>
            </div>
        </div>
      </a>
      <a href="#">
        <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container">
          <div class="container-fluid item" >
                <img src="/photo/concrete.jpg" alt="">
                <p class="adress">Заявник</p>
                <p>llslsl@jsjssj.sll</p>
                <p>1828288</p>
                <p class="adress">Кам'янецька, 74</p>
                <p class="non-free">зайнята</p>
            </div>
        </div>
      </a>
      <a href="#">
        <div class="col-lg-3 col-sm-3 col-xs-6" id = "i__container">
          <div class="container-fluid item" >
                <img src="/photo/jojo.jpg" alt="">
                <p class="adress">Заявник</p>
                <p>llslsl@jsjssj.sll</p>
                <p>1828288</p>
                <p class="adress">Кам'янецька, 74</p>
                <p class="free">вільна</p>
            </div>
        </div>

      </a>
    </div>

</div>
