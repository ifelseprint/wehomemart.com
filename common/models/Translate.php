<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "translate".
 *
 * @property int $translate_id
 * @property string|null $translate_th
 * @property string|null $translate_en
 * @property int|null $modified_user
 * @property string|null $modified_date
 */
class Translate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['translate_th', 'translate_en'], 'string'],
            [['modified_user'], 'integer'],
            [['modified_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'translate_id' => 'Translate ID',
            'translate_th' => 'Translate Th',
            'translate_en' => 'Translate En',
            'modified_user' => 'Modified User',
            'modified_date' => 'Modified Date',
        ];
    }
}
