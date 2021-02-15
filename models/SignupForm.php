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
    public $surname;
    public $email;
    public $phone;
    public $password;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'surname', 'email', 'phone', 'password'], 'required','message'=>'Поле має бути заповнене'],
            // rememberMe must be a boolean value
            [['name','surname','phone'], 'string'],
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

    public function attributeLabels() //Поля для формы
    {
        return [
            'name'=>'Ім\'я',
            'surname'=>'Прізвище',
            'email' => 'Електронна пошта',
            'phone'=>'Телефон',
            'password' => 'Пароль',
        ];
    }
}
