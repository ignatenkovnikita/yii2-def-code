<?php
/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 19/06/2018
 * Time: 17:33
 */

namespace ignatenkovnikita\defcode\models;


use ignatenkovnikita\defcode\models\query\DefMnpQuery;
use yii\db\ActiveRecord;

class DefMnp extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'def_mnp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'def_mnc_mcc_id'], 'required'],
            [['phone', 'def_mnc_mcc_id'], 'integer'],
            [['def_mnc_mcc_id'], 'exist', 'skipOnError' => true, 'targetClass' => DefMncMcc::className(), 'targetAttribute' => ['def_mnc_mcc_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'def_mnc_mcc_id' => 'Def Mnc Mcc ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \Exception
     */
    public function getDefMncMcc()
    {
        return $this->hasOne($this->called_class_namespace . '\DefMncMcc', ['id' => 'def_mnc_mcc_id']);
    }

    /**
     * @inheritdoc
     * @return DefMnpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DefMnpQuery(get_called_class());
    }
}