<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Violations;
use kartik\daterange\DateRangeBehavior;
/**
 * ViolationsSearch represents the model behind the search form of `app\models\Violations`.
 */
class ViolationsSearch extends Violations
{
    /**
     * {@inheritdoc}
     */
    public $datetime_start;
    public $datetime_end;
    public $team_id;

    public function behaviors() {
        return [
            [
                'class' => DateRangeBehavior::className(),
                'attribute' => 'date',
                'dateStartAttribute' => 'datetime_start',
                'dateEndAttribute' => 'datetime_end',
                'dateStartFormat' => 'Y-m-d H:i',
                'dateEndFormat' => 'Y-m-d H:i',
    
            ]
        ];
    }
    public function rules()
    {
        return [
            [['id', 'worker_id', 'type_id', 'team_id'], 'integer'],
            [['date'], 'safe'],
            [['team_id'], 'safe'],
            // [['date'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
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
        $query = Violations::find();
        $query->joinWith(['worker']);
        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 20 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'worker_id' => $this->worker_id,
            'type_id' => $this->type_id,
        ]);

        $query->andFilterWhere(['between', 'date', $this->datetime_start, $this->datetime_end]);
        
        $query->andFilterWhere(['like', 'team_id', $this->team_id]);
                  

        return $dataProvider;
    }
}
