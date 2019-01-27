<?php

namespace ignatenkovnikita\defcode\models\query;

use yii\db\ActiveQuery;

/**
* This is the ActiveQuery class for [[\common\models\generated\models\DefMnpTemp]].
*
* @see \common\models\generated\models\DefMnpTemp
*/
class DefMnpTempQuery extends ActiveQuery
{
/*public function active()
{
return $this->andWhere('[[status]]=1');
}*/

/**
* @inheritdoc
* @return \common\models\generated\models\DefMnpTemp[]|array
*/
public function all($db = null)
{
return parent::all($db);
}

/**
* @inheritdoc
* @return \common\models\generated\models\DefMnpTemp|array|null
*/
public function one($db = null)
{
return parent::one($db);
}
}
