<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "parameter".
 *
 * @property int $parameter_id
 * @property string|null $parameter_name
 * @property string|null $parameter_action
 * @property int|null $parameter_count
 */
class Parameter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parameter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parameter_count'], 'integer'],
            [['parameter_name', 'parameter_action'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'parameter_id' => 'Parameter ID',
            'parameter_name' => 'Parameter Name',
            'parameter_action' => 'Parameter Action',
            'parameter_count' => 'Parameter Count',
        ];
    }
}
