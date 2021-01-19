<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $login_id
 * @property string $login_username
 * @property string $login_password
 * @property string|null $password_reset_token
 * @property string|null $auth_key
 * @property string|null $verification_token
 * @property int|null $is_active
 * @property string|null $user_email
 * @property string|null $user_firstname
 * @property string|null $user_lastname
 * @property string|null $user_telephone
 * @property int|null $user_age
 * @property string|null $user_career
 * @property string|null $user_location
 * @property string|null $user_company
 * @property string|null $user_tax_id
 * @property string|null $user_address
 * @property string|null $user_building
 * @property string|null $user_moo
 * @property string|null $user_district
 * @property string|null $user_amphur
 * @property string|null $user_province
 * @property int|null $user_postal_code
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
 * @property int|null $user_type
 */
class Users extends \yii\db\ActiveRecord
{
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
            [['login_username', 'login_password'], 'required'],
            [['is_active', 'user_age', 'user_postal_code', 'created_user', 'modified_user', 'user_type'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['login_username', 'password_reset_token', 'auth_key', 'verification_token', 'user_email', 'user_firstname', 'user_lastname', 'user_location', 'user_company', 'user_address'], 'string', 'max' => 255],
            [['login_password', 'user_career', 'user_building', 'user_moo', 'user_district', 'user_amphur', 'user_province'], 'string', 'max' => 100],
            [['user_telephone', 'user_tax_id'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'login_id' => 'Login ID',
            'login_username' => 'Login Username',
            'login_password' => 'Login Password',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'verification_token' => 'Verification Token',
            'is_active' => 'Is Active',
            'user_email' => 'User Email',
            'user_firstname' => 'User Firstname',
            'user_lastname' => 'User Lastname',
            'user_telephone' => 'User Telephone',
            'user_age' => 'User Age',
            'user_career' => 'User Career',
            'user_location' => 'User Location',
            'user_company' => 'User Company',
            'user_tax_id' => 'User Tax ID',
            'user_address' => 'User Address',
            'user_building' => 'User Building',
            'user_moo' => 'User Moo',
            'user_district' => 'User District',
            'user_amphur' => 'User Amphur',
            'user_province' => 'User Province',
            'user_postal_code' => 'User Postal Code',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
            'user_type' => 'User Type',
        ];
    }
}
