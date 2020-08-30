<?php

namespace frontend\models;
use Yii;
class JobsForm extends \common\models\JobsForm
{
    public $jobs_form_view;
    public function rules()
    {
        return array_merge(parent::rules(), [
             [['jobs_form_view'], 'integer'],
        	// [['jobs_form_birthday'], 'validateDateOfBirth'],
        ]);
    }
    public function upload($attribute)
    {

        $folder_upload = Yii::getAlias('@frontend').'/web/uploads';
        $year = date("Y");
        $month = date("m");

        $folder = $folder_upload."/".$year;
        if (!is_dir($folder)) {
            mkdir($folder);
        }
        $folder = $folder_upload."/".$year."/".$month;
        if (!is_dir($folder)) {
            mkdir($folder);
        }
        $path_folder = $year."/".$month;

        if(!empty($this->$attribute)){
            $image_file = 'jobs_'.time().'.'.$this->$attribute->extension;
            $this->$attribute->saveAs($folder_upload."/".$path_folder."/".$image_file);
            return [
            'fileName' => $image_file,
            'filePath' => $path_folder
            ];
        }else{
            return false;
        }
    }
}
