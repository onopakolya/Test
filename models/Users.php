<?php

namespace app\models;

use PharIo\Manifest\Email;
use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $ID
 * @property string $email
 * @property string $name
 * @property string $password
 * @property string $token
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }

    public function getId()
    {
        return $this->ID;
    }

    public function getAuthKey()
    {
        return $this->token;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

     public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
        
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'email' ],
            [['email', 'name', 'password', 'token'], 'required'],
            [['email', 'name', 'password', 'token'], 'string', 'max' => 255],
            ['email','unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'email' => 'Почта',
            'name' => 'Имя',
            'password' => 'Пароль',
            'token' => 'Токен',
        ];
    }
}
