<?php
/**
 * Copyright (C) $user$, Inc - All Rights Reserved
 *
 *  <other text>
 * @file        DefOperatorQuery.php
 * @author      ignatenkovnikita
 * @date        $date$
 */

namespace ignatenkovnikita\defcode\models\query;

use yii\helpers\ArrayHelper;

/**
 * This is the ActiveQuery class for [[DefOperator]].
 *
 * @see DefOperator
 */
class DefOperatorQuery extends \common\ActiveQuery
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
     * @return DefOperator[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DefOperator|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    
    public function byMnc($mnc){
        return $this->andWhere(['mnc' => $mnc]);
    }
}
