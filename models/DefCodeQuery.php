<?php

namespace ignatenkovnikita\defcode\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\common\models\generated\models\DefCode]].
 *
 * @see \common\models\generated\models\DefCode
 */
class DefCodeQuery extends ActiveQuery
{
    /*public function active()
    {
    return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\generated\models\DefCode[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\generated\models\DefCode|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
