<?php

namespace ignatenkovnikita\defcode\models\query;

/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 19/06/2018
 * Time: 17:39
 */

class DefMnpQuery extends \yii\db\ActiveQuery
{
    public function byPhone($phone)
    {
        return $this->andWhere(['phone' => $phone]);
    }
}