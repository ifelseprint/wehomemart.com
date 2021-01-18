<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_category".
 *
 * @property int $project_category_id
 * @property string|null $project_category_name_th
 * @property string|null $project_category_name_en
 * @property int|null $is_active 0 = inactive, 1 = active
 * @property int|null $created_user
 * @property string|null $created_date
 * @property int|null $modified_user
 * @property string|null $modified_date
 */
class ProjectCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'created_user', 'modified_user'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['project_category_name_th', 'project_category_name_en'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'project_category_id' => 'Project Category ID',
            'project_category_name_th' => 'Project Category Name Th',
            'project_category_name_en' => 'Project Category Name En',
            'is_active' => 'Is Active',
            'created_user' => 'Created User',
            'created_date' => 'Created Date',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
        ];
    }
}
