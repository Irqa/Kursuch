<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Add;
use app\models\User;
use app\models\Deal;
use app\models\Type;
use app\models\SignupForm;
use app\models\ImageUpload;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\db\Query;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{


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
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdmins()
    {
        $admins = User::find()->where(['type' => 2])/*->andWhere(['!=','id',Yii::$app->user->id])*/->all();
        return $this->render('admins',[
          'admins' => $admins,
        ]);
    }

    public function actionAdmin()
    {
        $model = new SignupForm();

        if(Yii::$app->request->isPost)
        {
          $model->load(Yii::$app->request->post());
          $model->type=2;
          if($model->signup())
          {
            return $this->redirect(['admins']);
          }
        }

        return $this->render('admin',['model'=>$model]);
    }


    public function actionOwners()
    {
        $admins = User::find()->where(['type' => 1])/*->andWhere(['!=','id',Yii::$app->user->id])*/->all();
        return $this->render('owners',[
          'admins' => $admins,
        ]);
    }

    public function actionOwner()
    {
        $model = new SignupForm();

        if(Yii::$app->request->isPost)
        {
          $model->load(Yii::$app->request->post());
          $model->type=1;
          if($model->signup())
          {
            return $this->redirect(['owners']);
          }
        }
        return $this->render('owner',['model'=>$model]);
      }

    public function actionDeletea($id)
    {
        $admin = User::find()->where(['id'=>$id])->one();
        $admin->delete();
        //$this->findModel($id)->delete();

        return $this->redirect(['admins']);
    }
    public function actionDeletet($id)
    {
        $admin = Type::find()->where(['id'=>$id])->one();
        $admin->delete();
        //$this->findModel($id)->delete();

        return $this->redirect(['types']);
    }

    public function actionDeletep($id)
    {
        $admin = Add::find()->where(['id'=>$id])->one();
        $admin->delete();
        //$this->findModel($id)->delete();

        return $this->redirect(['places']);
    }

    public function actionPlaces()
    {
      $places = Add::find()->all();
      $this->CheckAdd();
      return $this->render('places',[
          'places' => $places,
      ]);
    }

    public function actionTypes()
    {
        $types = Type::find()->all();
        return $this->render('types',[
            'types' => $types,
        ]);
    }

    public function actionType()
    {
        $model = new Type();

        if(Yii::$app->request->isPost)
        {
          $model->load(Yii::$app->request->post());
          if($model->save())
          {
            return $this->redirect(['types']);
          }
        }

        return $this->render('type',['model'=>$model]);
    }

    public function actionPlace()
    {
      $model = new Add();
      $photo = new ImageUpload();
      $types = ArrayHelper::map(Type::find()->all(),'id','name');

      $owners = ArrayHelper::map((new Query())->select(['id','CONCAT(surname, \' (\', email, \')\') AS arr'])->from('user')->where(['type'=>1])->all(),'id','arr');
      if(Yii::$app->request->isPost)
      {
          $model->load(Yii::$app->request->post());
          if($model->save())
          {
              $add = Add::findone($model->id);

              $file = UploadedFile::getInstance($photo, 'image');
              $type = Yii::$app->request->post('type_id');
              $owner = Yii::$app->request->post('owner_id');


              if( $add->saveImage($photo->uploadFile($file, $add->photo)))
              {
                  if($add->saveType($type) && $add->saveOwner($owner))
                      return $this->redirect('places');
              }
          }
      }
      return $this->render('place_form', [
          'model' => $model,
          'photo' => $photo,
          'types' => $types,
          'owners' => $owners,
      ]);
    }


    public function actionUpdatePlace($id)
    {
          $model = Add::find()->where(['id'=>$id])->one();
          $photo = new ImageUpload();
          $types = ArrayHelper::map(Type::find()->all(),'id','name');
          $owners = ArrayHelper::map((new Query())->select(['id','CONCAT(surname, \' (\', email, \')\') AS arr'])->from('user')->where(['type'=>1])->all(),'id','arr');
          if(Yii::$app->request->isPost)
          {
              $model->load(Yii::$app->request->post());
              $file = UploadedFile::getInstance($photo, 'image');
              $type = Yii::$app->request->post('type_id');
              $owner = Yii::$app->request->post('owner_id');

              if(is_null($file))
              {
                if($model->saveType($type) && $model->saveOwner($owner))
                    return $this->redirect('places');
              }
                  if( $model->saveImage($photo->uploadFile($file, $model->photo)))
                  {
                      if($model->saveType($type) && $model->saveOwner($owner))
                          return $this->redirect('places');
                  }

          }
          $typeName = Type::find(['id'=>$model->type])->one();
          return $this->render('place', [
              'model' => $model,
              'photo' => $photo,
              'types' => $types,
              'type' => $typeName->name,
              'owners' => $owners,
          ]);
    }
}
