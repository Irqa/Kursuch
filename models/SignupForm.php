<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'email', 'password'], 'required'],
            // rememberMe must be a boolean value
            [['name'], 'string'],
            // password is validated by validatePassword()
            [['email'], 'email'],
            [['email'],'unique','targetClass' => 'app\models\User', 'targetAttribute'=>'email']
        ];
    }


    public function signup()
    {
      if($this->validate())
      {
        $user = new User();
        $user->attributes = $this->attributes;
        return $user->create();
      }
    }
}
