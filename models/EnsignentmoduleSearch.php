<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ensignentmodule;

/**
 * EnsignentmoduleSearch represents the model behind the search form of `app\models\Ensignentmodule`.
 */
class EnsignentmoduleSearch extends Ensignentmodule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['description', 'id_ensig', 'id_module'], 'safe'],
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
        $query = Ensignentmodule::find();

        //join the model ensignent with this class to search in database by string
        $query->joinWith(['ensignent']);

        //join the model Module with this class to search in database by string
        $query->joinWith(['module']);
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
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'ensignent.nom', $this->id_ensig])
            ->andFilterWhere(['like','module.titre',$this->id_module]);

        return $dataProvider;
    }
}
