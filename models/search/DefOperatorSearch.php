<?php

namespace ignatenkovnikita\defcode\models\search;
use ignatenkovnikita\defcode\models\DefOperator;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 18/06/2018
 * Time: 23:00
 */

class DefOperatorSearch extends \ignatenkovnikita\defcode\models\DefOperator
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
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
        $query = DefOperator::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}