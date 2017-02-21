<!--Main view for Application -->
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Button;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('app', 'Task list');
//Use breadcrumbs to set title
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php echo $this->render('_search', ['model' => $searchModel]); ?>

<p>
  <?= Html::a(Yii::t('app', 'Create Task'), ['create'], ['class' => 'btn btn-success']) ?>

</p>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,

    'rowOptions' => function ($model, $key, $index, $grid)
    {
      if($model->status !== 0) {
        return ['style' => 'background-color:#00CC33;'];
      }
    },

    'columns' => [
      //Show Task name
      'task_name',
      //Buttons
      ['class' => yii\grid\ActionColumn::className(),'buttons' => [
              'update'=>function ($url, $model) {
                    $customurl=Yii::$app->getUrlManager()->createUrl(['task/edit','id'=>$model['id']]); //$model->id для AE
                    return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-pencil"></span>', $customurl,
                    ['title' => Yii::t('app', 'edit'), 'data-pjax' => '0']);
               },

               //Create button which change status done/undone
               'link' => function ($url, $model, $key) {
                 return Html::a(Yii::t('app', 'Done'), ['change-status', 'id'=>$model['id']], ['class' => 'btn btn-success']);
               },

               //This button will send the remainder message to email
               'mailer' => function ($url, $model, $key) {
                 return Html::a(Yii::t('app', 'Send email'), ['mailer', 'id'=>$model['id']], ['class' => 'btn btn-success']);
               },
            ],
           'template'=>'{view} {update} {delete} {link} {mailer}',
         ],
    ]
  ]); ?>
</div>
