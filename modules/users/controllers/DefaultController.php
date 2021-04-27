<?php

namespace app\modules\users\controllers;
use Yii;

use yii\web\Controller;
use app\models\Deal;
use app\models\Add;
use app\models\User;
use app\models\Type;
use yii\helpers\ArrayHelper;

/**
 * Default controller for the `users` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $deal = Deal::find()->where(["user_id"=>Yii::$app->user->id])->andwhere(['isConfirmed'=>1])->andwhere(['>=','from', date('Y-m-d')])->andwhere(['<=','till',date('Y-m-d')])->all();
        $ad_id = ArrayHelper::getColumn($deal,'add_id');
        if(count($ad_id)>0)
        $ad = Add::find()->where(['id'=>$ad_id])->each(4);
        $bid = Deal::find()->where(["user_id"=>Yii::$app->user->id])->andwhere(['isConfirmed'=>0])->limit(4)->all();
    //    var_dump($bid); die();
        $history = Deal::find()->where(["user_id"=>Yii::$app->user->id])->andwhere(['isConfirmed'=>1])->limit(4)->all();
        return $this->render('index',
      [
        'ads' => $ad,
        'deals'=>$bid,
        'histories'=>$history,

      ]);
    }

    public function actionDeals()
    {
       $deal = Deal::find()->where(["user_id"=>Yii::$app->user->id])->andwhere(['isConfirmed'=>1])->andwhere(['>=','from', date('Y-m-d')])->andwhere(['<=','till',date('Y-m-d')]);
       $deal = $deal->select('add_id')->distinct()->all();
       $ad_id = ArrayHelper::getColumn($deal,'add_id');
       if(count($ad_id)>0)
       $ad = Add::find()->where(['id'=>$ad_id])->all();
       return $this->render('deals',
       [
         'ads' -> $deal,
       ]);
    }

    public function actionOrders()
    {
        $orders = Deal::find()->where(["user_id"=>Yii::$app->user->id])->andwhere(['isConfirmed'=>0])->all();
        return $this->render('orders',[
          'orders'=>$orders,
        ]);
    }

    public function actionHistories()
    {
      $history = Deal::find()->where(["user_id"=>Yii::$app->user->id])->andwhere(['isConfirmed'=>1])->all();
      return $this->render('histories',
    [
      'histories'=>$history,
    ]);
    }
}
