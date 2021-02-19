<?php

namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
use yii\data\ActiveDataProvider;

class Users extends \common\models\Users implements IdentityInterface
{
    const STATUS_DELETED = 2;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public $pageSize = 25;
    public $searchFirstName;
    public $searchLastName;
    public $searchTel;
    public $searchEmail;
    public $searchFromDate;
    public $searchToDate;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['searchFirstName', 'searchLastName', 'searchEmail'], 'string', 'max' => 100],
            [['searchTel'], 'string', 'max' => 20],
            [['searchFromDate','searchToDate'], 'safe'],
            [['pageSize'], 'integer'],
        ]);
    }
    public function search($params)
    {

        $query = Users::find();
        $query->andWhere(['=', 'user_type', 2]);
        $dataProvider = new ActiveDataProvider([
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],
            'query' => $query,
            'sort'=> [
                'defaultOrder' => ['created_date' => SORT_DESC]
            ]
        ]);

        if (!($this->load($params))) {
            return $dataProvider;
        }
        if(!empty($this->searchFromDate)){
        $query->andFilterWhere(['>=', 'created_date',date('Y-m-d', strtotime(str_replace('/', '-', $this->searchFromDate)))]);
        }
        if(!empty($this->searchToDate)){
        $query->andFilterWhere(['<=', 'created_date',date('Y-m-d', strtotime(str_replace('/', '-', $this->searchToDate)))]);
        }
        $query->andFilterWhere(['like', 'user_firstname', $this->searchFirstName]);
        $query->andFilterWhere(['like', 'user_lastname', $this->searchLastName]);
        $query->andFilterWhere(['like', 'user_telephone', $this->searchTel]);
        $query->andFilterWhere(['like', 'user_email', $this->searchEmail]);

        return $dataProvider;
    }

    public static function findIdentity($id)
    {
        return static::findOne(['login_id' => $id, 'is_active' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['login_username' => $username, 'user_type' => 1, 'is_active' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'is_active' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'is_active' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['users.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->login_password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->login_password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
