<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $email
 * @property string|null $password
 * @property int|null $type
 * @property string|null $photo
 *
 * @property Add[] $adds
 * @property Deal[] $deals
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['name', 'surname', 'email', 'password', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'password' => 'Password',
            'type' => 'Type',
            'photo' => 'Photo',
        ];
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }
    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public static function findByEmail($email)
    {
        return User::find()->where(['email'=>$email])->one();
    }

    public function validatePassword($password)
    {
        return ($this->password == $password) ? true : false;
    }

    public function create()
    {
        return $this->save(false);
    }

    public function saveImage($filename)
        {
            $this->photo = $filename;
            return $this->save(false);
        }

        public function getImage()
        {
            return ($this->photo) ? '/uploads/' . $this->photo : '/no-image.png';
        }

        public function deleteImage()
        {
            $imageUploadModel = new ImageUpload();
            $imageUploadModel->deleteCurrentImage($this->photo);
        }

        public function beforeDelete()
        {
            $this->deleteImage();
            return parent::beforeDelete(); // TODO: Change the autogenerated stub
        }



    /**
     * Gets query for [[Adds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdds()
    {
        return $this->hasMany(Add::className(), ['owner_id' => 'id']);
    }

    /**
     * Gets query for [[Deals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeals()
    {
        return $this->hasMany(Deal::className(), ['user_id' => 'id']);
    }
}
