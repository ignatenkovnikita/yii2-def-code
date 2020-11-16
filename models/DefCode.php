<?php

namespace ignatenkovnikita\defcode\models;

use ignatenkovnikita\defcode\models\query\DefCodeQuery;


/**
 * This is the model class for table "def_code".
 *
 * @property integer $id ID
 * @property integer $from From
 * @property integer $to To
 * @property integer $capacity Capacity
 * @property string $operator_id Operator
 * @property string $region_id Region
 * @property string $type Type
 * @property integer $created_at Created At
 * @property integer $updated_at Updated At
 */
class DefCode extends \yii\db\ActiveRecord
{

    const TYPE_ABC3 = 'abc3';
    const TYPE_ABC4 = 'abc4';
    const TYPE_ABC8 = 'abc8';
    const TYPE_ABC9 = 'abc9';


    public static function getTypes()
    {
        return [
            self::TYPE_ABC3,
            self::TYPE_ABC4,
            self::TYPE_ABC8,
            self::TYPE_ABC9,
        ];
    }


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
            [['from', 'to', 'capacity', 'created_at', 'updated_at', 'operator_id', 'region_id'], 'integer'],
            [['type'], 'string', 'max' => 255],
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
            'operator_id' => 'Operator Id',
            'region_id' => 'Region ID',
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

    /**
     * @return \yii\db\ActiveQuery
     * @throws \Exception
     */
    public function getOperator()
    {
        return $this->hasOne(DefOperator::class, ['id' => 'operator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \Exception
     */
    public function getRegion()
    {
        return $this->hasOne(DefRegion::class, ['id' => 'region_id']);
    }

    public static function getModelFromPhone($phone)
    {
        if (strlen($phone) != 11) {
            return null;
        }

        // we store from and to fields without 7 at the beginning
        $phone = substr($phone, 1, 10) * 1;

        return self::find()->andWhere(['<=', 'from', $phone])->andWhere(['>=', 'to', $phone])->one();
    }
}
