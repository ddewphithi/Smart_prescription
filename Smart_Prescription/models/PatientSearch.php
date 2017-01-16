<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `app\models\Patient`.
 */
class PatientSearch extends Patient
{
    public $patients;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['personal_id', 'name', 'surname', 'prescription', 'create_by', 'username', 'password', 'create_at','update_at' ,'patients'], 'safe'],
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
     * @param array $patients
     *
     * @return ActiveDataProvider
     */
    public function search($patients)
    {
        $query = Patient::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($patients);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'create_at' => $this->create_at,
        ]);

        $query->orFilterWhere(['like', 'personal_id', $this->patients])
            ->orFilterWhere(['like', 'name', $this->patients])
            ->orFilterWhere(['like', 'surname', $this->patients])
//            ->orFilterWhere(['like', 'create_by', $this->patients])
            ;

        return $dataProvider;
    }
}
