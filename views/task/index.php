<!--Main view for Application -->
<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Task list';
//Use breadcrumbs to set title
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php echo $this->render('_search', ['model' => $searchModel]); ?>

<p>
  <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
</p>
  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [

      'task_name',

      ['class' => yii\grid\ActionColumn::className(),'buttons' => [
                  'update'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['task/edit','id'=>$model['id']]); //$model->id для AR
                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-pencil"></span>', $customurl,
                                                ['title' => Yii::t('yii', 'Edit'), 'data-pjax' => '0']);
               }
            ],
           'template'=>'{view} {update} {delete}',],
    ]
  ]); ?>

</div>
