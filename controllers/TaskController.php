<?php
//Controller for our App
namespace app\controllers;

//Models what we are use
use app\models\Task;
use app\models\TaskSearch;
use Yii;
use yii\web\Controller;

class TaskController extends Controller
{
  public function actionIndex ()
  {
    //Action index
    $searchModel = new TaskSearch();
    $dataProvider->$searchModel->search(Yii::$app->request->queryParams);
    return $this->render('index', ['model' => $model,]);
  }

  public function actionCreate()
  {
    //Action for creating task
  }

  public function actionEdit()
  {
    //Actiion for editing tasks
  }

  public function actionDelete()
  {
    //Action for Deleting tasks
  }
  //Search in BD
  public function findModel ($id)
  { //If data not null then return it to action
    if($model = Task::findOne($id) !== null)
    {
      return $model;
    }
    //Else throw new exception
    else
    {
      throw new NotFoundHttpException("Error Processing Request", 1);
    }
  }
}
 ?>
