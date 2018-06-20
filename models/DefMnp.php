<?php
/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 19/06/2018
 * Time: 17:33
 */

namespace ignatenkovnikita\defcode\models;


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
            [['phone'], 'required'],
            [['phone'], 'integer'],
            [['mnc', 'mcc'], 'string', 'max' => 255],
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
            'mnc' => 'Mnc',
            'mcc' => 'Mcc',
        ];
    }

    /**
     * @inheritdoc
     * @return \ignatenkovnikita\defcode\models\query\DefMnpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \ignatenkovnikita\defcode\models\query\DefMnpQuery(get_called_class());
    }
}