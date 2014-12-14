<?php

namespace common\modules\page\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\page\models\Page;

/**
 * PageSearch represents the model behind the search form about `common\modules\page\models\Page`.
 */
class PageSearch extends Page
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tittle', 'content', 'name', 'active'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Page::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'tittle', $this->tittle])
                ->andFilterWhere(['like', 'content', $this->content])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }

    static public function findPage($id)
    {

        $model = Page::find()
                ->orWhere(['id' => $id])
                ->orWhere(['name' => $id])
                ->one();

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
