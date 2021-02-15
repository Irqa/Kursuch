<?php

namespace app\modules\owner\controllers;
use Yii;

use yii\web\Controller;
use app\models\Deal;

/**
 * Default controller for the `owner` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPlace()
    {
        return $this->render('place');
    }

    public function actionDeal()
    {
      $model = new Deal();

      if(Yii::$app->request->isPost)
      {

        $model->load(Yii::$app->request->post());
        if($model->from!=null)
          return $this->redirect(['default/place']);

      }
      return $this->render('deal',['model'=>$model]);
    }
}
