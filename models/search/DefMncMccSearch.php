<?php
/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 20/06/2018
 * Time: 13:29
 */

namespace ignatenkovnikita\defcode\models\search;


use ignatenkovnikita\defcode\models\DefMncMcc;
use ignatenkovnikita\defcode\models\DefMnp;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class DefMncMccSearch extends DefMncMcc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mcc', 'mnc'], 'integer'],
            [['name'], 'string'],
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
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'mnc' => $this->mnc,
            'mcc' => $this->mcc,
            'name' => $this->name,
        ]);


        return $dataProvider;
    }
}