<?php

namespace ignatenkovnikita\defcode\models;

use Yii;

/**
 * This is the model class for table "def_code".
 *
 * @property integer $id ID
 * @property integer $from From
 * @property integer $to To
 * @property integer $capacity Capacity
 * @property string $operator Operator
 * @property string $region Region
 * @property string $type Type
 * @property integer $created_at Created At
 * @property integer $updated_at Updated At
 */
class DefCode extends \common\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => \yii\behaviors\TimestampBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'def_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from', 'to', 'capacity', 'created_at', 'updated_at'], 'integer'],
            [['operator', 'region', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'capacity' => 'Capacity',
            'operator' => 'Operator',
            'region' => 'Region',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return DefCodeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DefCodeQuery(get_called_class());
    }
}
