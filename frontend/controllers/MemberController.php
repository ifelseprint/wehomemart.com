<?php

namespace frontend\controllers;
use frontend\models\LoginForm;
use frontend\models\Users;
use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class MemberController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $Users = new Users();

        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();

            if ($Users->load($post) && $Users->validate()){

                // echo "<pre>";
                // print_r($post);
                // echo "</pre>";
                // exit;

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

                        $sendmail = $this->sendmail($Users,$post['Users']['login_password']);

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
            }else{
                return json_encode([
                    "status" => false,
                    "response" => $Users->getErrors()
                ]);
            }
        }

        $provinces_name = "name_".Yii::$app->language;
        return $this->renderAjax('index', [
            'Users' => $Users,
            'dataProvinces' => ArrayHelper::map(\common\models\Provinces::find()
                ->orderBy([$provinces_name => SORT_ASC])
                ->all(), 'id', $provinces_name),
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

    public function sendmail($users=null,$password=null)
    {

        $mail = Yii::$app->mailer->compose('layouts/member',[
            'users'    => $users,
            'password' => $password
        ]);
        $mail->setFrom('noreply.wehomemart@gmail.com');
        $mail->setTo($users->user_email);
        $mail->setSubject('Member from wehomemart.com');

        $mail->send();
        return $mail;
    }
    public function actionAmphurList($id)
    {
        $amphures_name = "name_".Yii::$app->language;
        $models = \common\models\Amphures::find()
        ->where(['province_id'=> $id])
        ->orderBy(['name_th' => SORT_ASC])
        ->asArray()
        ->all();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'data' => $models
        ];
    }

    public function actionDistrictList($id)
    {
        $amphures_name = "name_".Yii::$app->language;
        $models = \common\models\Districts::find()
        ->where(['amphure_id'=> $id])
        ->andWhere(['!=','zip_code', 0])
        ->orderBy(['name_th' => SORT_ASC])
        ->asArray()
        ->all();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'data' => $models
        ];
    }

    public function actionZipcodeList($id)
    {
        $amphures_name = "name_".Yii::$app->language;
        $models = \common\models\Districts::find()
        ->where(['id'=> $id,])
        ->andWhere(['!=','zip_code', 0])
        ->orderBy(['zip_code' => SORT_ASC])
        ->asArray()
        ->all();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'data' => $models
        ];
    }
    public function convert($model,$id)
    {
        $name = "name_".Yii::$app->language;
        $models = $model::find()
        ->where(['id'=> $id])
        ->asArray()
        ->one();

        return $models[$name];
    }
}
