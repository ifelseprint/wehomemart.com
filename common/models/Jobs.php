<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobs".
 *
 * @property int $jobs_id
 * @property string|null $jobs_name_th
 * @property string|null $jobs_name_en
 * @property string|null $jobs_content_th
 * @property string|null $jobs_content_en
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
 * @property int|null $pageview
 */
class Jobs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jobs_content_th', 'jobs_content_en'], 'string'],
            [['is_active', 'created_user', 'modified_user', 'pageview'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['jobs_name_th', 'jobs_name_en'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jobs_id' => 'Jobs ID',
            'jobs_name_th' => 'Jobs Name Th',
            'jobs_name_en' => 'Jobs Name En',
            'jobs_content_th' => 'Jobs Content Th',
            'jobs_content_en' => 'Jobs Content En',
            'is_active' => '0 = inactive, 1 = active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
            'pageview' => 'Pageview',
        ];
    }
}
