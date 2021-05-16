<?php

namespace frontend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

class Users extends \common\models\Users implements IdentityInterface
{
    const STATUS_DELETED = 2;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public function rules()
    {
        return array_merge(parent::rules(), [
             [['login_username'], 'unique'],
        ]);
    }

    public function attributeLabels(){
        return array_merge(parent::attributeLabels(), [
            'login_username' => Yii::t('app', 'username'),
            'login_password' => Yii::t('app', 'password'),
            'user_email' => Yii::t('app', 'email'),
            'user_firstname' => Yii::t('app', 'firstname'),
            'user_lastname' => Yii::t('app', 'lastname'),
            'user_telephone' => Yii::t('app', 'telephone'),
            'user_age' => Yii::t('app', 'age'),
            'user_career' => Yii::t('app', 'career'),
            'user_location' => Yii::t('app', 'location'),
            'user_company' => Yii::t('app', 'company'),
            'user_address' => Yii::t('app', 'address'),
            'user_building' => Yii::t('app', 'building'),
            'user_moo' => Yii::t('app', 'moo'),
            'user_district' => Yii::t('app', 'district'),
            'user_amphur' => Yii::t('app', 'amphur'),
            'user_province' => Yii::t('app', 'province'),
            'user_postal_code' => Yii::t('app', 'postal_code'),
            'user_address_tax' => Yii::t('app', 'address_tax'),
            'tax_id' => Yii::t('app', 'tax_id'),
            'tax_address' => Yii::t('app', 'address'),
            'tax_building' => Yii::t('app', 'building'),
            'tax_moo' => Yii::t('app', 'moo'),
            'tax_district' => Yii::t('app', 'district'),
            'tax_amphur' => Yii::t('app', 'amphur'),
            'tax_province' => Yii::t('app', 'province'),
            'tax_postal_code' => Yii::t('app', 'postal_code'),
            'user_customer' => Yii::t('app', 'checked_customer')
        ]);
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
        return static::findOne(['login_username' => $username, 'user_type' => 2, 'is_active' => self::STATUS_ACTIVE]);
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
