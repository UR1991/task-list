<?php
//Controller for our App
namespace app\controllers;

//Models what we are use
use app\models\Task;
use app\models\TaskSearch;
use app\models\MailerForm;
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
  //Action index
  public function actionIndex ()
  {
    $searchModel = new TaskSearch();

    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }
  //Action for creating task
  public function actionCreate()
  {
    $model = new Task();

    if ($model->load(Yii::$app->request->post()) && $model->save())    {
      return $this->redirect(['view', 'id' => $model->id]);
    } else {
      return $this->render('create', ['model' => $model,]);
    }
  }
  //Actiion for editing task
  public function actionEdit($id)
  {
    //Search task by id
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
  //Action for Deleting tasks
  public function actionDelete($id)
  {
    //Search task by id and delete it
    $this->findModel($id)->delete();
    return $this->redirect(['index']);
  }
  //Action for showing task by id
  public function actionView($id)
  {
    return $this->render('view', ['model' => $this->findModel($id),]);
  }

  //Action for changing done/undone task status
  public function actionChangeStatus($id)
  { //Searching task by id
    $model = $this->findModel($id);

    //If status - 0(undone), change the status to 1(done) and redirect to main page
    if($model->status===0)
    {
      $model->status = 1;
      $model->save();
      return $this->redirect(['index']);
    }

    //Else change status to 0(undone) and redirect to main page
    else
    {
      $model->status = 0;
      $model->save();
      return $this->redirect(['index']);
    }
  }

  //Action for sending reminder mail
  public function actionMailer($id)
  {
    $message = $this->findModel($id);
    $model = new MailerForm();
    $model->sendEmail($message);
    //redirect to main page
    return $this->redirect(['index']);
  }

  //Search in BD
  public function findModel ($id)
  { //If data not null then return it to action
    if(($model = Task::findOne($id)) !== null)
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
