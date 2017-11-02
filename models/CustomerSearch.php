<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerId', 'journeyId', 'seat'], 'integer'],
            [['customerName', 'telNo', 'regTime', 'setSeat', 'regTime2', 'idCard'], 'safe'],
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
        $query = Customer::find()->orderBy(['customerId' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'customerId' => $this->customerId,
            'journeyId' => $this->journeyId,
            'seat' => $this->seat,
            'regTime' => $this->regTime,
            'regTime2' => $this->regTime2,
        ]);

        $query->andFilterWhere(['like', 'customerName', $this->customerName])
            ->andFilterWhere(['like', 'telNo', $this->telNo])
            ->andFilterWhere(['like', 'setSeat', $this->setSeat])
            ->andFilterWhere(['like', 'idCard', $this->idCard]);

        return $dataProvider;
    }
}
