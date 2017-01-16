<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Allergy;

/**
 * AllergySearch represents the model behind the search form about `app\models\Allergy`.
 */
class AllergySearch extends Allergy
{
    public $allergies;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['allergy_id'], 'integer'],
            [['personal_id', 'name', 'surname', 'allergy_drug', 'reporter', 'create_at','update_at','allergies'], 'safe'],
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
     * @param array $allergies
     *
     * @return ActiveDataProvider
     */
    public function search($allergies)
    {
        $query = Allergy::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($allergies);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'allergy_id' => $this->allergy_id,
            'create_at' => $this->create_at,
        ]);

        $query->orFilterWhere(['like', 'personal_id', $this->allergies])
            ->orFilterWhere(['like', 'name', $this->allergies])
            ->orFilterWhere(['like', 'surname', $this->allergies])
            ->orFilterWhere(['like', 'reporter', $this->allergies]);

        return $dataProvider;
    }
}
