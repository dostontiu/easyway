<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pilgrim;

/**
 * PilgrimSearch represents the model behind the search form about `common\models\Pilgrim`.
 */
class PilgrimSearch extends Pilgrim
{

    public $fullName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nationality_id', 'region_id', 'mahram_id', 'mahram_name_id', 'group_id', 'pilgrim_type_id', 'personal_number', 'user_id'], 'integer'],
            [['fullName', 'first_name', 'last_name', 'middle_name', 'birth_date', 'gender', 'p_number', 'p_issue_date', 'p_expiry_date', 'p_type', 'p_mrz', 'marital_status', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = Pilgrim::find();
//            ->select(['pilgrim.*',
//                new \yii\db\Expression("CONCAT(`first_name`, ' ', `last_name`, ' ', `middle_name`) as full_name"),
//            ]);
        $query->joinWith(['mahramName', 'pilgrimType', 'group']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'fullName' => [
                    'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC, 'middle_name' => SORT_ASC],
                    'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC, 'middle_name' => SORT_DESC],
                    'label' => 'Full Name',
                    'default' => SORT_ASC
                ],
                'first_name',
                'last_name',
                'middle_name',
                'birth_date',
                'gender',
                'p_number',
                'p_issue_date',
                'p_expiry_date',
                'p_type',
                'p_mrz',
                'nationality_id',
                'region_id',
                'marital_status',
                'mahram_id',
                'mahram_name_id',
                'group_id',
                'status',
                'pilgrim_type_id',
                'personal_number',
                'user_id',
                'created_at',
                'updated_at',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'nationality_id' => $this->nationality_id,
            'region_id' => $this->region_id,
            'mahram_id' => $this->mahram_id,
            'mahram_name_id' => $this->mahram_name_id,
            'group_id' => $this->group_id,
            'pilgrim_type_id' => $this->pilgrim_type_id,
            'personal_number' => $this->personal_number,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'p_number', $this->p_number])
            ->andFilterWhere(['like', 'p_type', $this->p_type])
            ->andFilterWhere(['like', 'p_mrz', $this->p_mrz])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'status', $this->status]);

        $query->andWhere('first_name LIKE "%'.$this->fullName.'%"' .
            ' OR last_name LIKE "%'.$this->fullName.'%"'.
            ' OR middle_name LIKE "%'.$this->fullName.'%"'
        );

        if($this->birth_date){
            $dateBegin = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$3-$2-$1', $this->birth_date);
            $dateEnd = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$6-$5-$4', $this->birth_date);
            $query->andWhere("pilgrim.birth_date BETWEEN '{$dateBegin}' AND '{$dateEnd}'");
        }
        if($this->p_issue_date){
            $dateBegin = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$3-$2-$1', $this->p_issue_date);
            $dateEnd = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$6-$5-$4', $this->p_issue_date);
            $query->andWhere("pilgrim.p_issue_date BETWEEN '{$dateBegin}' AND '{$dateEnd}'");
        }
        if($this->p_expiry_date){
            $dateBegin = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$3-$2-$1', $this->p_expiry_date);
            $dateEnd = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$6-$5-$4', $this->p_expiry_date);
            $query->andWhere("pilgrim.p_expiry_date BETWEEN '{$dateBegin}' AND '{$dateEnd}'");
        }
        if($this->created_at){
            $dateBegin = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$3-$2-$1', $this->created_at);
            $dateEnd = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$6-$5-$4', $this->created_at);
            $query->andWhere("pilgrim.created_at BETWEEN '{$dateBegin}' AND '{$dateEnd}'");
        }

        return $dataProvider;
    }
}
