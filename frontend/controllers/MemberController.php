<?php

namespace frontend\controllers;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Users;
use frontend\models\LoginForm;
use yii;

class MemberController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $Users = new Users();

        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if ($Users->load($post)){

                $Users->user_email = $post['Users']['login_username'];
                $Users->login_password =  $Users->setPassword($post['Users']['login_password']);
                $Users->is_active = 1;
                $Users->user_type = 2;
                $Users->created_date = new \yii\db\Expression('NOW()');
                $Users->modified_date = new \yii\db\Expression('NOW()');
                $Users->setPassword($post['Users']['login_password']);
                $Users->generateAuthKey();
                $Users->generateEmailVerificationToken();

                if ($Users->save()) {

                    $LoginForm = new LoginForm();
                    $LoginForm->login_username = $post['Users']['login_username'];
                    $LoginForm->login_password = $post['Users']['login_password'];

                    if($LoginForm->login()){
                        return json_encode([
                            "status" => true,
                            "response" => Yii::t('app', 'response_register_success')
                        ]);

                    }else{
                        return json_encode([
                            "status" => false,
                            "response" => Yii::t('app', 'response_login_unsuccess')
                        ]);
                    }

                }else{
                    return json_encode([
                        "status" => false,
                        "response" => $Users->getErrors()
                    ]);
                }
            }
        }

        return $this->renderAjax('index', [
            'Users' => $Users,
        ]);
    }
    public function actionLogin()
    {
        $post = Yii::$app->request->post();
        $LoginForm = new LoginForm();
        $LoginForm->login_username = $post['Users']['login_username'];
        $LoginForm->login_password = $post['Users']['login_password'];
        if($LoginForm->login()){
            return json_encode([
                "status" => true,
                "response" => Yii::t('app', 'response_login_success')
            ]);

        }else{
            return json_encode([
                "status" => false,
                "response" => Yii::t('app', 'response_login_unsuccess')
            ]);
        }
    }
    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->remove('users');

        return $this->redirect(['home/index']);
    }
    
}
