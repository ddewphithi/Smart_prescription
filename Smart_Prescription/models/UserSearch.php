<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    public $users;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'roleId'], 'integer'],
            [['name', 'surname', 'username', 'password', 'password2', 'users'], 'safe'],
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
     * @param array $users
     *
     * @return ActiveDataProvider
     */
    public function search($users)
    {
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($users);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'role' => $this->roleId,
        ]);

        $query
//            ->orFilterWhere(['like', 'roleName', $this->q])
            ->orFilterWhere(['like', 'name', $this->users])
            ->orFilterWhere(['like', 'surname', $this->users])
            ->orFilterWhere(['like', 'username', $this->users]);


        return $dataProvider;
    }
}
