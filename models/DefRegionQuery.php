<?php
/**
 * Copyright (C) $user$, Inc - All Rights Reserved
 *
 *  <other text>
 * @file        DefRegionQuery.php
 * @author      ignatenkovnikita
 * @date        $date$
 */

namespace ignatenkovnikita\defcode\models;

use yii\helpers\ArrayHelper;

/**
 * This is the ActiveQuery class for [[DefRegion]].
 *
 * @see DefRegion
 */
class DefRegionQuery extends \common\ActiveQuery
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
     * @return DefRegion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DefRegion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
