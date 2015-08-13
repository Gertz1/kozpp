<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\user\models\Profile;

/**
 * ProfileSearch represents the model behind the search form about `app\modules\user\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['fullname', 'name', 'surname', 'patronymic', 'gender', 'address_id'], 'safe'],
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
        $query = Profile::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'address_id', $this->address_id]);

        return $dataProvider;
    }
}
