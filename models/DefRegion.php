<?php
/**
 * Copyright (C) $user$, Inc - All Rights Reserved
 *
 *  <other text>
 * @file        DefRegion.php
 * @author      ignatenkovnikita
 * @date        $date$
 */

namespace ignatenkovnikita\defcode\models;

use ignatenkovnikita\defcode\models\query\DefRegionQuery;
use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "def_region".
 *
 * @property integer $id ID
 * @property string $name Name
 *
 * @property DefCode[] $defCodes
 */
class DefRegion extends \common\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'def_region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \Exception
     */
    public function getDefCodes()
    {
        return $this->hasMany(DefCode::class, ['region_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return DefRegionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DefRegionQuery(get_called_class());
    }


    public static function createOrExist($name)
    {
        $model = self::find()->andWhere(['name' => $name])->one();
        if (empty($model)) {
            $model = new self();
            $model->name = $name;
            if (!$model->save()) {
                throw  new Exception('Fail save ' . get_class($model));
            }
        }
        return $model;
    }
}
