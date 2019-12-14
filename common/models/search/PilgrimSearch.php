<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pilgrim;

/**
 * PilgrimSearch represents the model behind the search form of `common\models\Pilgrim`.
 */
class PilgrimSearch extends Pilgrim
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'p_type', 'nationality_id', 'region_id', 'marital_status', 'mahram_id', 'mahram_name_id', 'group_id', 'status', 'pilgrim_type_id', 'personal_number', 'user_id'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'birth_date', 'p_number', 'p_issue_date', 'p_expiry_date', 'p_mrz', 'created_at', 'updated_at'], 'safe'],
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
        $query = Pilgrim::find();

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
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'p_issue_date' => $this->p_issue_date,
            'p_expiry_date' => $this->p_expiry_date,
            'p_type' => $this->p_type,
            'nationality_id' => $this->nationality_id,
            'region_id' => $this->region_id,
            'marital_status' => $this->marital_status,
            'mahram_id' => $this->mahram_id,
            'mahram_name_id' => $this->mahram_name_id,
            'group_id' => $this->group_id,
            'status' => $this->status,
            'pilgrim_type_id' => $this->pilgrim_type_id,
            'personal_number' => $this->personal_number,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'p_number', $this->p_number])
            ->andFilterWhere(['like', 'p_mrz', $this->p_mrz]);

        return $dataProvider;
    }
}
