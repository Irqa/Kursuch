<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deal".
 *
 * @property int $id
 * @property int|null $add_id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $from
 * @property string|null $till
 * @property int|null $isConfirmed
 *
 * @property Add $add
 * @property User $user
 */
class Deal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['add_id', 'user_id', 'isConfirmed'], 'integer'],
            //[['from', 'till'], 'safe'],
            [['from', 'till'], 'date', 'format' =>'php:Y-m-d'],
            [['from', 'till'], 'default', 'value' => date('Y-m-d')],
            [['email'],'email'],
            [['add_id'], 'exist', 'skipOnError' => true, 'targetClass' => Add::className(), 'targetAttribute' => ['add_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'add_id' => 'ID площини',
            'user_id' => 'ID замовника',
            'from' => 'Від',
            'till' => 'До',
            'isConfirmed' => 'Затверджено?',
        ];
    }

    /**
     * Gets query for [[Add]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdd()
    {
        return $this->hasOne(Add::className(), ['id' => 'add_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
