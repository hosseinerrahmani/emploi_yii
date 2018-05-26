<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Groupemodule;

/**
 * GroupemoduleSearch represents the model behind the search form of `app\models\Groupemodule`.
 */
class GroupemoduleSearch extends Groupemodule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nbre'], 'integer'],
            [[ 'id_group', 'id_module','descrption'], 'safe'],
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
        $query = Groupemodule::find();
        //join the model Group with this class to search in database by string
        $query->joinWith(['group']);

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

            'nbre' => $this->nbre,
        ]);

        $query->andFilterWhere(['like', 'descrption', $this->descrption])
            //We customize this filter to add where with join of tow column model Module and Groupemodule
            ->andFilterWhere(['like','module.titre',$this->id_module])
            //We customize this filter to add where with join of tow column model Group and Groupemodule
            ->andFilterWhere(['like','group.titre',$this->id_group]);


        return $dataProvider;
    }
}
