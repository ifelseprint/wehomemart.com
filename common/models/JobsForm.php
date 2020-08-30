<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobs_form".
 *
 * @property int $jobs_form_id
 * @property int|null $jobs_form_position
 * @property int $jobs_form_prefix 1=Mr,2=Mrs,3=Ms
 * @property string $jobs_form_first_name
 * @property string $jobs_form_last_name
 * @property string $jobs_form_birthday
 * @property int $jobs_form_nationality
 * @property string $jobs_form_tel
 * @property string $jobs_form_email
 * @property string|null $jobs_form_address
 * @property string|null $jobs_form_file
 * @property string|null $jobs_form_file_path
 * @property string $created_date
 */
class JobsForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobs_form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jobs_form_position', 'jobs_form_prefix', 'jobs_form_nationality'], 'integer'],
            [['jobs_form_prefix', 'jobs_form_first_name', 'jobs_form_last_name', 'jobs_form_birthday', 'jobs_form_nationality', 'jobs_form_tel', 'jobs_form_email', 'created_date'], 'required'],
            [['jobs_form_birthday', 'created_date'], 'safe'],
            [['jobs_form_address'], 'string'],
            [['jobs_form_first_name', 'jobs_form_last_name', 'jobs_form_email', 'jobs_form_file'], 'string', 'max' => 100],
            [['jobs_form_tel'], 'string', 'max' => 20],
            [['jobs_form_file_path'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jobs_form_id' => 'Jobs Form ID',
            'jobs_form_position' => 'Jobs Form Position',
            'jobs_form_prefix' => '1=Mr,2=Mrs,3=Ms',
            'jobs_form_first_name' => 'Jobs Form First Name',
            'jobs_form_last_name' => 'Jobs Form Last Name',
            'jobs_form_birthday' => 'Jobs Form Birthday',
            'jobs_form_nationality' => 'Jobs Form Nationality',
            'jobs_form_tel' => 'Jobs Form Tel',
            'jobs_form_email' => 'Jobs Form Email',
            'jobs_form_address' => 'Jobs Form Address',
            'jobs_form_file' => 'Jobs Form File',
            'jobs_form_file_path' => 'Jobs Form File Path',
            'created_date' => 'Created Date',
        ];
    }
}
