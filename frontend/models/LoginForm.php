<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $login_username;
    public $login_password;
    public $rememberMe = true;

    private $_user;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['login_username', 'login_password'], 'required'],
            // rememberMe must be a boolean value
            // ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['login_password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->login_password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {   

        if ($this->validate()) {

            $session = Yii::$app->session;
            $session->set('users', $this->getUser());
            return true;
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = \frontend\models\Users::findByUsername($this->login_username);
        }
        return $this->_user;
    }
}
