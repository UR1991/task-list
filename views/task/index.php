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

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      
      'task_name',

      ['class' => 'yii\grid\ActionColumn'],
    ]
  ]); ?>

</div>
