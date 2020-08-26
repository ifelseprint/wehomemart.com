<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
class Banner extends \common\models\Banner
{

    public $pageSize = 25;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['pageSize'], 'integer'],
        ]);
    }
    public function upload($field)
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

        if(!empty($this->$field)){
            $image_file = $this->$field->baseName.'_'.time().'.'.$this->$field->extension;
            $this->$field->saveAs($folder_upload."/".$path_folder."/".$image_file);
            return [
            'fileName' => $image_file,
            'filePath' => $path_folder
            ];
        }else{
            return false;
        }
    }
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if ($insert) {
            //new record code here
            $this->created_user =  '1';
            $this->created_date =  date("Y-m-d H:i:s");
        } else {
            $this->modified_user =  '1';
            $this->modified_date = date("Y-m-d H:i:s");
        }
        return true;
    }
}
