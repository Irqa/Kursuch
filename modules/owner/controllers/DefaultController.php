<?php

namespace app\modules\owner\controllers;
use Yii;

use yii\web\Controller;
use app\models\Deal;
use app\models\Add;
use app\models\User;
use app\models\Type;

/**
 * Default controller for the `owner` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

     public function CheckAdd()
     {
         $adds = Add::find()->all();
         foreach ($adds as $add) {
             $orders = Deal::find()->where(['add_id'=>$add->id])->all();
             $add->setOrder(0);

             foreach ($orders as $o) {
               if ($o->isConfirmed == 1)
               {
                 if($o->from <= date('Y-m-d') && $o->till >= date('Y-m-d'))
                     $add->setOrder(1);
               }
             }
         }
     }


    public function actionIndex()
    {
        $this->CheckAdd();
        $myPlaces = Add::find()->where(['owner_id'=>Yii::$app->user->id])->each(4);
        $i=0;
        $mp = Add::find()->where(['owner_id'=>Yii::$app->user->id])->all();
        foreach ($myPlaces as $pl) {
          $pid[$i]=$pl->id;
          $i++;
        }
        $deals = Deal::find()->where(['add_id'=>$pid,'isConfirmed'=>0])->with('add')->each(4);
        $history = Deal::find()->where(['add_id'=>$pid,'isConfirmed'=>1])->with('add')->each(4);
        return $this->render('index',[
            'places' => $myPlaces,
            'deals' => $deals,
            'history' =>$history,
        ]);
    }

    public function actionPlaces()
    {
        $this->CheckAdd();
        $places = Add::find()->where(["owner_id"=>Yii::$app->user->id])->all();
        return $this->render('places',
      [
        'places' => $places,
      ]);
    }

    public function actionOrders()
    {
        $this->CheckAdd();
        $i=0;
        $mp = Add::find()->where(['owner_id'=>Yii::$app->user->id])->all();
        foreach ($mp as $pl) {
          $pid[$i]=$pl->id;
          $i++;
        }
        $orders = Deal::find()->where(["add_id"=>$pid,'isConfirmed'=>0])->all();
        return $this->render('orders',
      [
        'deals' => $orders,
      ]);
    }

    public function actionHistories()
    {
      $this->CheckAdd();
      $i=0;
      $mp = Add::find()->where(['owner_id'=>Yii::$app->user->id])->all();
      foreach ($mp as $pl) {
        $pid[$i]=$pl->id;
        $i++;
      }
      $history = Deal::find()->where(["add_id"=>$pid,'isConfirmed'=>1])->all();
      return $this->render('histories',
    [
      'history' => $history,
    ]);
    }

    public function actionDeal($id)
    {
      $model = Deal::find()->where(['id'=>$id])->one();
      $add = Add::find()->where(['id'=>$model->add_id])->one();

      $model->isConfirmed=1;
      if(Yii::$app->request->isPost)
      {
        $model->load(Yii::$app->request->post());

        $model->save();

          return $this->redirect(['default']);

      }
      return $this->render('deal',[
        'model'=>$model,
        'add' =>$add,
      ]);
    }
}
