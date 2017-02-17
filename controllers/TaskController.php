<?php
//Controller for our App
namespace app\controllers;

//Models what we are use
use app\models\Task;
use app\models\TaskSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class TaskController extends Controller
{
  public function behaviors()
  {
      return [
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'delete' => ['POST'],
              ],
          ],
      ];
  }

  public function actionIndex ()
  {
    //Action index
    $searchModel = new TaskSearch();

    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  public function actionCreate()
  {
    //Action for creating task
    $model = new Task();

    if ($model->load(Yii::$app->request->post()) && $model->save())    {
      return $this->redirect(['view', 'id' => $model->id]);
    } else {
      return $this->render('create', ['model' => $model,]);
    }
  }

  public function actionEdit($id)
  {
    //Actiion for editing task
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save())
    {
      return $this->redirect(['view', 'id' =>$model->id ]);
    }
    else {
      return $this->render('edit', [
        'model' => $model,
      ]);
    }
  }

  public function actionDelete($id)
  {
    //Action for Deleting tasks
    $this->findModel($id)->delete();
    return $this->redirect(['index']);
  }

  public function actionView($id)
  {
    return $this->render('view', ['model' => $this->findModel($id),]);
  }

  //Search in BD
  public function findModel ($id)
  { //If data not null then return it to action
    if(($model = Task::findOne($id)) !== null)
    {
      //var_dump($model = Task::findOne($id));
      //die();
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
