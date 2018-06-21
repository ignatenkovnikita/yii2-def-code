<?php
/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 20/06/2018
 * Time: 22:39
 */

namespace ignatenkovnikita\defcode\models\query;


use common\behaviors\ListBehavior;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class DefMncMccQuery extends ActiveQuery
{
    public function asList($key = 'id', $name = 'name', $options = [])
    {
        return ArrayHelper::map($this->all(), $key, $name);
    }
    /**
     * @inheritdoc
     * @return \common\models\generated\models\DefMncMcc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\generated\models\DefMncMcc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}