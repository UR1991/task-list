<?php
//Model for data provider
namespace app\models;

use yii\base\Model;
use app\models\Task;

class TaskSearch extends Task
{
  public function rules ()
  {
    return [
      [['id'],'integer'],
      [['task_name', 'task_description'],'safe'],
    ];
  }

  public function Search($params)
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
