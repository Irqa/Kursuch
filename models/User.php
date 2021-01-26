<?php

namespace app\models;

use Yii;

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
class User extends \yii\db\ActiveRecord
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
