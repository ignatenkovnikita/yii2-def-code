<?php

namespace ignatenkovnikita\defcode\models\query;

use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the ActiveQuery class for [[DefCode]].
 *
 * @see DefCode
 */
class DefCodeQuery extends ActiveQuery
{

    public function asList($key = 'id', $name = 'name', $options = [])
    {
        return ArrayHelper::map($this->all(), $key, $name);
    }

    /*public function active()
    {
    return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DefCode[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DefCode|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
