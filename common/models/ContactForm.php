<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_form".
 *
 * @property int $contact_form_id
 * @property string $contact_form_first_name
 * @property string $contact_form_last_name
 * @property string $contact_form_tel
 * @property string $contact_form_email
 * @property string|null $contact_form_message
 * @property string $created_date
 */
class ContactForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contact_form_first_name', 'contact_form_last_name', 'contact_form_tel', 'contact_form_email', 'created_date'], 'required'],
            [['contact_form_message'], 'string'],
            [['created_date'], 'safe'],
            [['contact_form_first_name', 'contact_form_last_name', 'contact_form_email'], 'string', 'max' => 100],
            [['contact_form_tel'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contact_form_id' => 'Contact Form ID',
            'contact_form_first_name' => 'Contact Form First Name',
            'contact_form_last_name' => 'Contact Form Last Name',
            'contact_form_tel' => 'Contact Form Tel',
            'contact_form_email' => 'Contact Form Email',
            'contact_form_message' => 'Contact Form Message',
            'created_date' => 'Created Date',
        ];
    }
}
