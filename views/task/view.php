<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 ?>
 <div class="task-view">
   <h1><?= Html::encode($this->title) ?></h1>

   <p>
     <?= Html::a(Yii::t('app', 'Edit'), ['edit', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
     <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
       'class' => 'btn btn-danger',
       'data' => [
           'confirm' => Yii::t('app', 'Are your sure?'),
           'method' => 'post',
       ],
       ]) ?>
   </p>

   <?= DetailView::widget([
     'model' => $model,
     'attributes' => [
       'id',
       'task_name',
       'task_description',
     ],
     ]) ?>
 </div>
