<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property int|null $user_type
 * @property string $user_fullname
 * @property string $user_address
 * @property string $user_contact_name
 * @property string $user_name
 * @property string $user_login_name
 * @property string $user_password
 * @property string $user_last_logon
 * @property string $user_flg_del
 * @property string $user_partner
 * @property string $user_outlets
 * @property int $user_roles
 * @property string $user_email
 * @property string $crdate
 * @property string $mddate
 * @property string $is_active
 * @property string|null $is_admin
 * @property string|null $user_partner_temp
 * @property string|null $user_outlets_temp
 * @property string|null $user_backdate using for partner user who would like to create policy back date 1 month
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
            [['user_type', 'user_roles'], 'integer'],
            [['user_fullname', 'user_address', 'user_contact_name', 'user_name', 'user_login_name', 'user_password', 'user_last_logon', 'user_partner', 'user_outlets', 'user_roles', 'user_email', 'crdate', 'mddate'], 'required'],
            [['user_last_logon', 'crdate', 'mddate'], 'safe'],
            [['user_fullname', 'user_contact_name', 'user_login_name', 'user_password'], 'string', 'max' => 100],
            [['user_address', 'user_email'], 'string', 'max' => 150],
            [['user_name'], 'string', 'max' => 30],
            [['user_flg_del', 'is_active', 'is_admin'], 'string', 'max' => 1],
            [['user_partner', 'user_outlets', 'user_partner_temp', 'user_outlets_temp'], 'string', 'max' => 4],
            [['user_backdate'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_type' => 'User Type',
            'user_fullname' => 'User Fullname',
            'user_address' => 'User Address',
            'user_contact_name' => 'User Contact Name',
            'user_name' => 'User Name',
            'user_login_name' => 'User Login Name',
            'user_password' => 'User Password',
            'user_last_logon' => 'User Last Logon',
            'user_flg_del' => 'User Flg Del',
            'user_partner' => 'User Partner',
            'user_outlets' => 'User Outlets',
            'user_roles' => 'User Roles',
            'user_email' => 'User Email',
            'crdate' => 'Crdate',
            'mddate' => 'Mddate',
            'is_active' => 'Is Active',
            'is_admin' => 'Is Admin',
            'user_partner_temp' => 'User Partner Temp',
            'user_outlets_temp' => 'User Outlets Temp',
            'user_backdate' => 'User Backdate',
        ];
    }
}
