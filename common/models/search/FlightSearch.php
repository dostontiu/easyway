<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Flight;

/**
 * FlightSearch represents the model behind the search form of `common\models\Flight`.
 */
class FlightSearch extends Flight
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count_people', 'arrival_airport_id', 'depart_airport_id', 'season_id', 'status'], 'integer'],
            [['name', 'arrival_date', 'depart_date'], 'safe'],
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
        $query = Flight::find();

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
            'count_people' => $this->count_people,
            'arrival_date' => $this->arrival_date,
            'depart_date' => $this->depart_date,
            'arrival_airport_id' => $this->arrival_airport_id,
            'depart_airport_id' => $this->depart_airport_id,
            'season_id' => $this->season_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
