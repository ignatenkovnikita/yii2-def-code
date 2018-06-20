<?php
/**
 * Copyright (C) $user$, Inc - All Rights Reserved
 *
 *  <other text>
 * @file        DefCodeSearch.php
 * @author      ignatenkovnikita
 * @date        $date$
 */

namespace ignatenkovnikita\defcode\models\search;

use ignatenkovnikita\defcode\models\DefCode;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DefCodeSearch represents the model behind the search form about `common\models\generated\models\DefCode`.
 */
class DefCodeSearch extends DefCode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'from', 'to', 'capacity', 'created_at', 'updated_at', 'operator_id', 'region_id'], 'integer'],
            [['type'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DefCode::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'from' => $this->from,
            'to' => $this->to,
            'capacity' => $this->capacity,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'region_id' => $this->region_id,
            'operator_id' => $this->operator_id,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
