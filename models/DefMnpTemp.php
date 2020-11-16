<?php

namespace ignatenkovnikita\defcode\models;

use Yii;

/**
 * This is the model class for table "def_mnp_temp".
 *
 * @property integer $number Number
 * @property integer $mcc Mcc
 * @property integer $mnc Mnc
 */
class DefMnpTemp extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%def_mnp_temp}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'mcc', 'mnc'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'number' => 'Number',
            'mcc' => 'Mcc',
            'mnc' => 'Mnc',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\DefMnpTempQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DefMnpTempQuery(get_called_class());
    }
}
