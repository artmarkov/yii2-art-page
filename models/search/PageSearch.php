<?php

namespace artsoft\page\models\search;

use artsoft\page\models\Page;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PageSearch represents the model behind the search form about `artsoft\page\models\Page`.
 */
class PageSearch extends Page
{
    
    public $dateSearch_1;
    public $dateSearch_2;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'status', 'comment_status', 'revision'], 'integer'],
            [['slug', 'title', 'content', 'published_at', 'dateSearch_1', 'dateSearch_2', 'created_at', 'updated_at', 'publishedDate'], 'safe'],
            [['dateSearch_1', 'dateSearch_2'], 'date', 'format' => 'php:d.m.Y'],
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
        $query = Page::find()->joinWith('translation');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->request->cookies->getValue('_grid_page_size', 20),
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status' => $this->status,
            'comment_status' => $this->comment_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'revision' => $this->revision,
        ]);
        
        $query->andFilterWhere(['>=', 'published_at', $this->dateSearch_1 ? strtotime($this->dateSearch_1 . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'published_at', $this->dateSearch_2 ? strtotime($this->dateSearch_2 . ' 23:59:59') : null]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }

}
