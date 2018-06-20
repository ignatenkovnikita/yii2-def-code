<?php
/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 20/06/2018
 * Time: 22:27
 */

namespace ignatenkovnikita\defcode\models;
use ignatenkovnikita\defcode\models\query\DefMncMccQuery;

/**
 * This is the model class for table "def_mnc_mcc".
 *
 * @property integer $id ID
 * @property integer $mnc Mnc
 * @property integer $mcc Mcc
 * @property string $name Name
 *
 * @property DefMnp[] $defMnps
 */
class DefMncMcc extends \common\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'def_mnc_mcc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mnc', 'mcc', 'name'], 'required'],
            [['mnc', 'mcc'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mnc' => 'Mnc',
            'mcc' => 'Mcc',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \Exception
     */
    public function getDefMnps()
    {
        return $this->hasMany(DefMnp::class, ['def_mnc_mcc_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\DefMncMccQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DefMncMccQuery(get_called_class());
    }
}
