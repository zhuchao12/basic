<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_user".
 *
 * @property int $user_id
 * @property string $user_email
 * @property string $user_tel
 * @property string $user_pwd
 * @property string $user_code
 * @property int $create_time
 * @property int $error_num
 * @property int $last_error_time
 */
class ShopUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_time', 'error_num', 'last_error_time'], 'integer'],
            [['user_email'], 'string', 'max' => 45],
            [['user_tel'], 'string', 'max' => 11],
            [['user_pwd'], 'string', 'max' => 32],
            [['user_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_email' => 'User Email',
            'user_tel' => 'User Tel',
            'user_pwd' => 'User Pwd',
            'user_code' => 'User Code',
            'create_time' => 'Create Time',
            'error_num' => 'Error Num',
            'last_error_time' => 'Last Error Time',
        ];
    }
}
