<?php

namespace frontend\controllers;
use Yii;
use common\models\Jobs;
use frontend\models\JobsForm;
use yii\web\UploadedFile;
use yii\web\Request;
class JoinController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$Jobs = Jobs::findAll(['is_active' => 1]);
        return $this->render('index', [
    		'Jobs' => $Jobs,
    	]);
    }
    public function actionView()
    {
        $submitForm = Yii::$app->request->post();
        $slug_id = Yii::$app->getRequest()->getQueryParam('slug_id');
        $JobsForm = new JobsForm();
        $Jobs = Jobs::findOne(['is_active' => 1,'jobs_id'=>$slug_id]);

        if(Yii::$app->request->isPjax){

            $JobsForm->jobs_form_position = $submitForm['JobsForm']['jobs_form_view'];
            $JobsForm->jobs_form_prefix = $submitForm['JobsForm']['jobs_form_prefix'];
            $JobsForm->jobs_form_first_name = $submitForm['JobsForm']['jobs_form_first_name'];
            $JobsForm->jobs_form_last_name = $submitForm['JobsForm']['jobs_form_last_name'];
            $JobsForm->jobs_form_birthday = date('Y-m-d', strtotime(str_replace('/', '-', $submitForm['JobsForm']['jobs_form_birthday'])));
            $JobsForm->jobs_form_nationality = $submitForm['JobsForm']['jobs_form_nationality'];
            $JobsForm->jobs_form_tel = $submitForm['JobsForm']['jobs_form_tel'];
            $JobsForm->jobs_form_email = $submitForm['JobsForm']['jobs_form_email'];
            $JobsForm->jobs_form_address = $submitForm['JobsForm']['jobs_form_address'];
            $JobsForm->jobs_form_file = UploadedFile::getInstance($JobsForm, 'jobs_form_file');
            $jobs_form_file = $JobsForm->upload('jobs_form_file');
            if(!empty($jobs_form_file)){
                $JobsForm->jobs_form_file = $jobs_form_file['fileName'];
                $JobsForm->jobs_form_file_path = $jobs_form_file['filePath'];
            }
            $JobsForm->created_date = date("Y-m-d H:i:s");
            $JobsForm->save();

            return $this->renderAjax('view', [
                'Jobs' => $Jobs,
                'JobsForm' => $JobsForm,
                'JobView' => $slug_id,
                'Action' => 'insert'
            ]);

        }else{
            return $this->render('view', [
                'Jobs' => $Jobs,
                'JobsForm' => $JobsForm,
                'JobView' => $slug_id,
                'Action' => 'view'
            ]);

        }
    }
}
