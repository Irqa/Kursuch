<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\helpers\Url;


class Menu extends Model
{
  public static function getItems()
  {
      $types = Type::find()->all();
      $i=0;
      foreach ($types as $type) {
        $array[$i] = [
          'label' => $type->name,
          'url' => Url::toRoute(['/site/category', 'id'=>$type->id]),
        ];
        $i++;
      }
      return $array;
  }
}
