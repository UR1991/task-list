<?php
//Model for our app
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Task extends ActiveRecord
{
  //return name db
  public static function tableName()
  {
    return 'tasks';
  }

  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'task_name' => 'Task Name',
      'task_description' => 'Task Description',
      'status' => 'Status',
    ];
  }

  public function rules()
  {
      return [
          [['task_name', 'task_description'], 'required'],
          [['task_name'], 'string', 'max' => 30],
          [['task_description'], 'string', 'max' => 255],
      ];
  }
}
 ?>
