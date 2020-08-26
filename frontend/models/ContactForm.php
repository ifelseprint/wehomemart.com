<?php

namespace frontend\models;
use Yii;
class ContactForm extends \common\models\ContactForm
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            // [['contact_form_tel'], 'required']
        ]);
    }

}
