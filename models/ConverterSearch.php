<?php

namespace backend\modules\converter\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\converter\models\Converter;

/**
 * ConverterSearch represents the model behind the search form of `backend\modules\converter\models\Converter`.
 */
class ConverterSearch extends Converter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'population'], 'integer'],
            [['object', 'code', 'name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Converter::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'population' => $this->population,
        ]);

        $query->andFilterWhere(['like', 'object', $this->object])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
