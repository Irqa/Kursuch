<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Add;
use app\models\User;
use app\models\Deal;
use app\models\Type;
use yii\filters\VerbFilter;
use app\models\SignupForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->CheckAdd();
        $types = Type::find()->all();
        foreach ($types as $type) {
          $places = Add::find()->where(['type_id'=>$type->id])->each(4);
          $categories[$type->name] = $places;
        }
        return $this->render('index',[
            'types' => $types,
            'categories' => $categories
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact($id)
    {
        $place = Add::find()->where(['id'=>$id])->one();
        $model = new ContactForm();
        if(!Yii::$app->user->isGuest)
        {
            $user = User::find()->where(['id'=>Yii::$app->user->id])->one();
            $model->name = $user->name;
            $model->email = $user->email;
            $model->phone = $user->phone;
        }
        if ($model->load(Yii::$app->request->post())) {
          if(!Yii::$app->user->isGuest)
          {
            $user = User::find()->where(['id'=>Yii::$app->user->id])->one();
            if($model->name == $user->name && $model->email == $user->email && $model->phone == $user->phone )
            $model->sendForm($id,Yii::$app->user->id);
            else
            $model->sendForm($id);
          }
          else {
            $model->sendForm($id);
          }
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
            'place' => $place
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionCategory($id)
    {
        $this->CheckAdd();
        $type = Type::find()->where(['id'=>$id])->one();
        $items = Add::find()->where(['type_id'=>$id])->all();
        return $this->render('category',[
            'places' => $items,
            'type' => $type,
        ]);
    }
}
