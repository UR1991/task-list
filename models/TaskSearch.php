<?php
//Model for data provider
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Task;
use yii\data\ActiveDataProvider;

class TaskSearch extends Task
{
  public function rules ()
  {
    return [
      [['id'],'integer'],
      [['task_name', 'task_description'],'safe'],
    ];
  }

  public function search($params)
  {
    $query = Task::find();

    //Add conditions

    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    $this->load($params);

    if (!$this->validate())
    {
      return $dataProvider;
    }

    $query->andFilterWhere([ 'id' => $this->id, ]);

    $query->andFilterWhere(['like', 'task_name', $this->$task_name])
    ->andFilterWhere(['like', 'task_description', $this->$task_description]);

    return $dataProvider;
  }
}
 ?>
