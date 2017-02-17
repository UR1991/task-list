<?php
//Model for our app
namespace app\models;

use yii\db;

class Task extends ActionRecord
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
      'task_name' => 'name',
      'task_description' => 'description',
    ];
  }
}
 ?>
