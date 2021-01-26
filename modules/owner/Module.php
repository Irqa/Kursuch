<?php

namespace app\modules\owner;


use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use app\models\User;
/**
 * owner module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $layout = '/owner';
    public $controllerNamespace = 'app\modules\owner\controllers';

    /**
     * {@inheritdoc}
     */
     public function behaviors()
     {
       return [
         'access' => [
           'class' => AccessControl::className(),
           'denyCallback' => function($rule, $action)
           {
             return Yii::$app->response->redirect(['auth/login']);
             //throw new \yii\web\NotFoundHttpException();
           },
           'rules' => [
             [
             'allow' => true,
             'matchCallback' => function($rule, $action)
             {
               if(!Yii::$app->user->isGuest)
               {
                 $user = User::findOne(Yii::$app->user->id);
                 return ($user->type == 1);
               }
               return !Yii::$app->user->isGuest;
             }
             ]
           ]
         ]
       ];
     }


    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
