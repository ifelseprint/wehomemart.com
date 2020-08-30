<?php

namespace frontend\controllers;
use Yii;
use frontend\models\ContactForm;
use yii\web\Request;
class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$submitForm = Yii::$app->request->post();
    	$ContactForm = new ContactForm();
       	if(Yii::$app->request->isPjax){

			$ContactForm->contact_form_first_name = $submitForm['ContactForm']['contact_form_first_name'];
			$ContactForm->contact_form_last_name = $submitForm['ContactForm']['contact_form_last_name'];
			$ContactForm->contact_form_tel = $submitForm['ContactForm']['contact_form_tel'];
			$ContactForm->contact_form_email = $submitForm['ContactForm']['contact_form_email'];
			$ContactForm->contact_form_message = $submitForm['ContactForm']['contact_form_message'];
			$ContactForm->created_date = date("Y-m-d H:i:s");
       		$ContactForm->save();

        	return $this->renderPartial('index', [
        		'ContactForm' => $ContactForm,
                'Action' => 'insert'
        	]);
        }else{
        	return $this->render('index', [
        		'ContactForm' => $ContactForm,
                'Action' => 'view'
        	]);

        }
    }
}
